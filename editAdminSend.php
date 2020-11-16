<?php
require_once "inc/util.php";
require_once "dbconnect.php";
if (!filter_has_var(INPUT_POST, 'newAdminFirstName') ||
    !filter_has_var(INPUT_POST, 'newAdminLastName') ||
    !filter_has_var(INPUT_POST, 'newAdminMiddleName') ||
    !filter_has_var(INPUT_POST, 'userID') ||
    !filter_has_var(INPUT_POST, 'newAdminEmail'))
{
    echo "There were problems retrieving new Admin details. Admin Edit could not be made.";
    require_once 'includes/footer.php';
    die();
}

$firstName = filter_input(INPUT_POST, "newAdminFirstName", FILTER_SANITIZE_STRING);
$middleName = filter_input(INPUT_POST, "newAdminMiddleName", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "newAdminLastName", FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, "userID", FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, "newAdminEmail", FILTER_SANITIZE_EMAIL);

$sql = "UPDATE administrator SET first_name='$firstName', middle_name='$middleName', last_name = '$lastName', email = '$email' WHERE admin_id = $id";
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

