<?php
require_once "inc/util.php";
require_once "dbconnect.php";
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "Select * FROM project WHERE project_id = " . $id;

try {
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $project)
    {
        $number = $project['project_number'];
        $title = $project['title'];
        $abstract = $project['abstract'];
        $grade = $project['grade_level_id'];
        $category = $project['category_id'];
        $booth = $project['booth_number_id'];
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
            <div class="card-heading">Admin Edit Project</div>
            <div class="card-body">

                <form action="editProjectSend.php" method="post">
                    <div>
                        <div class="input-group">
                            <label for="newProjectNumber"><b>Project Number: </b></label>
                            <input type="text" placeholder="<?=$number?>" name="newProjectNumber" required>
                        </div>
                        <div class="input-group">
                            <label for="newProjectName"><b>Project Title: </b></label>
                            <input type="text" placeholder="<?=$title?>" name="newProjectName" required>
                        </div>
                        <div class="input-group">
                            <label for="newProjectAbstract"><b>Project Abstract: </b></label><br />
                            <textarea rows="4" cols="50" name="newProjectAbstract" required>

        					</textarea>
                        </div>
                        <input type="hidden" value="<?=$id?>" name="userID"/>
                        <div class="input-group">
                            <label for="newProjectCategory"><b>Choose the Project's Category: </b></label>
                            <input type="text" placeholder="<?=$category?>" name="newProjectCategory" required>
                        </div>
                        <input type="hidden" value="<?=$id?>" name="userID"/>
                        <div class="input-group">
                            <label for="newProjectGradeLevel"><b>Choose the Project's Grade Level </b></label>
                            <input type="text" placeholder="<?=$grade?>" name="newProjectGradeLevel" required>
                        </div>
                        <div class="input-group">
                            <label for="newProjectBoothNumber"><b>Choose the Project's Booth Number: </b></label>
                            <input type="text" placeholder="<?=$booth?>" name="newProjectBoothNumber" required>
                        </div>
                        <br /><br /><button class="btn btn--radius btn--green" type="submit">Create</button>
                    </div>

                    <div>
                        <br /><br /><button class="btn btn--radius btn--red" type="button" >Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include('includes/footer.php');
?>