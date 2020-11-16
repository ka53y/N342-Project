<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading">Create New Judge</div>
            <div class="card-body">

                <form action="createNewJudgeSend.php" method="post">
                    <div>
                        <div class="input-group">
                            <label for="newJudgeFirstName"><b>Enter Judge's First Name</b></label>
                            <input type="text" placeholder="Enter Judge's First Name" name="newJudgeFirstName" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgeMiddleName"><b>Enter Judge's Middle Name</b></label>
                            <input type="text" placeholder="Enter Judge's Middle Name" name="newJudgeMiddleName" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgeLastName"><b>Enter Judge's Last Name</b></label>
                            <input type="text" placeholder="Enter Judge's Last Name" name="newJudgeLastName" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgeTitle"><b>Enter Judge's Title</b></label>
                            <input type="text" placeholder="Enter Judge's Title" name="newJudgeTitle" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgeHighestDegreeEarned"><b>Enter Judge's Highest Degree Earned</b></label>
                            <input type="text" placeholder="Enter Judge's Highest Degree Earned" name="newJudgeHighestDegreeEarned" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgeEmployer"><b>Enter Judge's Employer</b></label>
                            <input type="text" placeholder="Enter Judge's Employer" name="newJudgeEmployer" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgeYear"><b>Enter Judge's Year</b></label>
                            <input type="text" placeholder="Enter Judge's Year" name="newJudgeYear" required>
                        </div>

                        <div class="input-group">
                            <label for="newJudgeEmail"><b>Enter Judge's Email</b></label>
                            <input type="text" placeholder="Enter Judge's Email" name="newJudgeEmail" required>
                        </div>
                        <div class="input-group">
                            <label for="newJudgePassword"><b>Enter Judge's Password</b></label>
                            <input type="text" placeholder="Enter Judge's Password" name="newJudgePassword" required>
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