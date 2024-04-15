<!-- Viewing done by Ariba !-->
<?php
function getEmployee (){
    $arrayResult = array(); 
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Group-20-NAMRC-Test/NAMRC/NAMRC.db');
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
