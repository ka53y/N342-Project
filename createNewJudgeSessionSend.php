<?php
//These pages right now can not send to server, so they instead just send it back to the respective homepage of how it got to here. So since
//this is an admin page, that only admins can access, it makes sense ot send them back to admin home page.
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newJudgeSessionNumber')||
    !filter_has_var(INPUT_POST, 'newJudgeSessionTimeStart') ||
    !filter_has_var(INPUT_POST, 'newJudgeSessionTimeEnd'))
{
    echo "There were problems retrieving new Admin details. New Admin cannot be added.";
    require_once 'includes/footer.php';
    die();
}

$stmt = $con->prepare("SELECT session_id FROM session");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $js)
{
    //will update until it reaches last id and just hold
    $oldId = $js['session_id'];
}
$newid = $oldId + 1;

$jnum = filter_input(INPUT_POST, "newJudgeSessionNumber", FILTER_SANITIZE_STRING);
$jts = filter_input(INPUT_POST, "newJudgeSessionTimeStart", FILTER_SANITIZE_STRING);
$jte = filter_input(INPUT_POST, "newJudgeSessionTimeEnd", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO session (session_number, start_time, end_time, session_id) VALUES ('$jnum','$jts','$jte', '$newid')";


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