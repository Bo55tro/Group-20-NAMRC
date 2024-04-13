<!-- Viewing done by Ariba !-->
<?php
function getEmployee (){
    $arrayResult = array(); 
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
    $sql = "SELECT T.tech_fname, T.tech_lname, T.tech_email
    FROM 'Technical Staff' T
    JOIN 'Departments' D ON T.DEP_ID = D.DEP_ID
    JOIN 'Department Managers' M ON D.DM_ID = M.DM_ID
    WHERE M.DM_ID = 1;
     ";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
