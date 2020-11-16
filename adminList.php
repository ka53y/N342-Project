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
                <div class="card-heading">Admin List </div>
                <div class="card-body">

			<div id = "wrapper">
			<table>
                <tr>
                    <th class="tg-0lax">First Name</th>
                    <th class="tg-0lax">Middle Name</th>
                    <th class="tg-0lax">Last Name</th>
                    <th class="tg-0lax">Email Address</th>
                    <th class="tg-0lax">Edit the Admin</th>
                    <th class="tg-0lax">Delete the Admin</th>
                </tr>
                <?php
                $stmt = $con->prepare("SELECT admin_id, first_name, middle_name, last_name, email FROM administrator");
                $stmt->execute();
                $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($stmt->fetchAll() as $person)
                {
                    echo "<tr>";
                    echo "<th class='tg-0lax'>" . $person['first_name'] . "</th>";
                    echo "<th class='tg-0lax'>" . $person['middle_name'] . "</th>";
                    echo "<th class='tg-0lax'>" . $person['last_name'] . "</th>";
                    echo "<th class='tg-0lax'>" . $person['email'] . "</th>";
                    echo "<th class='tg-0lax'><a href='editAdmin.php?id=". $person['admin_id']. "'>Edit Admin</a></th>";
                    echo "<th class='tg-0lax'><a href='adminDeleteSend.php?id=". $person['admin_id']. "'>DELETE Admin</a></th>";
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