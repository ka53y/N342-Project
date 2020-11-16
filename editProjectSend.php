<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newProjectNumber') ||
    !filter_has_var(INPUT_POST, 'newProjectName') ||
    !filter_has_var(INPUT_POST, 'newProjectAbstract') ||
    !filter_has_var(INPUT_POST, 'newProjectCategory') ||
    !filter_has_var(INPUT_POST, 'newProjectGradeLevel') ||
    !filter_has_var(INPUT_POST, 'newProjectBoothNumber') ||
    !filter_has_var(INPUT_POST, 'userID'))
{
    echo "There were problems retrieving new Project details. New Project cannot be added.";
    require_once 'includes/footer.php';
    die();
}
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);
$number = filter_input(INPUT_POST, "newProjectNumber", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "newProjectName", FILTER_SANITIZE_STRING);
$abstract = filter_input(INPUT_POST, "newProjectAbstract", FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, "newProjectCategory", FILTER_SANITIZE_STRING);
$gradeLevel = filter_input(INPUT_POST, "newProjectGradeLevel", FILTER_SANITIZE_STRING);
$booth = filter_input(INPUT_POST, "newProjectBoothNumber", FILTER_SANITIZE_STRING);


$sql = "UPDATE project SET project_number ='$number', title ='$name', abstract = '$abstract', category_id = '$category', grade_level_id = '$gradeLevel', booth_number_id='$booth' WHERE project_id = $id";
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

