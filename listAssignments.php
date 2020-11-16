<?php
session_start();
$_SESSION['timeout'] = time();

require_once "inc/util.php";
require_once "dbconnect.php";
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="card card-1">
            <div class="card-heading">Assignment's List</div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Assignment #</th>
                            <th class="tg-0lax">Session</th>
                            <th class="tg-0lax">Project</th>
                            <th class="tg-0lax">Judge</th>
                            <th class="tg-0lax">Score</th>
                            <th class="tg-0lax">Edit Assignment</th>
                            <th class="tg-0lax">Delete Assignment</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT * FROM assignment");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $assignment)
                        {
                        $sessionHolder = "";
                        $projectHolder = "";
                        $judgeHolder = "";
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
                            }

                            $stmt = $con->prepare("SELECT * FROM judge WHERE judge_id =". $assignment['judge_id']);
                            $stmt->execute();
                            $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach ($stmt->fetchAll() as $judge)
                            {
                                $judgeHolder .= $judge['first_name'] . " " . $judge['last_name'];
                            }
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $assignment['assignment_id'] . "</th>";
                            echo "<th class='tg-0lax'>" . $sessionHolder . "</th>";
                            echo "<th class='tg-0lax'>" . $projectHolder . "</th>";
                            echo "<th class='tg-0lax'>" . $judgeHolder . "</th>";
                            echo "<th class='tg-0lax'>" . $assignment['score'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editAssignment.php?id=". $assignment['assignment_id']. "'>Edit Assignment</a></th>";
                            echo "<th class='tg-0lax'><a href='AssignmentDeleteSend.php?id=". $assignment['assignment_id']. "'>DELETE Assignment</a></th>";
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