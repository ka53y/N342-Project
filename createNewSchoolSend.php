<?php
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newSchoolName') ||
    !filter_has_var(INPUT_POST, 'newSchoolCity') ||
    !filter_has_var(INPUT_POST, 'newSchoolCounty'))
{
    echo "There were problems retrieving new Admin details. New Admin cannot be added.";
    require_once 'includes/footer.php';
    die();
}
//start the hand made auto increment
$stmt = $con->prepare("SELECT school_id FROM school");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $school)
{
    //will update until it reaches last id and just hold
    $oldId = $school['school_id'];
}
$newid = $oldId + 1;
// end hand made autoincrement

$name = filter_input(INPUT_POST, "newSchoolName", FILTER_SANITIZE_STRING);
$county = filter_input(INPUT_POST, "newSchoolCounty", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, "newSchoolCity", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO school (school_id, school_name, county_id, school_city) VALUES ('$newid','$name','$county','$city')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
    $con->exec($sql);
    echo "New school created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
    header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $sql . "------". $e->getMessage();
}



include('includes/footer.php');
exit();