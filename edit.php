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
<title>Cilag IT Tasks Editor</title>
</head>
    <?php include("header.php"); ?>
	<div class="table-responsive">
        <form action="update_row.php">
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
                include('data_query.php');
                foreach ($connection->query($data) as $row) {
                    $compareRITM = $_GET["compareRITM"];
                    if ($row['FLD_STATUS'] == "WIP" || $row['FLD_STATUS'] == "Pending")
                    {
                    if ($row['RITMNR'] == $compareRITM){
                    echo '<form action="update.php" method="POST">';
                    echo '<tr>';
                    echo '<td><input type="text" name="inputTask" value="'. $row['TASK_NR'] . '"></td>';
                    echo '<td><input type="text" name="inputRITM" value="'. $row['RITMNR'] . '"></td>';
                    echo '<td><input type="text" name="inputCHG" value="'. $row['CHGNR'] . '"></td>';
                    echo '<td><input type="text" name="inputCI" value="'. $row['FLDCI'] . '"></td>';
                    if ($row['GXP'] == 1){
                        echo '<td><select name="inputGxP"><optgroup label="GxP"><option value="1"selected>Yes</option><option value="2">No</option></optgroup></select></td>'; 
                    } else { 
                        echo '<td><select name="inputGxP"><optgroup label="GxP"><option value="1">Yes</option><option value="2" selected>No</option></optgroup></select></td>';
                    }
                    echo '<td><input type="text" name="inputRequester" value="'. $row['REQUESTER'] . '"></td>';
                    if ($row['FLD_STATUS'] == "WIP"){
                        echo '<td><select name="updatestatus"><optgroup label="Status"><option value="1" selected="selected">WIP</option><option value="2">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>';
                    } elseif ($row['FLD_STATUS'] == "Pending") {
                        echo '<td><select name="updatestatus"><optgroup label="Status"><option value="1">WIP</option><option value="2" selected="selected">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>';
                    } 
                    echo '<td><input type="text" name="inputDescription" value="'. $row['FLD_DESCRIPTION'] . '"></td>';
                    if ($row['RESPONSIBLE'] == "kwinzel1") {
                        echo '<td><select name="inputResponsible"><optgroup label="Person"><option value="2" selected>kwinzel1</option><option value="3">nwindler</option><option value="1">mrahm</option></optgroup></select></td>';
                    }
                        elseif ($row['RESPONSIBLE'] == "mrahm") {
                            
                        }
                    echo '<td style="width: 201px;">'.$row['LOCATION'].'</td>';
                    
                    echo '</tr>';
                    echo '</form>';
                }
                }
                }
                ?>
            
            </tbody>
        </table>
        </form>
    </div>
    <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex"
            type="submit" style="margin: 0 auto; margin-top: 20px; background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button>
          </div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>