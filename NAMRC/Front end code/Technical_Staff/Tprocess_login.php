<!-- processing the HSM database details and created a SQL query to select all details - Done by ARIBA -->
<?php
session_start();

// Check if user is logged in and email is set in the session
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['email'])) {
    // Redirect the user to the login page or display an error message
    header("Location: Technical_Login.php");
    exit();
}

// Retrieve the email address from the session
$email = $_SESSION['email'];
$password = $_POST["password"];

// SQL query to select the emails from the table 
$stmt = $db->prepare("SELECT * FROM 'Technical Staff' WHERE tech_email = :email");
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$result = $stmt->execute();

if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    if ($row['tech_password'] === $password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email; // Store email in session
        header("Location: Technical_Home.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Email not recognized as a Technical Staff";
}

$db->close();
?>
