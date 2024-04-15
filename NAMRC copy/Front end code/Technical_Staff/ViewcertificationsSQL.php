<!-- Viewing done by Ariba !-->
<?php
function getCertifications (){
    $arrayResult = array(); 
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Group-20-NAMRC-Test/NAMRC/NAMRC.db');
    $sql = "SELECT * FROM Certifications";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>