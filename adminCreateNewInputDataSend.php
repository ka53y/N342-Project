<?php
include('includes/footer.php');
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newSchoolInput') ||
    !filter_has_var(INPUT_POST, 'newCountyInput') ||
    !filter_has_var(INPUT_POST, 'newCategoryInput') ||
    !filter_has_var(INPUT_POST, 'newProjectGradeInput') ||
    !filter_has_var(INPUT_POST, 'newStudentGradeInput'))
{
    echo "There were problems retrieving new input details.";
    require_once 'includes/footer.php';
    die();
}

$newSchoolInput = filter_input(INPUT_POST, "newSchoolInput", FILTER_SANITIZE_STRING);
$newCountyInput = filter_input(INPUT_POST, "newCountyInput", FILTER_SANITIZE_STRING);
$newCategoryInput = filter_input(INPUT_POST, "newCategoryInput", FILTER_SANITIZE_STRING);
$newProjectGradeInput = filter_input(INPUT_POST, "newProjectGradeInput", FILTER_SANITIZE_STRING);
$newStudentGradeInput = filter_input(INPUT_POST, "newStudentGradeInput", FILTER_SANITIZE_STRING);
if(!empty($newSchoolInput))
{
    $sql = "INSERT INTO school (first_name, last_name, middle_name, email, password) VALUES ('$firstName','$lastName','$middleName','$email','$password')";
//make sure it ran succesfull, if so tell the user or give user the error
    try {
        $con->exec($sql);
        echo "New admin created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
        header( "refresh:5;url=adminHomePage.php" );
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}