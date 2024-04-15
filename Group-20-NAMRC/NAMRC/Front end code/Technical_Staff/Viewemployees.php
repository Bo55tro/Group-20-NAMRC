<?php
// Check if user is logged in and email is set in the session
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['email'])) {
    // Redirect the user to the login page or display an error message
    header("Location: Technical_Login.php");
    exit();
}

// Retrieve the email address from the session
$email = $_SESSION['email'];

// Create a new SQLite3 database connection
$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

// Check if connection was successful
if (!$db) {
    die("Connection failed: " . $db->lastErrorMsg());
}

// SQL query to select training and certifications based on email
$stmt = $db->prepare("SELECT `Technical Staff`.`tech_fname`, `Technical Staff`.`tech_mname`, `Technical Staff`.`tech_lname`, `Training`.`training_name`, `Certifications`.`certification_name`
FROM `Technical Staff`
INNER JOIN `Operator Training` ON (`Technical Staff`.`tech_ID` = `Operator Training`.`tech_ID`)
INNER JOIN `Training` ON (`Operator Training`.`training_ID` = `Training`.`training_ID`)
INNER JOIN `Operator Certification` ON (`Technical Staff`.`tech_ID` = `Operator Certification`.`tech_ID`)
INNER JOIN `Certifications` ON (`Operator Certification`.`certification_ID` = `Certifications`.`certification_ID`)
WHERE `Technical Staff`.`tech_email` = :email;");

$stmt->bindValue(':email', $email, SQLITE3_TEXT);
$result = $stmt->execute();

$technicalStaffData = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)){
    $technicalStaffData[]=$row;
}

$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Technical Staff Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="site.css"> 
</head>
<body>
    <h1>Welcome, <?php echo $technicalStaffData[0]['tech_fname'] . ' ' . $technicalStaffData[0]['tech_mname'] . ' ' . $technicalStaffData[0]['tech_lname']; ?>!</h1>
    <p>Your name: <?php echo $technicalStaffData[0]['tech_fname'] . ' ' . $technicalStaffData[0]['tech_mname'] . ' ' . $technicalStaffData[0]['tech_lname']; ?></p>
    
    <p>Your trainings: <?php 
        $trainings = array_unique(array_column($technicalStaffData, 'training_name')); //array unique removes duplicates  
        echo implode(', ', $trainings); //implodes combines all the unique training names into a single string with commas to break them 
    ?></p>
    
    <p>Your certifications: <?php 
        $certifications = array_unique(array_column($technicalStaffData, 'certification_name'));
        echo implode(', ', $certifications);
    ?></p>
</body>
</html>