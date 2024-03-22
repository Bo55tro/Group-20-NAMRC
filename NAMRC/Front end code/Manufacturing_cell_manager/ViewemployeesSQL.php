<!-- Viewing done by Ariba !-->
<?php
function getEmployee (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT TS.tech_fname, TS.tech_lname, TS.tech_email, TS.tech_dob
    FROM 'Technical Staff' TS
    INNER JOIN 'Operator Certification' OC ON TS.tech_ID = OC.tech_ID
    INNER JOIN Certifications Cer ON OC.certification_ID = Cer.certification_ID
    INNER JOIN Cells C ON Cer.cell_ID = C.cell_ID
    INNER JOIN 'Manufacturing Cell Manager' M ON C.MCM_ID = M.MCM_ID
    WHERE M.MCM_ID = 1;
    "; //where TS.tech_email = provided email
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
