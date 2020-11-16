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
            <div class="card-heading">Project List</div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Project #</th>
                            <th class="tg-0lax">Score</th>
                            <th class="tg-0lax">Rank</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT project_id, project_number, score, rank FROM project_Rank");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $projectR)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $projectR['project_number'] . "</th>";
                            echo "<th class='tg-0lax'>" . $projectR['score'] . "</th>";
                            echo "<th class='tg-0lax'>" . $projectR['rank'] . "</th>";
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