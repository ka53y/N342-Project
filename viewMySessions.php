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
        <div class="card-heading">My Sessions</div>
        <div class="card-body">

            <div id = "wrapper">
                <table>
                    <tr>
                        <th class="tg-0lax">Session</th>
                        <th class="tg-0lax">Project</th>
                        <th class="tg-0lax">Booth Number</th>
                    </tr>
                    <?php
                    $stmt = $con->prepare("SELECT * FROM assignment WHERE judge_id = ". $_SESSION['uid']);
                    $stmt->execute();
                    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach ($stmt->fetchAll() as $assignment)
                    {
                        $sessionHolder = "";
                        $projectHolder = "";
                        $boothHolder = "";
                        $stmt = $con->prepare("SELECT * FROM session WHERE session_id =". $assignment['session_id']);
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $ses)
                        {
                            $sessionHolder .= $ses['session_date'] . " | " . $ses['start_time'] . "-" . $ses['end_time'];
                        }
                        $stmt = $con->prepare("SELECT * FROM project WHERE project_id =". $assignment['project_id']);
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $pro)
                        {
                            $projectHolder .= $pro['title'];
                            $boothHolder .= $pro['booth_number_id'];
                        }

                        echo "<tr>";
                        echo "<th class='tg-0lax'>" . $sessionHolder . "</th>";
                        echo "<th class='tg-0lax'>" . $projectHolder . "</th>";
                        echo "<th class='tg-0lax'>" . $boothHolder . "</th>";
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