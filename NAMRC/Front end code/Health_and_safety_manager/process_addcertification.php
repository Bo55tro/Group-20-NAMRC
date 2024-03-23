<!-- process of adding a certificate done by ariba -->

<?php
session_start();

try {
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db'); //works for my database connection some people may need to change it for their directory - done by Ariba 
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $certificationName = $_POST['certificationName'];
    $cellID = $_POST['cell_ID'];

    $stmt = $db->prepare("INSERT INTO Certifications (certification_name, cell_ID) VALUES (?, ?)");
    
    $stmt->bindParam(1, $certificationName, SQLITE3_TEXT);
    $stmt->bindParam(2, $cellID, SQLITE3_INTEGER);

    $result = $stmt->execute();

    if ($result) {
        header("Location: addcertification_success.php");
        exit();

    } else {
        header("Location: addcertification_unsuccessful.php");
        exit();
    }
} else {
    header("Location: HS_Addcertification.php");
    exit();
}
?>
