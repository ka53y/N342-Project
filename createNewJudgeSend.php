<?php
//These pages right now can not send to server, so they instead just send it back to the respective homepage of how it got to here. So since
//this is an admin page, that only admins can access, it makes sense ot send them back to admin home page.
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newJudgeFirstName')||
    !filter_has_var(INPUT_POST, 'newJudgeMiddleName') ||
    !filter_has_var(INPUT_POST, 'newJudgeLastName') ||
    !filter_has_var(INPUT_POST, 'newJudgeTitle') ||
    !filter_has_var(INPUT_POST, 'newJudgeHighestDegreeEarned') ||
    !filter_has_var(INPUT_POST, 'newJudgeEmployer') ||
    !filter_has_var(INPUT_POST, 'newJudgeYear') ||
    !filter_has_var(INPUT_POST, 'newJudgeEmail') ||
    !filter_has_var(INPUT_POST, 'newJudgePassword'))
{
    echo "There were problems retrieving new Admin details. New Admin cannot be added.";
    require_once 'includes/footer.php';
    die();
}
$jFirst = filter_input(INPUT_POST, "newJudgeFirstName", FILTER_SANITIZE_STRING);
$jMid = filter_input(INPUT_POST, "newJudgeMiddleName", FILTER_SANITIZE_STRING);
$jLast = filter_input(INPUT_POST, "newJudgeLastName", FILTER_SANITIZE_STRING);
$jTitle = filter_input(INPUT_POST, "newJudgeTitle", FILTER_SANITIZE_STRING);
$jHighDegree = filter_input(INPUT_POST, "newJudgeHighestDegreeEarned", FILTER_SANITIZE_STRING);
$jEmply = filter_input(INPUT_POST, "newJudgeEmployer", FILTER_SANITIZE_STRING);
$jYear = filter_input(INPUT_POST, "newJudgeYear", FILTER_SANITIZE_STRING);
$jEmail = filter_input(INPUT_POST, "newJudgeEmail", FILTER_SANITIZE_STRING);
$jPassword = filter_input(INPUT_POST, "newJudgePassword", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO judge (first_name, last_name, middle_name,title,higest_degree_earned,emplyoer,email,password,year) VALUES ('$jFirst','$jMid','$jLast', '$jTitle','$jHighDegree','$jEmply','$jEmail','$jPassword','$jYear')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
    $con->exec($sql);
    echo "New Judge Session created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $e->getMessage();
}



include('includes/footer.php');
exit();