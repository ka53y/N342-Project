<?php
session_start();
$_SESSION['timeout'] = time();

require_once "inc/util.php";
require_once "dbconnect.php";
?>

<script src="script.js"></script>
<link rel="stylesheet" href="style.css">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading">View Average Rank</div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Project Number</th>
                            <th class="tg-0lax">Average Rank</th>
                        </tr>
                        <?php
                        
			$stmt = $con->prepare("SELECT project_number FROM project");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);

			$dispOut = 0;
			$avgNum = 0;
			$totalOut = 0;
			$proj1 = 0;
			$proj2 = 0;
			foreach ($stmt->fetchAll() as $pDispOut)
			{
			
			$avgNum = 0;
			$totalOut = 0;
			$avgNum = 0;
			$proj1 = $pDispOut['project_number'];
			$stmt = $con->prepare("SELECT * FROM project_Rank WHERE project_number =". $pDispOut['project_number']);
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $pDisp)
                        {        
				$proj2 = $pDisp['project_number'];
				if($proj1 == $proj2){
				 $avgNum = $avgNum + 1;
				 $dispOut += $pDisp['rank'];
				}   	
                            	
			   
                        }
			$totalOut = $dispOut/$avgNum;
			$dispOut = 0;
			echo "<tr>";
                        echo "<th class='tg-0lax'>" . $pDispOut['project_number'] . "</th>";
                        echo "<th class='tg-0lax'>" . floor($totalOut) . "</th>";
                        echo "</tr>";
			}

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>