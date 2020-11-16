<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Admin Create New Project</div>
                <div class="card-body">

			<form action="adminCreateNewProjectSend.php" method="post">
                <div>
                    <div class="input-group">
                        <label for="newProjectNumber"><b>Project Number </b></label>
                        <input type="text" placeholder="Enter the project number" name="newProjectNumber" required>
                    </div>
                    <div class="input-group">
                        <label for="newProjectName"><b>Project Name: </b></label>
                        <input type="text" placeholder="Enter First Name" name="newProjectName" required>
                    </div>
                    <div class="input-group">
                        <label for="newProjectAbstract"><b>Project Abstract: </b></label><br />
                        <textarea rows="4" cols="50" name="newProjectAbstract" required>

        					</textarea>
                    </div>
                    <!-- these next three  will also hopefully be filled in with the database option when DB complete. -->
                    <div class="input-group">
                        <label for="newProjectCategory"><b>Enter the Project's Category: </b></label>
                        <input type="text" placeholder="Enter Project Name" name="newProjectCategory" required>
                    </div>
                    <div class="input-group">
                        <label for="newProjectGradeLevel"><b>Enter the Project's Grade Level </b></label>
                        <input type="text" placeholder="Enter Project Grade Level" name="newProjectGradeLevel" required>
                    </div>
                    <div class="input-group">
                        <label for="newProjectBoothNumber"><b>Enter the Project's Booth Number: </b></label>
                        <input type="text" placeholder="Choose the Project's Booth Number" name="newProjectBoothNumber" required>
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