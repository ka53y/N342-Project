<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newJudgeFirstName') ||
    !filter_has_var(INPUT_POST, 'newJudgeMiddleName')||
    !filter_has_var(INPUT_POST, 'newJudgeLastName')||
    !filter_has_var(INPUT_POST, 'newJudgeTitle')||
    !filter_has_var(INPUT_POST, 'newJudgeHighDeg')||
    !filter_has_var(INPUT_POST, 'newJudgeEmployer')||
    !filter_has_var(INPUT_POST, 'newJudgeEmail')||
    !filter_has_var(INPUT_POST, 'newJudgePassword')||
    !filter_has_var(INPUT_POST, 'newJudgeYear'))
{
    echo "There were problems retrieving new Category details. Category Edit could not be made.";
    require_once 'includes/footer.php';
    die();
}

$newJudgeFirstName = filter_input(INPUT_POST, "newJudgeFirstName", FILTER_SANITIZE_STRING);
$newJudgeMiddleName = filter_input(INPUT_POST, "newJudgeMiddleName", FILTER_SANITIZE_STRING);
$newJudgeLastName = filter_input(INPUT_POST, "newJudgeLastName", FILTER_SANITIZE_STRING);
$newJudgeTitle = filter_input(INPUT_POST, "newJudgeTitle", FILTER_SANITIZE_STRING);
$newJudgeHighDeg = filter_input(INPUT_POST, "newJudgeHighDeg", FILTER_SANITIZE_STRING);
$newJudgeEmployer = filter_input(INPUT_POST, "newJudgeEmployer", FILTER_SANITIZE_STRING);
$newJudgeEmail = filter_input(INPUT_POST, "newJudgeEmail", FILTER_SANITIZE_STRING);
$newJudgePassword = filter_input(INPUT_POST, "newJudgePassword", FILTER_SANITIZE_STRING);
$newJudgeYear = filter_input(INPUT_POST, "newJudgeYear", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE judge SET first_name = '$newJudgeFirstName',last_name = '$newJudgeLastName',middle_name = '$newJudgeMiddleName',title = '$newJudgeTitle',highest_degree_earned = '$newJudgeHighDeg',employer = '$newJudgeEmployer',email = '$newJudgeEmail',password = '$newJudgePassword', year = '$newJudgeYear' WHERE judge_id = $id";
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
