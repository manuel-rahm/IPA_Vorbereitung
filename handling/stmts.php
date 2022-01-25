<?php
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
        $task = [
        'tasknr' => $_POST['inputTask'],
        'ritmnr' => $_POST['inputRITM'],
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


                $updateci = "UPDATE tblci
                SET fldCI = (:ci) WHERE NOT EXISTS (SELECT 1 FROM tblci AS b WHERE b.fldCI = (:ci))";
                $stmtupdateci = $connection->prepare($updateci);
                
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

                $updatetask = "UPDATE tbltasks SET fldTaskNr = (:tasknr) WHERE fldRITMNr = (:ritmnr)";
                $stmtupdatetask = $connection->prepare($updatetask);
?>