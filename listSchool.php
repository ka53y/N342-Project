<?php
session_start();
$_SESSION['timeout'] = time();

require_once "inc/util.php";
require_once "dbconnect.php";
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading">School List</div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">School Name</th>
                            <th class="tg-0lax">School City</th>
                            <th class="tg-0lax">School County</th>
                            <th class="tg-0lax">Edit the Admin</th>
                            <th class="tg-0lax">Delete the Admin</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT school_id, school_name, school_city, county_id  FROM school");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $school)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $school['school_name'] . "</th>";
                            echo "<th class='tg-0lax'>" . $school['school_city'] . "</th>";
                            echo "<th class='tg-0lax'>" . $school['county_id'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editSchool.php?id=". $school['school_id']. "'>Edit School</a></th>";
                            echo "<th class='tg-0lax'><a href='schoolDeleteSend.php?id=". $school['school_id']. "'>DELETE School</a></th>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>