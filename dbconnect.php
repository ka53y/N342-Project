<?php
/**
 * This file defines PDO database package. This file is included in any files that needs database connection
 * http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers
 * http://php.net/manual/en/pdostatement.fetch.php
  */

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'kymblack';

/*** mysql password ***/
$password = 'kymblack';

try {
    $con = new PDO("mysql:host=$hostname;dbname=kymblack_db", $username, $password);
    /*** echo a message saying we have connected ***/
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>