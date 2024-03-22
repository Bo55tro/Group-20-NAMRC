<!-- Viewing done by Ariba !-->
<?php
function getCell (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT Cells.cell_ID, Cells.cell_name, Manufacturing Cell Manager.MCM_fname, Manufacturing Cell Manager.MCM_lname 
    FROM Cells 
    INNER JOIN Manufacturing Cell Manager ON Cells.MCM_ID = Manufacturing Cell Manager.MCM_ID";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
