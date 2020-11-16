<?php
//These pages right now can not send to server, so they instead just send it back to the respective homepage of how it got to here. So since
//this is an admin page, that only admins can access, it makes sense ot send them back to admin home page.
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newProjectGrade'))
{
    echo "There were problems retrieving new Grade Level details. New Grade Level cannot be added.";
    require_once 'includes/footer.php';
    die();
}
$stmt = $con->prepare("SELECT grade_level_id FROM project_grade_level");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $pgrade)
{
    //will update until it reaches last id and just hold
    $oldId = $pgrade['grade_level_id'];
}
$newid = $oldId + 1;
$addPGrade = filter_input(INPUT_POST, "newProjectGrade", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO project_grade_level (level_name, grade_level_id) VALUES ('$addPGrade', '$newid')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
    $con->exec($sql);
    echo "New category created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $e->getMessage();
}



include('includes/footer.php');
exit();
