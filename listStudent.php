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
            <div class="card-heading">Student List</div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Student First Name</th>
                            <th class="tg-0lax">Student Last Name</th>
                            <th class="tg-0lax">Student Grade_ID</th>
                            <th class="tg-0lax">Student School_ID</th>
                            <th class="tg-0lax">Student County_ID</th>
                            <th class="tg-0lax">Student Project_ID</th>
                            <th class="tg-0lax">Edit Student</th>
                            <th class="tg-0lax">Delete Student</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT student_id, first_name, middle_name, last_name, gender, school_id, county_id, school_city, project_id, grade_id FROM student");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $student)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $student['first_name'] . "</th>";
                            echo "<th class='tg-0lax'>" . $student['last_name'] . "</th>";
                            echo "<th class='tg-0lax'>" . $student['grade_id'] . "</th>";
                            echo "<th class='tg-0lax'>" . $student['school_id'] . "</th>";
                            echo "<th class='tg-0lax'>" . $student['county_id'] . "</th>";
                            echo "<th class='tg-0lax'>" . $student['project_id'] . "</th>";


                            echo "<th class='tg-0lax'><a href='editStudent.php?id=". $student['student_id']. "'>Edit Student</a></th>";
                            echo "<th class='tg-0lax'><a href='studentDeleteSend.php?id=". $student['student_id']. "'>DELETE Student</a></th>";
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