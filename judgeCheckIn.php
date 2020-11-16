<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading">Judge Check In</div>
                <div class="card-body">

			<form action="judgeCheckInSend.php" method="post">
    				<div>
					<div class="input-group">
        				<label for="judgeCheckInSession"><b>Choose the session you are checking In for: </b></label>
        				<select name="judgeCheckInSession" required>
            					<option value="session1">Period 1</option>
            					<option value="session2">Period 2</option>
            					<option value="session3">Period 3</option>
            					<option value="session4">Period 4</option>
        				</select>
					</div>
        				<br /><br /><button class="btn btn--radius btn--green" type="submit">Check In</button>
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