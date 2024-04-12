<?php
session_start();

// Create a new SQLite3 database connection
$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

// Check if connection was successful
if (!$db) {
    die("Connection failed: " . $db->lastErrorMsg());
}

// Ensure email is provided
if (!isset($_POST["email"])) {
    echo json_encode(array("success" => false, "message" => "Email address is required."));
    exit();
}

$email = $_POST["email"];

// Debugging: Output the email address being used
echo "Email: $email<br>";

// SQL query to select the emails from the table 
$stmt = $db->prepare("SELECT * FROM 'Technical Staff' WHERE tech_email = :email");
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$result = $stmt->execute();

// Check if there are any errors executing the query
if (!$result) {
    $error = $stmt->errorInfo();
    echo "Error executing SQL query: " . $error[2];
    exit();
}

// Fetch the result
$row = $result->fetchArray(SQLITE3_ASSOC);

// Check if the row is not empty
if ($row) {
    // If the email exists in the database, proceed with authentication
    $password = $_POST["password"];
    if ($row['tech_password'] === $password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email; // Store email in session
        header("Location: Technical_Home.php");
        exit();
    } else {
        echo "Invalid username or password";
        exit();
    }
} else {
    // If the email does not exist in the database, display an error message
    echo "Email not recognized as a Technical Staff";
    exit();
}

$db->close();
?>
