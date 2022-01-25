<?php
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
            $sql1 = "INSERT INTO tblci (fldCI)
            SELECT (:ci) WHERE NOT EXISTS (SELECT 1 FROM tblci AS b WHERE b.fldCI = (:ci))";
            $stmt1 = $connection->prepare($sql1);

            $sql2 = "INSERT INTO tblrequester (fldRequester)
            SELECT (:requester) WHERE NOT EXISTS (SELECT 1 FROM tblrequester AS b WHERE b.fldRequester = (:requester))";
            $stmt2 = $connection->prepare($sql2);
            
            $sql3 = "INSERT INTO tbllocation (fldLocation)
            SELECT (:loc) WHERE NOT EXISTS (SELECT 1 FROM tbllocation AS b WHERE b.fldLocation = (:loc))";
            $stmt3 = $connection->prepare($sql3);

            $sql = "INSERT INTO tbltasks (fldTaskNr, fldRITMNr, fldCHGNr, fkGxP, fkStatus, fldDescription, fkResponsible)
            VALUES (:tasknr, :ritmnr, :chgnr, :gxp, :stat, :descr, :responsible)";
            $stmt = $connection->prepare($sql);

            $sql4 = "UPDATE tbltasks SET fkCI = (SELECT pkCI FROM tblCI AS b WHERE b.fldCI = (:ci)) WHERE pkTasks = LAST_INSERT_ID()";
            $stmt4 = $connection->prepare($sql4);

            $sql5 = "UPDATE tbltasks SET fkRequester = (SELECT pkRequester FROM tblrequester AS b WHERE b.fldRequester = (:requester)) WHERE pkTasks = LAST_INSERT_ID()";
            $stmt5 = $connection->prepare($sql5);

            $sql6 = "UPDATE tbltasks SET fkLocation = (SELECT pkLocation FROM tbllocation AS b WHERE b.fldLocation = (:loc)) WHERE pkTasks = LAST_INSERT_ID()";
            $stmt6 = $connection->prepare($sql6);
?>