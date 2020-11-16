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
                            <th class="tg-0lax">Student Grade</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT grade_id, grade FROM grade");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $stg)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $stg['grade'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editStudentGrade.php?id=". $stg['grade_id']. "'>Edit Student Grade</a> || </th>";
                            echo "<th class='tg-0lax'><a href='deleteStudentGrade.php?id=". $stg['grade_id']. "'>Delete Student Grade</a></th>";

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