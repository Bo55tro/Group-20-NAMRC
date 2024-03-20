<?php
session_start();

try {
    $db = new SQLite3('C:\downloads\htdocs\NAMRC\NAMRC.db'); //works for my database connection some people may need to change it for their directory - done by Ariba 
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $trainingID = $_POST['trainingID'];
    $techID = $_POST['tech_ID'];
    $expiryDate = $_POST['expiry_date'];

    $stmt = $db->prepare("INSERT INTO Certifications (training_ID, tech_ID, expiry_date) VALUES (?, ?, ?)");
    
    $stmt->bindParam(1, $trainingID, SQLITE3_INTEGER);
    $stmt->bindParam(2, $techID, SQLITE3_INTEGER);
    $stmt->bindParam(3, $expiryDate, SQLITE3_TEXT);

    $result = $stmt->execute();

    if ($result) {
        header("Location: addcertification_success.php");
        exit();

    } else {
        header("Location: medicalrecord_unsuccessful.php");
        exit();
    }
} else {
    header("Location: createmedicalrecord.php");
    exit();
}
?>
