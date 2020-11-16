<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newSchoolName') ||
    !filter_has_var(INPUT_POST, 'newSchoolCity') ||
    !filter_has_var(INPUT_POST, 'newSchoolCounty') ||
    !filter_has_var(INPUT_POST, 'userID'))
{
    echo "There were problems retrieving new School details. School Edit could not be made.";
    require_once 'includes/footer.php';
    die();
}

$name = filter_input(INPUT_POST, "newSchoolName", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, "newSchoolCity", FILTER_SANITIZE_STRING);
$county = filter_input(INPUT_POST, "newSchoolCounty", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE school SET school_name ='$name', school_city ='$city', county_id = '$county' WHERE school_id = $id";
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

