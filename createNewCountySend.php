<?php
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newCountyName'))
{
    echo "There were problems retrieving new Admin details. New Admin cannot be added.";
    require_once 'includes/footer.php';
    die();
}
//start the hand made auto increment
$stmt = $con->prepare("SELECT county_id FROM county");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $county)
{
    //will update until it reaches last id and just hold
    $oldId = $county['county_id'];
}
$newid = $oldId + 1;
// end hand made autoincrement

$name = filter_input(INPUT_POST, "newCountyName", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO county (county_id, county_name) VALUES ('$newid','$name')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
    $con->exec($sql);
    echo "New County created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $sql . "------". $e->getMessage();
}



include('includes/footer.php');
exit();