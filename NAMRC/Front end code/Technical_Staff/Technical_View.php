<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: technical_login.php"); // Redirect to login page if not logged in
    exit();
}

// Include viewemployees.php to display the view employees table
include('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\Front end code\Technical_Staff\Viewemployees.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuclear AMRC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../site.css"/>
</head>
<body>
<nav class="navbar">
    <ul>
        <li><a href="Technical_Home.php">Back</a></li>
        <li><a href="Technical_Viewcell.php">View cells</a></li>
        <li><a href="Technical_Viewtraining.php">View available training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<img class="logo" src="../images/logo.png">

<footer class="footertext">Contact tel:+44 (0)114 222 9900 &nbsp;&nbsp;&nbsp;email: enquiries@namrc.co.uk</footer>
</body>
</html>