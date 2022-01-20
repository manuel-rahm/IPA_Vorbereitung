<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
include("dbconnect.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<head>
<title>Cilag IT Tasks closed</title>
</head>
    <?php include("header.php"); ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="background-color: #b5dbff;">
                    <th>Task Nr.</th>
                    <th>RITM Nr.</th>
                    <th>CHG Nr.</th>
                    <th>CI</th>
                    <th>GxP</th>
                    <th>Task Requester</th>
                    <th>Task Status</th>
                    <th>Description</th>
                    <th>Responsible</th>
                    <th style="width: 201px;">Location</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("data_query.php");
                    foreach ($connection->query($data) as $row) {
                        if ($row['FLD_STATUS'] == "Closed" || $row['FLD_STATUS'] == "Canceled")
                        {
                        echo '<tr>';
                        echo '<td>'.$row['TASK_NR'].'</td>';
                        echo '<td>'.$row['RITMNR'].'</td>';
                        echo '<td>'.$row['CHGNR'].'</td>';
                        echo '<td>'.$row['FLDCI'].'</td>';
                        if ($row['GXP'] == 1){
                            echo '<td>Yes</td>'; 
                        } else { 
                            echo '<td>No</td>';
                        }
                        echo '<td>'.$row['REQUESTER'].'</td>';
                        echo '<td>'.$row['FLD_STATUS'].'</td>';
                        echo '<td>'.$row['FLD_DESCRIPTION'].'</td>';
                        echo '<td>'.$row['RESPONSIBLE'].'</td>';
                        echo '<td style="width: 201px;">'.$row['LOCATION'].'</td>';
                        echo '</tr>';
                    }
                    else {}
                    } 

                    ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex" type="button" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button></div> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>