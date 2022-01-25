<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
include ('dbconnect.php');
include("handling/DisplayData.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<head>
<title>Decomission</title>
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
                    <th>Responsible</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('data_query.php');
                DisplayData::displayDecommission($connection, $data);
                ?>
                <form action="submit_decommission.php" method="POST">
                <tr>
                    <td><input type="text" name="inputTask"></td>
                    <td><input type="text" name="inputRITM"></td>
                    <td><input type="text" name="inputCHG"></td>
                    <td><input type="text" name="inputCI"></td>
                    <td><select name="inputGxP"><optgroup label="GxP"><option value="1"selected >Yes</option><option value="2">No</option></optgroup></select></td>
                    <td><input type="text" name="inputRequester"></td>
                    <td><select name="inputStatus"><optgroup label="Status"><option value="1" selected>WIP</option><option value="2">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>
                    <td><select name="inputResponsible"><optgroup label="Person"><option value="2" selected>kwinzel1</option><option value="3">nwindler</option><option value="1">mrahm</option></optgroup></select></td>
                </tr>
                <tr></tr>
            </tbody>
        </table>
    </div>
    <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex"
            type="submit" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>