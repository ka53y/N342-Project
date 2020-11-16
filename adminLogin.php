<?php  session_start();
	$_SESSION['timeout'] = time(); 

	require_once "inc/util.php";
	require_once "dbconnect.php";
	
	$adminloggedin = false;
	
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">


<?php
	if (isset($_POST['login']))
	{
		$uname =  trim($_POST['adminUsername']); 
		$pwd = trim($_POST['adminPassword']);	
		
		$stmt = $con->prepare("select count(*) as c from administrator where email = ? and password = ?");
		$stmt->execute(array($uname, $pwd));
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		
		$count = $row->c;
					
		if ($count == 1)
		{
			$stmt = $con->prepare("Select admin_id from administrator where email = ? and password = ?");
			$stmt->execute(array($uname, $pwd));
			$row = $stmt->fetch(PDO::FETCH_OBJ);
					
			$uid = $row->admin_id;
						
			$_SESSION['uid'] = $uid;
			$_SESSION['email'] = $uname;
			
			$adminloggedin = true;
			$_SESSION['adminloggedin'] = $adminloggedin;
			
			Header ("Location:adminHomePage.php");

		}
		else
		{
			echo "The information entered does not match with the records in our database.";
		}
	}
?>

<html>
	<head>
		<title>Admin Login</title>
	</head>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
				<div class="wrapper wrapper--w680">
				<div class="card card-1">
					<div class="card-heading">Admin Login</div>
					<div class="card-body">

				<form action="adminLogin.php" method="post">
						<div>
						<div class="input-group">
								<label for="adminUsername"><b>Username</b></label>
								<input type="text" placeholder="Enter Username" name="adminUsername" id="adminUsername" required>
						</div>
						<div class="input-group">
								<label for="adminPassword"><b>Password</b></label>
								<input type="password" placeholder="Enter Password" name="adminPassword" required>
						</div>
							<button class="btn btn--radius btn--green" type="submit" name="login">Login</button>
							<div class="input-group">
							<label>
										<input type="checkbox" checked="checked" name="remember"> Remember me
								</label>
						</div>
						</div>

						<div>
							<button class="btn btn--radius btn--red" type="button" >Cancel</button><br />
							<span>Forgot <a href="pageNotCreatedYet.php">password?</a></span>
						</div>
				</form>
			</div>
			</div>
		</div>
		</div>
	</div>
</html>	
<?php
include('includes/footer.php');
?>