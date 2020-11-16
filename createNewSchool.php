<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<!-- this is a pretty straight forward form, all the forms so for get passed into a send php page that right now does nothing but eventually
will add all this given information to the DB. -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading">Admin Create New School</div>
            <div class="card-body">

                <form action="createNewSchoolSend.php" method="post">
                    <div>
                        <!-- every one of my form inputs will be set up like this no matter the type, label in bold, then input, feel free to change -->
                        <div class="input-group">
                            <label for="newSchoolName"><b>School's Name</b></label>
                            <input type="text" placeholder="Enter School's Name" name="newSchoolName" required>
                        </div>
                        <div class="input-group">
                            <label for="newSchoolCity"><b>School's City</b></label>
                            <input type="text" placeholder="Enter School's City" name="newSchoolCity" required>
                        </div>
                        <div class="input-group">
                            <label for="newSchoolCounty"><b>School's County</b></label>
                            <input type="number" placeholder="Enter School's County" name="newSchoolCounty" required>
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