<?php
include("dbconnect.php");
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
	exit;
}
if($_POST['inputTask'] == NULL && $_POST['inputRITM'] == NULL) {
        echo '<p class="success">Please fill in Task and RITM number</p><style>p {font-weight:bold; font-size:20px;}</style>';
        echo '<script type="text/javascript">setTimeout(function () {
        window.location.href = "index.php";}, 2500);</script>';
} else {
        include("handling/stmts_update.php");
                if ($stmtinsertci->execute($ci) || $stmtinsertrequester->execute($requester) ||  $stmtinsertlocation->execute($location)){
                        $stmtupdatetask->execute($task);
                        $stmtupdateci->execute($ci);
                        $stmtupdaterequester->execute($requester);
                        $stmtupdatelocation->execute($location);
                        $stmtupdatedata->execute($data);
                        $stmtupdatefkci->execute($ci);
                        $stmtupdatefklocation->execute($location);
                echo '<p class="success">Record updated successfully!</p><style>p {font-weight:bold; font-size:20px;}</style>';
                echo '<script type="text/javascript">setTimeout(function () {
                        window.location.href = "index.php";}, 2000);</script>';
        } else {
                echo '<p class="success">Record was not updated, please check entered values!</p><style>p {font-weight:bold; font-size:20px;}</style>';
                echo '<script type="text/javascript">setTimeout(function () {
                       window.location.href = "index.php";}, 2000);</script>';
        }

        
} 

?>