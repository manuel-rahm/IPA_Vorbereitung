<?php
class DisplayData {
    protected $name;
    function __construct($name = "Hans"){
        $this->name = $name;
    }
    public static function displayTask ($connection, $data){
        foreach ($connection->query($data) as $row) {
            if ($row['FLD_STATUS'] == "WIP" || $row['FLD_STATUS'] == "Pending") {
                if ($row['FLD_DESCRIPTION'] != "Decommission") {
                    if ($row['FLD_DESCRIPTION'] != "decommission") {
                        echo '<tr>';
                        echo '<td tasknr="' . $row['TASK_NR'] . '" class="RowTaskNr">' . $row['TASK_NR'] . '</td>';
                        echo '<td>' . $row['RITMNR'] . '</td>';
                        echo '<td>' . $row['CHGNR'] . '</td>';
                        echo '<td>' . $row['FLDCI'] . '</td>';
                        if ($row['GXP'] == 1) {
                            echo '<td>Yes</td>';
                        } else {
                            echo '<td>No</td>';
                        }
                        echo '<td>' . $row['REQUESTER'] . '</td>';
                        echo '<td>' . $row['FLD_STATUS'] . '</td>';
                        echo '<td>' . $row['FLD_DESCRIPTION'] . '</td>';
                        echo '<td>' . $row['RESPONSIBLE'] . '</td>';
                        echo '<td style="width: 201px;">' . $row['LOCATION'] . '</td>';
                        echo '<td><a href="edit.php?compareRITM=' . $row['RITMNR'] . '">Edit</a></td>';
                        echo '</tr>';
                    }
                }
            }
        }
    }
    public static function displayDecommission ($connection, $data){
        foreach ($connection->query($data) as $row) {
            if ($row['FLD_STATUS'] == "WIP" || $row['FLD_STATUS'] == "Pending"){
            if ($row['FLD_DESCRIPTION'] == "Decommission" || $row['FLD_DESCRIPTION'] == "decommission"){
            echo '<tr>';
            echo '<td tasknr="' . $row['TASK_NR'] . '" class="RowTaskNr">'.$row['TASK_NR'].'</td>';
            echo '<td>'.$row['RITMNR'].'</td>';
            echo '<td>'.$row['CHGNR'].'</td>';
            echo '<td>'.$row['FLDCI'].'</td>';
            if ($row['GXP'] == 1){
                echo '<td>Yes</td>'; 
            } else { 
                echo '<td>No</td>';
            }
            echo '<td>'.$row['REQUESTER'].'</td>';
            echo '<td>'.$row['FLD_STATUS'].'</td>';
            echo '<td>'.$row['RESPONSIBLE'].'</td>';
            echo '<td><a href="edit.php?compareRITM='.$row['RITMNR'].'">Edit</a></td>';
            echo '</tr>';
                }
            } 
        }
    }
    public static function displayClosed ($connection, $data){
        foreach ($connection->query($data) as $row) {
            if ($row['FLD_STATUS'] == "Closed" || $row['FLD_STATUS'] == "Canceled")
            {
            echo '<tr>';
            echo '<td>'.$row['TASK_NR'].'</td>';
            echo '<td>'.$row['RITMNR'].'</td>';
            echo '<td>'.$row['CHGNR'].'</td>';
            echo '<td>'.$row['FLDCI'].'</td>';
            if ($row['GXP'] == 1){
                echo '<td>Yes</td>'; 
            } else { 
                echo '<td>No</td>';
            }
            echo '<td>'.$row['REQUESTER'].'</td>';
            echo '<td>'.$row['FLD_STATUS'].'</td>';
            echo '<td>'.$row['FLD_DESCRIPTION'].'</td>';
            echo '<td>'.$row['RESPONSIBLE'].'</td>';
            echo '<td style="width: 201px;">'.$row['LOCATION'].'</td>';
            echo '</tr>';
            }
        } 
    }
    public static function displayEdit ($connection, $data){
        foreach ($connection->query($data) as $row) {
            $compareRITM = $_GET["compareRITM"];
            if ($row['FLD_STATUS'] == "WIP" || $row['FLD_STATUS'] == "Pending")
            {
            if ($row['RITMNR'] == $compareRITM){
            echo '<form action="update.php" method="POST">';
            echo '<tr>';
            echo '<td><input type="text" name="inputTask" value="'. $row['TASK_NR'] . '"></td>';
            echo '<td><input type="text" name="inputRITM" value="'. $row['RITMNR'] . '"></td>';
            echo '<td><input type="text" name="inputCHG" value="'. $row['CHGNR'] . '"></td>';
            echo '<td><input type="text" name="inputCI" value="'. $row['FLDCI'] . '"></td>';
            if ($row['GXP'] == 1){
                echo '<td><select name="inputGxP"><optgroup label="GxP"><option value="1"selected>Yes</option><option value="2">No</option></optgroup></select></td>'; 
            } else { 
                echo '<td><select name="inputGxP"><optgroup label="GxP"><option value="1">Yes</option><option value="2" selected>No</option></optgroup></select></td>';
            }
            echo '<td><input type="text" name="inputRequester" value="'. $row['REQUESTER'] . '"></td>';
            if ($row['FLD_STATUS'] == "WIP"){
                echo '<td><select name="updatestatus"><optgroup label="Status"><option value="1" selected="selected">WIP</option><option value="2">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>';
            } elseif ($row['FLD_STATUS'] == "Pending") {
                echo '<td><select name="updatestatus"><optgroup label="Status"><option value="1">WIP</option><option value="2" selected="selected">Pending</option><option value="3">Closed</option><option value="4">Canceled</option></optgroup></select></td>';
            } 
            echo '<td><input type="text" name="inputDescription" value="'. $row['FLD_DESCRIPTION'] . '"></td>';
            if ($row['RESPONSIBLE'] == "kwinzel1") {
                echo '<td><select name="inputResponsible"><optgroup label="Person"><option value="2" selected>kwinzel1</option><option value="3">nwindler</option><option value="1">mrahm</option></optgroup></select></td>';
            }
                elseif ($row['RESPONSIBLE'] == "mrahm") {
                    echo '<td><select name="inputResponsible"><optgroup label="Person"><option value="2">kwinzel1</option><option value="3">nwindler</option><option value="1" selected>mrahm</option></optgroup></select></td>';
                }
                elseif ($row['RESPONSIBLE'] == "nwindler") {
                    echo '<td><select name="inputResponsible"><optgroup label="Person"><option value="2">kwinzel1</option><option value="3" selected>nwindler</option><option value="1">mrahm</option></optgroup></select></td>';
                }
            echo '<td><input type="text" name="inputLocation" value="'. $row['LOCATION'] .'"></td>';
            
            echo '</tr>';
                }
            }
        }
    }
}
?>