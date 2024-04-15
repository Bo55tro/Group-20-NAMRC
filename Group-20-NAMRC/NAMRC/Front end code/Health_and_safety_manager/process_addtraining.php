<!-- process of adding a training done by ariba -->

<?php
session_start();

try {
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db'); //works for my database connection some people may need to change it for their directory - done by Ariba 
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $trainingName = $_POST['training_name'];

    $stmt = $db->prepare("INSERT INTO Training (training_name) VALUES (?)");
    
    $stmt->bindParam(1, $trainingName, SQLITE3_TEXT);


    $result = $stmt->execute();

    if ($result) {
        header("Location: addtraining_success.php");
        exit();

    } else {
        header("Location: addtraining_unsuccessful.php");
        exit();
    }
} else {
    header("Location: HS_Addtraining.php");
    exit();
}
?>
