<?php
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newStudentFirstName') ||
    !filter_has_var(INPUT_POST, 'newStudentMiddleName') ||
    !filter_has_var(INPUT_POST, 'newStudentLastName') ||
    !filter_has_var(INPUT_POST, 'newStudentGender') ||
    !filter_has_var(INPUT_POST, 'newStudentCounty') ||
    !filter_has_var(INPUT_POST, 'newStudentSchool') ||
    !filter_has_var(INPUT_POST, 'newStudentProject') ||
    !filter_has_var(INPUT_POST, 'newStudentGradeLevel'))
{
    echo "There were problems retrieving new Student details. New Student cannot be added.";
    require_once 'includes/footer.php';
    die();
}
//start the hand made auto increment
$stmt = $con->prepare("SELECT student_id FROM student");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $student)
{
    //will update until it reaches last id and just hold
    $oldId = $student['student_id'];
}
$newid = $oldId + 1;
// end hand made autoincrement

$firstName = filter_input(INPUT_POST, "newStudentFirstName", FILTER_SANITIZE_STRING);
$middleName = filter_input(INPUT_POST, "newStudentMiddleName", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "newStudentLastName", FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, "newStudentGender", FILTER_SANITIZE_STRING);
$county = filter_input(INPUT_POST, "newStudentCounty", FILTER_SANITIZE_STRING);
$school = filter_input(INPUT_POST, "newStudentSchool", FILTER_SANITIZE_STRING);
$project = filter_input(INPUT_POST, "newStudentProject", FILTER_SANITIZE_STRING);
$gradeLevel = filter_input(INPUT_POST, "newStudentGradeLevel", FILTER_SANITIZE_STRING);
$schoolCity = filter_input(INPUT_POST, "newStudentSchoolCity", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO student (student_id, first_name,middle_name, last_name, gender, school_id, county_id, school_city, project_id, grade_id) VALUES ('$newid','$firstName', '$middleName','$lastName','$gender','$school','$county','$schoolCity','$project','$gradeLevel')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
    $con->exec($sql);
    echo "New Student created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $sql . "------". $e->getMessage();
}



include('includes/footer.php');
exit();