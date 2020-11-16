<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newCountyName'))
{
    echo "There were problems retrieving new County details. County Edit could not be made.";
    require_once 'includes/footer.php';
    die();
}

$name = filter_input(INPUT_POST, "newCountyName", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE county SET county_name ='$name' WHERE county_id = $id";
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

