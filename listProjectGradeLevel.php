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
            <div class="card-heading">Student Grade List </div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Project Grade</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT grade_level_id, level_name FROM project_grade_level");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $pgl)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $pgl['level_name'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editProjectGradeLevel.php?id=". $pgl['grade_level_id']. "'>Edit Project Grade</a> || </th>";
                            echo "<th class='tg-0lax'><a href='deleteProjectGradeLevel.php?id=". $pgl['grade_level_id']. "'>Delete Project Grade</a></th>";
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