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
    public static function displayClosed ($connection, $data) {
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
}
?>