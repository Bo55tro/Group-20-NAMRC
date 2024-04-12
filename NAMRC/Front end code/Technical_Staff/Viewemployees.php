<?php
session_start();

$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

// Check if connection was successful
if (!isset($_POST["email"])) {
    echo json_encode(array("success" => false, "message" => "Email address is required."));
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
?>
