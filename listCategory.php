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
            <div class="card-heading">Category List </div>
            <div class="card-body">

                <div id = "wrapper">
                    <table>
                        <tr>
                            <th class="tg-0lax">Category Name</th>
                        </tr>
                        <?php
                        $stmt = $con->prepare("SELECT category_id, category_name FROM category");
                        $stmt->execute();
                        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach ($stmt->fetchAll() as $cat)
                        {
                            echo "<tr>";
                            echo "<th class='tg-0lax'>" . $cat['category_name'] . "</th>";
                            echo "<th class='tg-0lax'><a href='editCategory.php?id=". $cat['category_id']. "'>Edit Category</a> || </th>";
                            echo "<th class='tg-0lax'><a href='deleteCategory.php?id=". $cat['category_id']. "'>Delete Category</a></th>";

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