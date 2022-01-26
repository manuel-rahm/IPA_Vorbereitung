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
    <title>Cilag IT Tasks Guide</title>
</head>
<body>
<?php include("header.php"); ?>
<h2 class="ptitle">IMPORTANT:</h2>
<p class="text">
    <ul class="list">
        <li class="text">DO NOT change the Task and RITM-Number simultaneously</li></br>
        <li class="text">Task and RITM-Number must be inserted to create a Task</li></br>
        <li class="text">The "Description" field of decommission tasks should always be "Decommission" / "decommission"</li></br>
        <li class="text">The location of decommission tasks are "78.03.18"</li></br>
        <li class="text">The location of tasks: building . floor . room number (xx.xx.xx)</li></br>
        <li class="text">You can omit the change number, if required</li></br>
        <li class="text">Closed tasks cannot be changed</li></br>
        <li class="text">The CI must be entered in captial letters</li></br>
        <li class="text">First letter of each name of a task requester in capitals:</br> <b>R</b>afael <b>B</b>eyeler</li></br>
        <li class="text">Keep the description as short as possible</li></br>
        <li class="text">You can find an example of how a task should look like below:</li></br>
    </ul>
    <img id="exampletask" src="assets/img/example_task.jpg">
</p>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<style>.ptitle {
font-size: 28px;
text-align: center;
margin:10px 0px;
font-weight: bold;
}
.text {
    text-align: left;
    text-decoration: center;
}
.list {
    width: 28%;
    margin: 0 auto;
}
#exampletask {
    display: block;
    margin: 0 auto;
    border:3px solid black;
}
</style>
</body>
</html>