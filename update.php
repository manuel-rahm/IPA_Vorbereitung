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

                $insertci = "INSERT INTO tblci (fldCI)
                SELECT (:ci) WHERE NOT EXISTS (SELECT 1 FROM tblci AS b WHERE b.fldCI = (:ci))";
                $stmtinsertci = $connection->prepare($insertci);

                $insertrequester = "INSERT INTO tblrequester (fldRequester)
                SELECT (:requester) WHERE NOT EXISTS (SELECT 1 FROM tblrequester AS b WHERE b.fldRequester = (:requester))";
                $stmtinsertrequester = $connection->prepare($insertrequester);

                $insertlocation = "INSERT INTO tbllocation (fldLocation)
                SELECT (:loc) WHERE NOT EXISTS (SELECT 1 FROM tbllocation AS b WHERE b.fldLocation = (:loc))";
                $stmtinsertlocation = $connection->prepare($insertlocation);

                $insertdata = "INSERT INTO tbltasks (fldTaskNr, fldRITMNr, fldCHGNr, fkGxP, fkStatus, fldDescription, fkResponsible)
                VALUES (:tasknr, :ritmnr, :chgnr, :gxp, :stat, :descr, :responsible) WHERE fldTaskNr, fldRITMNr, fldCHGNr, fkGxP, fkStatus, fldDescription, fkResponsible NOT EXISTS";
                $stmtinsertdata = $connection->prepare($insertdata);



                
                

                $updaterequester = "UPDATE tblrequester
                SET fldRequester = (:requester) WHERE NOT EXISTS (SELECT 1 FROM tblrequester AS b WHERE b.fldRequester = (:requester))";
                $stmtupdaterequester = $connection->prepare($updaterequester);
                
                
                $updatelocation = "UPDATE tbllocation
                SET fldLocation = (:loc) WHERE NOT EXISTS (SELECT 1 FROM tbllocation AS b WHERE b.fldLocation = (:loc))";
                $stmtupdatelocation = $connection->prepare($updatelocation);
                

                $updatedata = "UPDATE tbltasks SET fldTaskNr = (:tasknr), fldRITMNr = (:ritmnr), fldCHGNr = (:chgnr), fkGxP = (:gxp), fkStatus = (:stat), fldDescription = (:descr), fkResponsible = (:responsible)
                WHERE fldTaskNr = (:tasknr)";
                $stmtupdatedata = $connection->prepare($updatedata);
                

                $updatefkci = "UPDATE tbltasks SET fkCI = (SELECT pkCI FROM tblCI AS b WHERE b.fldCI = (:ci)) WHERE fldTaskNr = (:tasknr)";
                $stmtupdatefkci = $connection->prepare($updatefkci);
                

                $updatefkrequester = "UPDATE tbltasks SET fkRequester = (SELECT pkRequester FROM tblrequester AS b WHERE b.fldRequester = (:requester)) WHERE fldTaskNr = (:tasknr)";
                $stmtupdatefkrequester = $connection->prepare($updatefkrequester);
                $stmtupdatefkrequester->execute($requester);

                $updatefklocation = "UPDATE tbltasks SET fkLocation = (SELECT pkLocation FROM tbllocation AS b WHERE b.fldLocation = (:loc)) WHERE fldTaskNr = (:tasknr)";
                $stmtupdatefklocation = $connection->prepare($updatefklocation);
                

                if ($stmtinsertci->execute($ci) && $stmtinsertrequester->execute($requester) &&  $stmtinsertlocation->execute($location) && $stmtinsertdata->execute($data)){
                        $updateci = "UPDATE tblci
                                SET fldCI = (:ci) WHERE NOT EXISTS (SELECT 1 FROM tblci AS b WHERE b.fldCI = (:ci))";
                        $stmtupdateci = $connection->prepare($updateci);
                        $stmtupdateci->execute($ci);
                        $stmtupdaterequester->execute($requester);
                        $stmtupdatelocation->execute($location);
                        $stmtupdatedata->execute($data);
                        $stmtupdatefkci->execute($ci);
                        $stmtupdatefklocation->execute($location);
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