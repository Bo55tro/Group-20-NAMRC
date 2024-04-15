<!-- Viewing done by Ariba !-->

<?php
function getEmployee (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT * FROM 'Technical Staff';";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}

function getMCM (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT * FROM 'Manufacturing Cell Manager';";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}

function getDM (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT * FROM 'Department Managers';";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>




