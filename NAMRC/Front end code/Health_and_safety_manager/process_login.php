<!-- processing the HSM database details and created a SQL query to select all details - Done by ARIBA -->
<?php
session_start();

$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

// Check if connection was successful
if (!$db) {
    die("Connection failed: " . $db->lastErrorMsg());
}

$email = $_POST["email"];
$password = $_POST["password"];

// SQL query to select the emails from the table 
$stmt = $db->prepare("SELECT * FROM 'Health and Safety Managers, Officers' WHERE HSM_email = :email");
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$result = $stmt->execute();

if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if ($row['HSM_password'] === $password) {
        $_SESSION['logged_in'] = true;
        header("Location: HS_Home.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Email not recognized as a Health and Safety Manager";
}

$db->close();
?>
