<?php
session_start();

// Corrected file path
$db = new SQLite3('/Applications/XAMPP/xamppfiles/htdocs/Group-20-NAMRC-Test/NAMRC/NAMRC.db');

// Check if connection was successful
if (!$db) {
    die("Connection failed: " . $db->lastErrorMsg());
}

$email = $_POST["email"];
$password = $_POST["password"];

// SQL query to select the emails from the table 
$stmt = $db->prepare("SELECT * FROM \"Manufacturing Cell Manager\" WHERE MCM_email = :email");
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$result = $stmt->execute();

if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if ($row['MCM_password'] === $password) {
        $_SESSION['logged_in'] = true;
        header("Location: MCM_Home.php");
        exit();
    } else {
        echo "<h2>Invalid username or password</h2>";
    }
} else {
    echo "<h2>Email not recognized as a Manufacturing Cell Manager</h2>";
}
$db->close();
?>
