<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newJudgeSessionNumber') ||
    !filter_has_var(INPUT_POST, 'newJudgeSessionTimeStart')||
    !filter_has_var(INPUT_POST, 'newJudgeSessionTimeEnd')||
    !filter_has_var(INPUT_POST, 'userID'))
{
    echo "There were problems retrieving new Category details. Category Edit could not be made.";
    require_once 'includes/footer.php';
    die();
}

$addjn = filter_input(INPUT_POST, "newJudgeSessionNumber", FILTER_SANITIZE_STRING);
$addjs = filter_input(INPUT_POST, "newJudgeSessionTimeStart", FILTER_SANITIZE_STRING);
$addje = filter_input(INPUT_POST, "newJudgeSessionTimeEnd", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE session SET session_number='$addjn', start_time='$addjs', end_time='$addje' WHERE session_id = $id";
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

