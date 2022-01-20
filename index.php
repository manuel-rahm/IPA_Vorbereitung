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
<title>Cilag IT Tasks</title>
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
                include('data_query.php');
                
                foreach ($connection->query($data) as $row) {
                    if ($row['FLD_STATUS'] == "WIP" || $row['FLD_STATUS'] == "Pending")
                    {
                    if ($row['FLD_DESCRIPTION'] != "Decommission"){
                    if ($row['FLD_DESCRIPTION'] != "decommission"){
                    echo '<tr>';
                    echo '<td tasknr="' . $row['TASK_NR'] . '" class="RowTaskNr">'.$row['TASK_NR'].'</td>';
                    echo '<td>'.$row['RITMNR'].'</td>';
                    echo '<td>'.$row['CHGNR'].'</td>';
                    echo '<td>'.$row['FLDCI'].'</td>';
                    if ($row['GXP'] == 1){
                        echo '<td>Yes</td>'; 
                    } else { 
                        echo '<td>No</td>';
                    }
                    echo '<td>'.$row['REQUESTER'].'</td>';
                    if ($row['FLD_STATUS'] == "WIP"){
                        echo '<form action="update.php" method="POST"><td><select name="updatestatus"><optgroup label="Status"><option value="1" selected="selected">WIP</option><option value="2">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td></form>';
                    } elseif ($row['FLD_STATUS'] == "Pending") {
                        echo '<form action="update.php" method="POST"><td><select name="updatestatus"><optgroup label="Status"><option value="1">WIP</option><option value="2" selected="selected">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td></form>';
                    } 
                    echo '<td>'.$row['FLD_DESCRIPTION'].'</td>';
                    echo '<td>'.$row['RESPONSIBLE'].'</td>';
                    echo '<td style="width: 201px;">'.$row['LOCATION'].'</td>';
                    echo '</tr>';
                }
                }
                }
                } 

                ?>
                <form action="submit_open.php" method="POST">
                <tr>
                    <td><input type="text" name="inputTask"></td>
                    <td><input type="text" name="inputRITM"></td>
                    <td><input type="text" name="inputCHG"></td>
                    <td><input type="text" name="inputCI"></td>
                    <td><select name="inputGxP"><optgroup label="GxP"><option value="1"selected >Yes</option><option value="2">No</option></optgroup></select></td>
                    <td><input type="text" name="inputRequester"></td>
                    <td><select name="inputStatus"><optgroup label="Status"><option value="1" selected>WIP</option><option value="2">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>
                    <td><input type="text" name="inputDescription"></td>
                    <td><select name="inputResponsible"><optgroup label="Person"><option value="2" selected>kwinzel1</option><option value="3">nwindler</option><option value="1">mrahm</option></optgroup></select></td>
                    <td><input type="text" name="inputLocation"></td>
                </tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
    <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex"
            type="submit" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button>
            <a href="update.php" style="text-decoration: none;"><button id="update_button" class="btn btn-primary border rounded border-dark d-xl-flex" type="button" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Edit</button></a></div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>