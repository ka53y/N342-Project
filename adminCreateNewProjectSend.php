<?php
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newProjectNumber') ||
    !filter_has_var(INPUT_POST, 'newProjectName') ||
    !filter_has_var(INPUT_POST, 'newProjectAbstract') ||
    !filter_has_var(INPUT_POST, 'newProjectCategory') ||
    !filter_has_var(INPUT_POST, 'newProjectGradeLevel') ||
    !filter_has_var(INPUT_POST, 'newProjectBoothNumber'))
{
    echo "There were problems retrieving new Project details. New Project cannot be added.";
    require_once 'includes/footer.php';
    die();
}
//start the hand made auto increment
$stmt = $con->prepare("SELECT project_id FROM project");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $project)
{
    //will update until it reaches last id and just hold
    $oldId = $project['project_id'];
}
$newid = $oldId + 1;
// end hand made autoincrement

$number = filter_input(INPUT_POST, "newProjectNumber", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "newProjectName", FILTER_SANITIZE_STRING);
$abstract = filter_input(INPUT_POST, "newProjectAbstract", FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, "newProjectCategory", FILTER_SANITIZE_STRING);
$gradeLevel = filter_input(INPUT_POST, "newProjectGradeLevel", FILTER_SANITIZE_STRING);
$booth = filter_input(INPUT_POST, "newProjectBoothNumber", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO project (project_id, project_number ,title, abstract, grade_level_id, category_id, booth_number_id) VALUES ('$newid','$number', '$name','$abstract','$gradeLevel','$category','$booth')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
    $con->exec($sql);
    echo "New Project created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $sql . "------". $e->getMessage();
}



include('includes/footer.php');
exit();