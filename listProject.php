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
                            <th class="tg-0lax">Title</th>
                            <th class="tg-0lax">Abstract</th>
                            <th class="tg-0lax">Grade Level ID</th>
                            <th class="tg-0lax">Category_id</th>
                            <th class="tg-0lax">Edit Project</th>
                            <th class="tg-0lax">Delete Project</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT project_id, project_number, title, abstract, grade_level_id, category_id, booth_number_id, course_network_id, average_ranking FROM project");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $project)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $project['project_number'] . "</th>";
                            echo "<th class='tg-0lax'>" . $project['title'] . "</th>";
                            echo "<th class='tg-0lax'>" . $project['abstract'] . "</th>";
                            echo "<th class='tg-0lax'>" . $project['grade_level_id'] . "</th>";
                            echo "<th class='tg-0lax'>" . $project['category_id'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editProject.php?id=". $project['project_id']. "'>Edit Project</a></th>";
                            echo "<th class='tg-0lax'><a href='projectDeleteSend.php?id=". $project['project_id']. "'>DELETE Project</a></th>";
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