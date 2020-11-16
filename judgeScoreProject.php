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
                <div class="card-heading">Judge Score Card</div>
                <div class="card-body">

			<form action="judgeScoreProjectSend.php" method="post">
    				<div>
					<div class="input-group">
        					<label for="projectNum"><b>Project Title: <?=$title?></b></label>
       					</div>
					<div class="input-group">
        					<label for="projectNum"><b>Project Number: <?=$number?></b></label>
						<input type="number" value="<?=$number?>" name="projectNumber">
       					</div>
					<div class="input-group">
        					<label for="judgeScoreValue"><b>Score: </b></label>
        					<input type="number" placeholder="Enter score value" name="judgeScoreValue" required>
					</div>	
					<div class="input-group">
        					<label for="judgeRankValue"><b>Rank: </b></label>
        					<input type="number" placeholder="Enter rank of project" name="judgeRankValue" required>
					</div>

        				<button class="btn btn--radius btn--green" type="submit">Submit Score</button>
   				</div>
    				<div>
        				<br /><button class="btn btn--radius btn--red" type="button" >Cancel</button>
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