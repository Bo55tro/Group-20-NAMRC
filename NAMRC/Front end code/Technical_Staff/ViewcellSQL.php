<!-- Viewing done by Ariba !-->
<?php
function getCell (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT C.cell_ID, C.cell_name
    FROM 'Technical Staff' TS
    INNER JOIN 'Operator Certification' OC ON TS.tech_ID = OC.tech_ID
    INNER JOIN Certifications Cert ON OC.certification_ID = Cert.certification_ID
    INNER JOIN Cells C ON Cert.cell_ID = C.cell_ID;";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
