<?php
/*session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo json_encode(array("success" => false, "message" => "User is not logged in."));
    exit();
}

$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

// Check if connection was successful
if (!$db) {
    echo json_encode(array("success" => false, "message" => "Connection to database failed."));
    exit();
}

$email = $_POST["email"];

// SQL query to select training and certifications based on email
$stmt = $db->prepare("SELECT tech_training, tech_certification FROM TechnicalStaff WHERE tech_email = :email");
$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$result = $stmt->execute();

$data = array();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $data[] = $row;
}

$db->close();

echo json_encode(array("success" => true, "data" => $data));
?>