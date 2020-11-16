<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Admin Create New Input Data</div>
                <div class="card-body">

			<form action="adminCreateNewInputDataSend.php" method="post">
    				<div>
					<div class="input-group">
        					<label for="newSchoolInput"><b>New School Name: </b></label>
        					<input type="text" placeholder="Enter School Name" name="newSchoolInput">
					</div>
					<div class="input-group">
        					<label for="newCountyInput"><b>New County Name: </b></label>
        					<input type="text" placeholder="Enter County Name" name="newCountyInput">
					</div>
					<div class="input-group">
        					<label for="newCategoryInput"><b>New Category Name: </b></label>
        					<input type="text" placeholder="Enter Category" name="newCategoryInput">
					</div>
					<div class="input-group">
        					<label for="newProjectGradeInput"><b>New Project Grade level:</b></label>
        					<input type="text" placeholder="Enter Project grade level" name="newProjectGradeInput">
					</div>
                        <div class="input-group">
                            <label for="newStudentGradeInput"><b>New Student Grade Level:</b></label>
                            <input type="text" placeholder="Enter Student grade level" name="newStudentGradeInput">
                        </div>
        				<br /><button class="btn btn--radius btn--green" type="submit">Create</button>
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