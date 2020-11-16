<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<!-- this is a pretty straight forward form, all the forms so for get passed into a send php page that right now does nothing but eventually
will add all this given information to the DB. -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Admin Create New Project</div>
                <div class="card-body">

			<form action="adminCreateNewAdminSend.php" method="post">
    				<div>
        <!-- every one of my form inputs will be set up like this no matter the type, label in bold, then input, feel free to change -->
					<div class="input-group">
        					<label for="newAdminFirstName"><b>New Admin First Name</b></label>
        					<input type="text" placeholder="Enter First Name" name="newAdminFirstName" required>
					</div>
                        <div class="input-group">
                            <label for="newAdminMiddleName"><b>New Admin Middle Name</b></label>
                            <input type="text" placeholder="Enter Middle Name" name="newAdminMiddleName" required>
                        </div>
					<div class="input-group">
        					<label for="newAdminLastName"><b>New Admin Last Name</b></label>
        					<input type="text" placeholder="Enter Last Name" name="newAdminLastName" required>
					</div>
                        <div class="input-group">
                            <label for="newAdminEmail"><b>New Admin Email Address</b></label>
                            <input type="text" placeholder="Enter Email" name="newAdminEmail" required>
                        </div>
					<div class="input-group">
        					<label for="newAdminPassword"><b>New Admin Password</b></label>
        					<input type="password" placeholder="Enter Password" name="newAdminPassword" required>
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