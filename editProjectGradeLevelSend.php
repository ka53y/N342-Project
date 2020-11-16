<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newProjectGrade') ||
    !filter_has_var(INPUT_POST, 'userID'))
{
    echo "There were problems retrieving new Category details. Category Edit could not be made.";
    require_once 'includes/footer.php';
    die();
}

$addpg = filter_input(INPUT_POST, "newProjectGrade", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE project_grade_level SET level_name='$addpg' WHERE grade_level_id = $id";
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

