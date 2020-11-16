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

$sql = "Select * FROM student WHERE student_id = " . $id;

try {
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $student)
    {
        $firstName = $student['first_name'];
        $middleName = $student['middle_name'];
        $lastName = $student['last_name'];
        $gender = $student['gender'];
        $school = $student['school_id'];
        $county = $student['county_id'];
        $city = $student['school_city'];
        $project = $student['project_id'];
        $grade = $student['grade_id'];
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
            <div class="card-heading">Edit Student: <?=$lastName. ", " .$firstName?></div>
            <div class="card-body">

                <div id = "wrapper">
                    <form action="editStudentSend.php" method="post">
                        <div>
                            <div class="input-group">
                                <label for="newStudentFirstName"><b>Edit Student First Name</b></label>
                                <input type="text" placeholder="<?=$firstName?>" name="newStudentFirstName" required>
                            </div>
                            <div class="input-group">
                                <label for="newStudentMiddleName"><b>Edit Middle Name</b></label>
                                <input type="text" placeholder="<?=$middleName?>" name="newStudentMiddleName" required>
                            </div>
                            <div class="input-group">
                                <label for="newStudentLastName"><b>Edit Last Name</b></label>
                                <input type="text" placeholder="<?=$lastName?>" name="newStudentLastName" required>
                            </div>
                            <div class="input-group">
                                <label for="newStudentGender"><b>Edit Student's Gender</b></label>
                                <input type="text" placeholder="<?=$gender?>" name="newStudentGender" required>
                            </div>
                            <div class="input-group">
                                <label for="newStudentCounty"><b>Edit Student's County ID</b></label>
                                <input type="text" placeholder="<?=$county?>" name="newStudentCounty" required>
                            </div>
                            <!-- hopefully we can have these next 3 be drop downs that auto-fill with the created schools and projects from out DB. -->
                            <div class="input-group">
                                <label for="newStudentSchool"><b>Edit School ID</b></label>
                                <input type="text" placeholder="<?=$school?>" name="newStudentSchool" required>
                            </div>
                            <div class="input-group">
                                <label for="newStudentSchoolCity"><b>Edit Students school's City</b></label>
                                <input type="text" placeholder="<?=$city?>" name="newStudentSchoolCity" required>
                            </div>
                            <input type="hidden" value="<?=$id?>" name="userID"/>
                            <div class="input-group">
                                <label for="newStudentProject"><b>Edit Project ID</b></label>
                                <input type="text" placeholder="<?=$project?>" name="newStudentProject" required>
                            </div>
                            <div class="input-group">
                                <label for="newStudentGradeLevel"><b>Enter Student's Grade Level</b></label>
                                <input type="text" placeholder="<?=$grade?>" name="newStudentGradeLevel" required>
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