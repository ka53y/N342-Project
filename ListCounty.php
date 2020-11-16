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
                            <th class="tg-0lax">County ID</th>
                            <th class="tg-0lax">County Name</th>
                            <th class="tg-0lax">Edit the County</th>
                            <th class="tg-0lax">Delete the County</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT county_id, county_name FROM county");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $county)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $county['county_id'] . "</th>";
                            echo "<th class='tg-0lax'>" . $county['county_name'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editCounty.php?id=". $county['county_id']. "'>Edit County</a></th>";
                            echo "<th class='tg-0lax'><a href='countyDeleteSend.php?id=". $county['county_id']. "'>DELETE County</a></th>";
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