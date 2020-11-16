<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Admin Create New Student</div>
                <div class="card-body">

			<form action="adminCreateNewStudentSend.php" method="post">
    				<div>
					<div class="input-group">
        					<label for="newStudentFirstName"><b>Student First Name</b></label>
        					<input type="text" placeholder="Enter Student's First Name" name="newStudentFirstName" required>
					</div>
                        <div class="input-group">
                            <label for="newStudentMiddleName"><b>Student Middle Name</b></label>
                            <input type="text" placeholder="Enter Student's Middle Name" name="newStudentMiddleName" required>
                        </div>
					<div class="input-group">
        					<label for="newStudentLastName"><b>Student Last Name</b></label>
        					<input type="text" placeholder="Enter Student's Last Name" name="newStudentLastName" required>
					</div>
                        <div class="input-group">
                            <label for="newStudentGender"><b>Student's Gender</b></label>
                            <input type="text" placeholder="Enter Student's Gender" name="newStudentGender" required>
                        </div>
                        <div class="input-group">
                            <label for="newStudentCounty"><b>Student's County ID</b></label>
                            <input type="text" placeholder="Enter Student's County ID" name="newStudentCounty" required>
                        </div>
<!-- hopefully we can have these next 3 be drop downs that auto-fill with the created schools and projects from out DB. -->
                        <div class="input-group">
                            <label for="newStudentSchool"><b>School ID</b></label>
                            <input type="text" placeholder="Enter Student's school ID" name="newStudentSchool" required>
                        </div>
                        <div class="input-group">
                            <label for="newStudentSchoolCity"><b>Enter Students school's City</b></label>
                            <input type="text" placeholder="Enter Student's schools City" name="newStudentSchoolCity" required>
                        </div>
                        <div class="input-group">
                            <label for="newStudentProject"><b>Project ID</b></label>
                            <input type="text" placeholder="Enter Project's ID" name="newStudentProject" required>
                        </div>
                        <div class="input-group">
                            <label for="newStudentGradeLevel"><b>Enter Student's Grade Level</b></label>
                            <input type="text" placeholder="Enter Student's ID" name="newStudentGradeLevel" required>
                        </div>
        				<br /><button class="btn btn--radius btn--green" type="submit">Create</button>
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