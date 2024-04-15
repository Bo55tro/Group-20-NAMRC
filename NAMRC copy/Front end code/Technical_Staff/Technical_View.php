
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuclear AMRC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../site.css"/>
    <link rel="stylesheet" href="technical.css"/>
</head>
<body>
<div class="container">
    <header class="header">
        <div class="logo">
            <img class="logo-img" src="logo.png" alt="Nuclear AMRC Logo">
        </div>
        <nav class="navigation">
            <ul class="left-options">
                <li><a href="Technical_View.php">View Employees</a></li>
                <li><a href="Technical_Viewcell.php">View Cells</a></li>
                <li><a href="Technical_Viewtraining.php">View Available Training</a></li>
                <li class="right-link"><a href="../Home.html">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: Technical_Login.php"); // Redirect to login page if not logged in
    exit();
}

// Include viewemployees.php to display the view employees table
include('/Applications/XAMPP/xamppfiles/htdocs/Group-20-NAMRC-Test/NAMRC/Front end code/Technical_Staff/Viewemployees.php');
?>


<footer class="footer">
        <div class="container">
            <div class="contact-info">
                <h3>Contact</h3>
                <p>+44 (0)114 222 9900</p>
                <p>enquiries@namrc.co.uk</p>
            </div>
            <div class="links">
                <h3>Links</h3>
                <a href="https://www.linkedin.com/company/nuclear-amrc/">LinkedIn</a>
            </div>
            <div class="rights">
                <h3>© 2024 Nuclear AMRC. All Rights Reserved.</h3>
            </div>
        </div>
    </footer>

</body>
</html>