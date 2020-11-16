<?php
require_once "inc/util.php";
require_once "dbconnect.php";
session_start();
if(isset($_SESSION['adminloggedin']))
{
    if($_SESSION['adminloggedin'] == false)
    {
        Header("Location:adminLogin.php");
    }
}
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "Select * FROM grade WHERE grade_id= " . $id;

try {
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $stg)
    {
        $addStg = $stg['grade'];
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading">Edit Grade Level: <?=$addStg?></div>
            <div class="card-body">

                <div id = "wrapper">
                    <form action="editStudentGradeSend.php" method="post">
                        <div>
                            <!-- every one of my form inputs will be set up like this no matter the type, label in bold, then input, feel free to change -->
                            <div class="input-group">
                                <label for="newStudentGrade"><b>Edit Category Name</b></label>
                                <input type="text" placeholder="<?=$addStg?>" name="newStudentGrade" required>
                            </div>
                            <input type="hidden" value="<?=$id?>" name="userID"/>
                            <div class="input-group">
                                <br /><button class="btn btn--radius btn--green" type="submit">Edit User</button>
                            </div>


                            <div>
                                <br /><button class="btn btn--radius btn--red" type="button" >Cancel</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
