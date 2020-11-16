<?php
session_start();
$_SESSION['timeout'] = time();

require_once "inc/util.php";
require_once "dbconnect.php";
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div >
        <div class="card card-1">
            <div class="card-heading">Judge List</div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Judge First Name</th>
                            <th class="tg-0lax">Judge Last Name</th>
                            <th class="tg-0lax">Judge Email</th>
                            <th class="tg-0lax">Judge Category Preferences</th>
                            <th class="tg-0lax">Judge Grade Preferences</th>
                            <th class="tg-0lax">Judge Assignemnts</th>
                            <th class="tg-0lax">Edit Judge</th>
                            <th class="tg-0lax">Delete Judge</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT judge_id, first_name, last_name, email FROM judge");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $judge)
                        {
                            $gradeHolder = "";
                            $catHolder = "";
                            $assignmentHolder = "";
                            $stmt1 = $con->prepare("SELECT category_id FROM judge_category_preference WHERE judge_id = " . $judge['judge_id']);
                            $stmt1->execute();
                            $results = $stmt1->setFetchMode(PDO::FETCH_ASSOC);
                            foreach ($stmt1->fetchAll() as $cat) {
                                $stmt2 = $con->prepare("SELECT category_name FROM category WHERE category_id = " . $cat['category_id']);
                                $stmt2->execute();
                                $results = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                                foreach ($stmt2->fetchAll() as $category) {
                                    $catHolder .= $category['category_name'] . " | ";
                                }
                            }
                            $stmt3 = $con->prepare("SELECT grade_level_id FROM judge_grade_preference WHERE judge_id = " . $judge['judge_id']);
                            $stmt3->execute();
                            $results = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
                            foreach ($stmt3->fetchAll() as $grade) {
                                $stmt4 = $con->prepare("SELECT level_name FROM project_grade_level WHERE grade_level_id = " . $grade['grade_level_id']);
                                $stmt4->execute();
                                $results = $stmt4->setFetchMode(PDO::FETCH_ASSOC);
                                foreach ($stmt4->fetchAll() as $level) {
                                    $gradeHolder .= $level['level_name'] . " | ";
                                }
                            }
                            $stmt3 = $con->prepare("SELECT assignment_id FROM assignment WHERE judge_id = " . $judge['judge_id']);
                            $stmt3->execute();
                            $results = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
                            foreach ($stmt3->fetchAll() as $assignment) {
                                $assignmentHolder .= $assignment['assignment_id'] . " | ";
                            }



                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $judge['first_name'] . "</th>";
                            echo "<th class='tg-0lax'>" . $judge['last_name'] . "</th>";
                            echo "<th class='tg-0lax'>" . $judge['email'] . "</th>";
                            echo "<th class='tg-0lax'>" . $catHolder . "</th>";
                            echo "<th class='tg-0lax'>" . $gradeHolder . "</th>";
                            echo "<th class='tg-0lax'>" . $assignmentHolder . "</th>";


                            echo "<th class='tg-0lax'><a href='editJudge.php?id=". $judge['judge_id']. "'>Edit Judge</a></th>";
                            echo "<th class='tg-0lax'><a href='judgeDeleteSend.php?id=". $judge['judge_id']. "'>DELETE Judge</a></th>";
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