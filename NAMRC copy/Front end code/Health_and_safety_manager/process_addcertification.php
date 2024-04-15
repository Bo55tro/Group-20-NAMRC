<!-- process of adding a certificate done by ariba -->

<?php
session_start();

try {
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $certificationName = $_POST['certificationName'];
    $cellID = $_POST['cell_ID'];

    $stmt = $db->prepare("INSERT INTO Certifications (certification_name, cell_ID) VALUES (?, ?)");
    
    if (!$stmt) {
        die("Error in preparing statement: " . $db->lastErrorMsg());
    }

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
