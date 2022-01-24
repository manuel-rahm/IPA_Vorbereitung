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
        'stat' => $_POST['updatestatus'],
        'descr' => $_POST['inputDescription'],
        'responsible' => $_POST['inputResponsible'],
        ];
        $ci = [
        'ci' => $_POST['inputCI'],
        'tasknr' => $_POST['inputTask'],
        ];
        $requester = [
        'requester' => $_POST['inputRequester'],
        'tasknr' => $_POST['inputTask'],
        ];
        $location = [
        'loc' => $_POST['inputLocation'],
        'tasknr' => $_POST['inputTask'],
        ];
                
        
                $sql1 = "UPDATE tblci
                SET fldCI = (:ci) WHERE NOT EXISTS (SELECT 1 FROM tblci AS b WHERE b.fldCI = (:ci))";
                $stmt1 = $connection->prepare($sql1);

                $sql2 = "UPDATE tblrequester
                SET fldRequester = (:requester) WHERE NOT EXISTS (SELECT 1 FROM tblrequester AS b WHERE b.fldRequester = (:requester))";
                $stmt2 = $connection->prepare($sql2);
                
                $sql3 = "UPDATE tbllocation
                SET fldLocation = (:loc) WHERE NOT EXISTS (SELECT 1 FROM tbllocation AS b WHERE b.fldLocation = (:loc))";
                $stmt3 = $connection->prepare($sql3);

                $sql = "UPDATE tbltasks SET fldTaskNr = (:tasknr), fldRITMNr = (:ritmnr), fldCHGNr = (:chgnr), fkGxP = (:gxp), fkStatus = (:stat), fldDescription = (:descr), fkResponsible = (:responsible)
                WHERE fldTaskNr = (:tasknr)";
                $stmt = $connection->prepare($sql);

        if ($stmt1->execute($ci) && $stmt2->execute($requester) && $stmt3->execute($location) && $stmt->execute($data)){
                $sql4 = "UPDATE tbltasks SET fkCI = (SELECT pkCI FROM tblCI AS b WHERE b.fldCI = (:ci)) WHERE fldTaskNr = (:tasknr)";
                $stmt4 = $connection->prepare($sql4);
                $stmt4->execute($ci);
                $sql5 = "UPDATE tbltasks SET fkRequester = (SELECT pkRequester FROM tblrequester AS b WHERE b.fldRequester = (:requester)) WHERE fldTaskNr = (:tasknr)";
                $stmt5 = $connection->prepare($sql5);
                $stmt5->execute($requester);
                $sql6 = "UPDATE tbltasks SET fkLocation = (SELECT pkLocation FROM tbllocation AS b WHERE b.fldLocation = (:loc)) WHERE fldTaskNr = (:tasknr)";
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