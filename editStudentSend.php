<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newStudentFirstName') ||
    !filter_has_var(INPUT_POST, 'newStudentMiddleName') ||
    !filter_has_var(INPUT_POST, 'newStudentLastName') ||
    !filter_has_var(INPUT_POST, 'newStudentGender') ||
    !filter_has_var(INPUT_POST, 'newStudentCounty') ||
    !filter_has_var(INPUT_POST, 'newStudentSchool') ||
    !filter_has_var(INPUT_POST, 'newStudentSchoolCity') ||
    !filter_has_var(INPUT_POST, 'newStudentProject') ||
    !filter_has_var(INPUT_POST, 'userID') ||
    !filter_has_var(INPUT_POST, 'newStudentGradeLevel'))
{
    echo "There were problems retrieving new Student details. New Student cannot be added.";
    require_once 'includes/footer.php';
    die();
}

$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);
$firstName = filter_input(INPUT_POST, "newStudentFirstName", FILTER_SANITIZE_STRING);
$middleName = filter_input(INPUT_POST, "newStudentMiddleName", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "newStudentLastName", FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, "newStudentGender", FILTER_SANITIZE_STRING);
$county = filter_input(INPUT_POST, "newStudentCounty", FILTER_SANITIZE_STRING);
$school = filter_input(INPUT_POST, "newStudentSchool", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, "newStudentSchoolCity", FILTER_SANITIZE_STRING);
$project = filter_input(INPUT_POST, "newStudentProject", FILTER_SANITIZE_STRING);
$gradeLevel = filter_input(INPUT_POST, "newStudentGradeLevel", FILTER_SANITIZE_STRING);
$schoolCity = filter_input(INPUT_POST, "newStudentSchoolCity", FILTER_SANITIZE_STRING);

$sql = "UPDATE student SET first_name ='$firstName', middle_name ='$middleName', last_name = '$lastName', grade_id = '$gradeLevel', school_city = '$city', gender = '$gender', county_id= '$county', school_id = '$school', project_id = '$project' WHERE student_id = $id";
try {
    $stmt = $con->prepare($sql);

// execute the query
    $stmt->execute();
    echo $stmt->rowCount() . " records UPDATED successfully, redirecting you back to admin home page in 5 seconds";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $e->getMessage();
}


// echo a message to say the UPDATE succeeded

