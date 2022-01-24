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
        $data = [
        'tasknr' => $_POST['inputTask'],
        'ritmnr' => $_POST['inputRITM'],
        'chgnr' => $_POST['inputCHG'],
        'gxp' => $_POST['inputGxP'],
        'stat' => $_POST['inputStatus'],
        'descr' => $_POST['inputDescription'],
        'responsible' => $_POST['inputResponsible'],
        ];
        $ci = [
        'ci' => $_POST['inputCI'],
        ];
        $requester = [
        'requester' => $_POST['inputRequester'],
        ];
        $location = [
        'loc' => $_POST['inputLocation'],
        ];
                
        
                $sql1 = "UPDATE tblci (fldCI)
                SET (:ci) WHERE NOT EXISTS (SELECT 1 FROM tblci AS b WHERE b.fldCI = (:ci))";
                $stmt1 = $connection->prepare($sql1);

                $sql2 = "UPDATE tblrequester (fldRequester)
                SET (:requester) WHERE NOT EXISTS (SELECT 1 FROM tblrequester AS b WHERE b.fldRequester = (:requester))";
                $stmt2 = $connection->prepare($sql2);
                
                $sql3 = "UPDATE INTO tbllocation (fldLocation)
                SET (:loc) WHERE NOT EXISTS (SELECT 1 FROM tbllocation AS b WHERE b.fldLocation = (:loc))";
                $stmt3 = $connection->prepare($sql3);

                $sql = "UPDATE tbltasks (fldTaskNr, fldRITMNr, fldCHGNr, fkGxP, fkStatus, fldDescription, fkResponsible)
                VALUES (:tasknr, :ritmnr, :chgnr, :gxp, :stat, :descr, :responsible)";
                $stmt = $connection->prepare($sql);

        if ($stmt1->execute($ci) && $stmt2->execute($requester) && $stmt3->execute($location) && $stmt->execute($data)){
                $sql4 = "UPDATE tbltasks SET fkCI = (SELECT pkCI FROM tblCI AS b WHERE b.fldCI = (:ci)) WHERE pkTasks = (:tasknr)";
                $stmt4 = $connection->prepare($sql4);
                $stmt4->execute($ci);
                $sql5 = "UPDATE tbltasks SET fkRequester = (SELECT pkRequester FROM tblrequester AS b WHERE b.fldRequester = (:requester)) WHERE pkTasks = LAST_INSERT_ID()";
                $stmt5 = $connection->prepare($sql5);
                $stmt5->execute($requester);
                $sql6 = "UPDATE tbltasks SET fkLocation = (SELECT pkLocation FROM tbllocation AS b WHERE b.fldLocation = (:loc)) WHERE pkTasks = LAST_INSERT_ID()";
                $stmt6 = $connection->prepare($sql6);
                $stmt6->execute($location);
                echo '<p class="success">New record created successfully!</p><style>p {font-weight:bold; font-size:20px;}</style>';
                echo '<script type="text/javascript">setTimeout(function () {
                        window.location.href = "index.php";}, 2000);</script>';
        } else {
                echo '<p class="success">New record was not created, please fill in all fields!</p><style>p {font-weight:bold; font-size:20px;}</style>';
                echo '<script type="text/javascript">setTimeout(function () {
                       window.location.href = "index.php";}, 2000);</script>';
        }

        
} 

?>