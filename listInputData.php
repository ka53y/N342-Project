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
                            <th class="tg-0lax">School</th>
                            <th class="tg-0lax">County</th>
                            <th class="tg-0lax">Category</th>
                            <th class="tg-0lax">Student Grade</th>
                            <th class="tg-0lax">Project Grade Level</th>
                        </tr>
                       <tr>
                           <th><a href="createNewSchool.php">New School</a> </th>
                           <th><a href="createNewCounty.php">New County</a> </th>
                           <th><a href="createNewCategory.php">New Category</a> </th>
                           <th><a href="createNewStudentGrade.php">New Student Grade</a> </th>
                           <th><a href="createNewProjectGradeLevel.php">New Project Grade Level</a> </th>
                       </tr>
                        <tr>
                            <th><a href="listSchool.php">list Schools</a> </th>
                            <th><a href="listCounty.php">List County</a> </th>
                            <th><a href="listCategory.php">List Category</a> </th>
                            <th><a href="listStudentGrade.php">List Student Grades</a> </th>
                            <th><a href="ListProjectGradeLevel.php">List Project Grade Levels</a></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>