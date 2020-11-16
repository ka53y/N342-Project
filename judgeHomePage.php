<?php  session_start();
	if(isset($_SESSION['judgeloggedin']))
	{
		if($_SESSION['judgeloggedin'] == false)
		{
			Header("Location:judgeLogin.php");
		}
	}
	else
	{
		Header ("Location:judgeLogin.php");
	}
	$_SESSION['timeout'] = time(); 

	require_once "inc/util.php";
	require_once "dbconnect.php";
	
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Judge Home Page</div>
                <div class="card-body">

			<div id = "wrapper">
    				<div>
        				Welcome Judge (get name from DB). Please select options from below to get started
    				</div>
    			<div id = "buttonHolder">
				<br />
        			<a href="viewMySessions.php">
            				<div class="btn btn--radius btn--red">See all Sessions: </div>
        			</a>
				<br /><br />
        			<a href="judgeCheckIn.php">
            				<div class="btn btn--radius btn--red">Check in for Session: </div>
        			</a>
				<br /><br />
        			<a href="judgeChooseProject.php">
            				<div class="btn btn--radius btn--red">Enter a new score for a project: </div>
        			</a>

    			</div>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>
<?php
include('includes/footer.php');
?>
