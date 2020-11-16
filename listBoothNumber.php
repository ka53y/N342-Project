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
                <div class="card-heading">Booth Number List </div>
                <div class="card-body">

			<div id = "wrapper">
			<table>
                <tr>
                    <th class="tg-0lax">Booth Number</th>
                </tr>
                <?php
                $stmt = $con->prepare("SELECT booth_number_id, number FROM booth_number");
                $stmt->execute();
                $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($stmt->fetchAll() as $bn)
                {
                    echo "<tr>";
                    echo "<th class='tg-0lax'>" . $bn['number'] . "</th>";
                    echo "<th class='tg-0lax'><a href='editBoothNumber.php?id=". $bn['booth_number_id']. "'>Edit Booth #</a> || </th>";
		    echo "<th class='tg-0lax'><a href='deleteBoothNumber.php?id=". $bn['booth_number_id']. "'>Delete Booth #</a></th>";
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