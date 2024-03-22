<!-- Viewing done by Ariba !-->
<?php
function getCell (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT Cells.cell_ID, Cells.cell_name, Manufacturing_Cell_Manager.MCM_fname, Manufacturing_Cell_Manager.MCM_lname 
    FROM Cells 
    INNER JOIN Manufacturing_Cell_Manager ON Cells.MCM_ID = Manufacturing_Cell_Manager.MCM_ID";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
