<!-- this is the home page, and I based the rest of the home pages arround this one. Ignore almost all the CSS, it was
mainly used for me to be able to tell where things were to ensure stuff was working. -->

<?php  session_start();
	if(isset($_SESSION['adminloggedin']))
	{
		if($_SESSION['adminloggedin'] == false)
		{
			Header("Location:adminLogin.php");
		}
	}
	else
	{
		Header ("Location:adminLogin.php");
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
                <div class="card-heading">Admin Home Page</div>
                <div class="card-body">

			<div id = "wrapper">
    			<div>
    				Welcome administrator (get name from DB). Please select options from below to get started
    			</div>
			<div id = "buttonHolder"> <!-- Holds each button in one div so they are uniform. -->
    			<!-- each one of these will take us to a new page, right now only the text inside the button is clickable and idealy
    			it be good to have the entire button clickable. -->
    			<a href="listSessions.php">
        			<br /><br /><div class="btn btn--radius btn--red">See Sessions</div>
    			</a>
                <a href="adminList.php">
                    <br /><br /><div class="btn btn--radius btn--red">See all Admins</div>
                </a>
                <a href="judgeList.php">
                    <br /><br /><div class="btn btn--radius btn--red">See all Judge Information</div>
                </a>
    			<a href="adminCreateNewAdmin.php">
        			<br /><br /><div class="btn btn--radius btn--red">Create New Admin</div>
    			</a>
    			<a href="adminCreateNewStudent.php">
        			<br /><br /><div class="btn btn--radius btn--red">Create New Student</div>
    			</a>
                <a href="listStudent.php">
                    <br /><br /><div class="btn btn--radius btn--red">See all Students</div>
                </a>
    			<a href="adminCreateNewProject.php">
        			<br /><br /><div class="btn btn--radius btn--red">Create New Project</div>
    			</a>
                <a href="listProject.php">
                    <br /><br /><div class="btn btn--radius btn--red">See all Projects</div>
                </a>
    			<a href="listInputData.php">
        			<br /><br /><div class="btn btn--radius btn--red">Add New Input Data</div>
    			</a>
                <a href="listInputData.php">
                    <br /><br /><div class="btn btn--radius btn--red">See Judges</div>
                </a>
    			</a>
                <a href="adminCheckProjectScoring.php">
                    <br /><br /><div class="btn btn--radius btn--red">Check Project Scores</div>
                </a>

    			</a>
                <a href="viewProjectRanking.php">
                    <br /><br /><div class="btn btn--radius btn--red">Check Project Ranks</div>
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
