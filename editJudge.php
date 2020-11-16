<?php
require_once "inc/util.php";
require_once "dbconnect.php";

if(isset($_SESSION['adminloggedin']))
{
    if($_SESSION['adminloggedin'] == false)
    {
        Header("Location:adminLogin.php");
    }
}
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "Select * FROM judge WHERE judge_id = " . $id;

try {
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $judge)
    {
        $firstName = $judge['first_name'];
        $middleName = $judge['middle_name'];
        $lastName = $judge['last_name'];
        $title = $judge['title'];
        $highestDegree = $judge['highest_degree_earned'];
        $employer = $judge['employer'];
        $email = $judge['email'];
        $password = $judge['password'];
        $year = $judge['year'];
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading">Edit judge: <?=$lastName. ", " .$firstName?></div>
            <div class="card-body">

                <div id = "wrapper">
                    <form action="editJudgeSend.php" method="post">
                        <div>
                            <div class="input-group">
                                <label for="newJudgeFirstName"><b>Edit First Name</b></label>
                                <input type="text" placeholder="<?=$firstName?>" name="newJudgeFirstName" required>
                            </div>
                            <div class="input-group">
                                <label for="newJudgeMiddleName"><b>Edit Middle Name</b></label>
                                <input type="text" placeholder="<?=$middleName?>" name="newJudgeMiddleName" required>
                            </div>
                            <div class="input-group">
                                <label for="newJudgeLastName"><b>Edit Last Name</b></label>
                                <input type="text" placeholder="<?=$lastName?>" name="newJudgeLastName" required>
                            </div>
                            <div class="input-group">
                                <label for="newJudgeTitle"><b>Edit Judge's Title</b></label>
                                <input type="text" placeholder="<?=$title?>" name="newJudgeTitle" required>
                            </div>
                            <div class="input-group">
                                <label for="newJudgeHighDeg"><b>Edit Judge's Highest Degree Earned</b></label>
                                <input type="text" placeholder="<?=$highestDegree?>" name="newJudgeHighDeg" required>
                            </div>
                            <!-- hopefully we can have these next 3 be drop downs that auto-fill with the created schools and projects from out DB. -->
                            <div class="input-group">
                                <label for="newJudgeEmployer"><b>Edit Judge's Employer</b></label>
                                <input type="text" placeholder="<?=$employer?>" name="newJudgeEmployer" required>
                            </div>
                            <div class="input-group">
                                <label for="newJudgeEmail"><b>Edit Email</b></label>
                                <input type="text" placeholder="<?=$email?>" name="newJudgeEmail" required>
                            </div>
                            <input type="hidden" value="<?=$id?>" name="userID"/>
                            <div class="input-group">
                                <label for="newJudgePassword"><b>Edit Password</b></label>
                                <input type="text" placeholder="<?=$password?>" name="newJudgePassword" required>
                            </div>
                            <div class="input-group">
                                <label for="newJudgeYear"><b>Enter Judge's Year</b></label>
                                <input type="text" placeholder="<?=$year?>" name="newJudgeYear" required>
                            </div>
                            <br /><button class="btn btn--radius btn--green" type="submit">Edit</button>
                        </div>

                        <div>
                            <br /><br /><button class="btn btn--radius btn--red" type="button" >Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>