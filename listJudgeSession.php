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
                <div class="card-heading">Judge Session List </div>
                <div class="card-body">

			<div id = "wrapper">
			<table>
                <tr>
                    <th class="tg-0lax">Judge Session Number</th>
		    <th class="tg-0lax">Judge Session Start Time</th>
		    <th class="tg-0lax">Judge Session End Time</th>
                </tr>
                <?php
                $stmt = $con->prepare("SELECT session_id, session_number, start_time, end_time FROM session");
                $stmt->execute();
                $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                foreach ($stmt->fetchAll() as $js)
                {
                    echo "<tr>";
                    echo "<th class='tg-0lax'>" . $js['session_number'] . "</th>";
		    echo "<th class='tg-0lax'>" . $js['start_time'] . "</th>";
		    echo "<th class='tg-0lax'>" . $js['end_time'] . "</th>";
                    echo "<th class='tg-0lax'><a href='editJudgeSession.php?id=". $js['session_id']. "'>Edit Session</a> </th>";
		    echo "<th class='tg-0lax'><a href='deleteJudgeSession.php?id=". $js['session_id']. "'>Delete Session</a></th>";
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