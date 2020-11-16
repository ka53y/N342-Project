<?php
//These pages right now can not send to server, so they instead just send it back to the respective homepage of how it got to here. So since
//this is an admin page, that only admins can access, it makes sense ot send them back to admin home page.
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'judgeScoreValue')||
    !filter_has_var(INPUT_POST, 'judgeRankValue'))
{
    echo "There were problems retrieving new Grade Level details. New Grade Level cannot be added.";
    require_once 'includes/footer.php';
    die();
}
$stmt = $con->prepare("SELECT project_id FROM project_Rank");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $pRank)
{
    //will update until it reaches last id and just hold
    $oldId = $pRank['project_id'];
}
$newid = $oldId + 1;
$addTGrade = filter_input(INPUT_POST, "judgeScoreValue", FILTER_SANITIZE_STRING);
$addRGrade = filter_input(INPUT_POST, "judgeRankValue", FILTER_SANITIZE_STRING);
$projNum = filter_input(INPUT_POST, "projectNumber", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO project_Rank (project_id, score, rank, project_number) VALUES ('$newid', '$addTGrade', '$addRGrade', '$projNum')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
  $con->exec($sql);
  echo "New project grade created succesfully! Redirecting you back to Judge Home page in 5 seconds.";
  header( "refresh:5;url=judgeHomePage.php" );
} catch(PDOException $e) {
    echo $e->getMessage();
}



include('includes/footer.php');
exit();
