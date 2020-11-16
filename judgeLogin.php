<?php  session_start();
	$_SESSION['timeout'] = time(); 

	require_once "inc/util.php";
	require_once "dbconnect.php";
	
	$judgeloggedin = false;
	
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">

<?php
	if (isset($_POST['login']))
	{
		$uname =  trim($_POST['judgeUsername']); 
		$pwd = trim($_POST['judgePassword']);	
		
		$stmt = $con->prepare("select count(*) as c from judge where username = ? and password = ?");
		$stmt->execute(array($uname, $pwd));
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		
		$count = $row->c;
					
		if ($count == 1)
		{
			$stmt = $con->prepare("Select judge_id  from judge where username = ? and password = ?");
			$stmt->execute(array($uname, $pwd));
			$row = $stmt->fetch(PDO::FETCH_OBJ);
					
			$uid = $row->judge_id;
						
			$_SESSION['uid'] = $uid;
			$_SESSION['email'] = $uname;
			
			$judgeloggedin = true;
			$_SESSION['judgeloggedin'] = $judgeloggedin;
			
			Header ("Location:judgeHomePage.php");

		}
		else
		{
			echo "The information entered does not match with the records in our database.";
		}
	}
?>

<!-- not sure what else they would use beside username and password -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Judge Login</div>
                <div class="card-body">
			<form action="judgeLogin.php" method="post">
    				<div>
					<div class="input-group">
        					<label for="judgeUsername"><b>Username</b></label>
        					<input type="text" placeholder="Enter Username" name="judgeUsername" required>
					</div>
					<div class="input-group">
        					<label for="judgePassword"><b>Password</b></label>
        					<input type="password" placeholder="Enter Password" name="judgePassword" required>
					</div>
        					<button class="btn btn--radius btn--green" type="submit" name="login">Login</button>
        				<div class="input-group">	
						<label>
            						<input type="checkbox" checked="checked" name="remember"> Remember me
        					</label>
					</div>
    				</div>

    				<div>
        				<button type="button" class="btn btn--radius btn--red" >Cancel</button><br />
        				<span>Forgot <a href="pageNotCreatedYet.php">password?</a></span>
    				</div>
			</form>
		</div>
		</div>
	</div>
	</div>
</div>
<?php
include('includes/footer.php');
?>