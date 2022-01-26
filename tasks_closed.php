<!DOCTYPE html>
<html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
// If the user is not logged in redirect to the login page...
include("dbconnect.php");
include("handling/DisplayData.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
?>
<head>
<title>Cilag IT Tasks closed</title>
</head>
    <?php include("header.php"); ?>
    <div style="background-color: #b5dbff; height:60px;">
    <input style ="float: right; margin:15px 10px;" type="text" class="table-filter" data-table="order-table" placeholder="Search"/>
    </div>
    <div class="table-responsive">
        <table style="width:100%;"class="sortable-theme-minimal order-table table" id="closedtable" data-sortable>
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
                    DisplayData::displayClosed($connection, $data);
                    ?>
            </tbody>
        </table>
    </div>
    <!-- <div class="d-xl-flex justify-content-xl-end"><button class="btn btn-primary border rounded border-dark d-xl-flex" type="button" style="margin: 20px;background-color: rgb(0,0,0);color: rgb(255,255,255);font-weight: bold;">Submit</button></div> -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/search.js"></script>
    <link rel="stylesheet" href="assets/sortable/css/sortable-theme-minimal.css" />
    <script src="assets/sortable/js/sortable.min.js"></script>
</body>
</html>