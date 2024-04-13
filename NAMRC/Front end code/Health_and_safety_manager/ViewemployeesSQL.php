<!-- Viewing done by Ariba !-->
<?php
function getEmployee (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT tech_fname, tech_lname, tech_email
            FROM 'Technical Staff'";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()) { 
        $arrayResult[] = $row; 
    }
    return $arrayResult;
}
?>
