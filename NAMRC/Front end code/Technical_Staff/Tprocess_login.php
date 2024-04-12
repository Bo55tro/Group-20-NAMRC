<?php
session_start();

// Check if connection was successful
$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

if (!$db) {
    echo json_encode(array("success" => false, "message" => "Connection to database failed."));
    exit();
}

// Ensure email is provided
if (!isset($_POST["email"])) {
    echo json_encode(array("success" => false, "message" => "Email address is required."));
    exit();
}

$email = $_POST["email"];
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
        exit();
    }
} else {
    echo "Email not recognized as a Technical Staff";
    exit();
}

$db->close();
?>

<?php
// This block of code will only execute if the email address is provided
if (isset($_POST["email"])) {
    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

    // Check if connection was successful
    if (!$db) {
        echo json_encode(array("success" => false, "message" => "Connection to database failed."));
        exit();
    }

    $email = $_POST["email"];

    // SQL query to select training and certifications based on email
    $stmt = $db->prepare("SELECT `Technical Staff`.`tech_fname`, `Technical Staff`.`tech_lname`, `Training`.`training_name`
    FROM `Technical Staff`
    INNER JOIN `Operator Training` ON (`Technical Staff`.`tech_ID` = `Operator Training`.`tech_ID`)
    INNER JOIN `Training` ON (`Operator Training`.`training_ID` = `Training`.`training_ID`)
    WHERE `Technical Staff`.`tech_email` = :email;");
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();

    $data = array();
    if ($result) {
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row;
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to execute SQL query."));
        exit();
    }

    $db->close();

    echo json_encode(array("success" => true, "data" => $data));
}
var_dump($_POST);
?>
