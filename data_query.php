<?php 
$data = "SELECT tbltasks.fldTaskNr AS 'TASK_NR'
                    ,tbltasks.fldRITMNr AS 'RITMNR'
                    ,tbltasks.fldCHGNr AS 'CHGNR'
                    ,tblci.fldCI AS 'FLDCI'
                    ,tblgxp.fldGxP AS 'GXP'
                    ,tblrequester.fldRequester AS 'REQUESTER'
                    ,tblstatus.fldStatus AS 'FLD_STATUS'
                    ,tbltasks.fldDescription AS 'FLD_DESCRIPTION'
                    ,tblresponsible.fldResponsible AS 'RESPONSIBLE'
                    ,tbllocation.fldLocation AS 'LOCATION' FROM tbltasks
                LEFT JOIN tblCI ON tblci.pkCI = tbltasks.fkCI
                LEFT JOIN tblgxp ON tblgxp.pkGxP = tbltasks.fkGxP
                LEFT JOIN tblrequester ON tblrequester.pkRequester = tbltasks.fkRequester
                LEFT JOIN tblstatus ON tblstatus.pkStatus = tbltasks.fkStatus
                LEFT JOIN tblresponsible ON tblresponsible.pkResponsible = tbltasks.fkResponsible
                LEFT JOIN tbllocation ON tbllocation.pkLocation = tbltasks.fkLocation";
?>