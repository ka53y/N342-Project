<?php
//These pages right now can not send to server, so they instead just send it back to the respective homepage of how it got to here. So since
//this is an admin page, that only admins can access, it makes sense ot send them back to admin home page.
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newAdminFirstName') ||
    !filter_has_var(INPUT_POST, 'newAdminLastName') ||
    !filter_has_var(INPUT_POST, 'newAdminMiddleName') ||
    !filter_has_var(INPUT_POST, 'newAdminPassword') ||
    !filter_has_var(INPUT_POST, 'newAdminEmail'))
{
    echo "There were problems retrieving new Admin details. New Admin cannot be added.";
    require_once 'includes/footer.php';
    die();
}

$firstName = filter_input(INPUT_POST, "newAdminFirstName", FILTER_SANITIZE_STRING);
$middleName = filter_input(INPUT_POST, "newAdminMiddleName", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "newAdminLastName", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "newAdminPassword", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "newAdminEmail", FILTER_SANITIZE_EMAIL);

$sql = "INSERT INTO administrator (first_name, last_name, middle_name, email, password) VALUES ('$firstName','$lastName','$middleName','$email','$password')";


//make sure it ran succesfull, if so tell the user or give user the error
try {
  $con->exec($sql);
  echo "New admin created succesfully! Redirecting you back to Admin Home page in 5 seconds.";
  header( "refresh:5;url=adminHomePage.php" );
} catch(PDOException $e) {
    echo $e->getMessage();
}



include('includes/footer.php');
exit();