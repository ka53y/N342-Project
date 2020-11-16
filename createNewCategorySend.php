<?php
//These pages right now can not send to server, so they instead just send it back to the respective homepage of how it got to here. So since
//this is an admin page, that only admins can access, it makes sense ot send them back to admin home page.
require_once "inc/util.php";
require_once "dbconnect.php";

if (!filter_has_var(INPUT_POST, 'newCategory'))
{
    echo "There were problems retrieving new Category details. New Category cannot be added.";
    require_once 'includes/footer.php';
    die();
}
$stmt = $con->prepare("SELECT category_id FROM category");
$stmt->execute();
$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach ($stmt->fetchAll() as $category)
{
    //will update until it reaches last id and just hold
    $oldId = $category['category_id'];
}
$newid = $oldId + 1;
$addCat = filter_input(INPUT_POST, "newCategory", FILTER_SANITIZE_STRING);

$sql = "INSERT INTO category (category_name, category_id) VALUES ('$addCat', '$newid')";


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