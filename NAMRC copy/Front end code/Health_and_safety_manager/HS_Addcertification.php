<!-- Add certificate done by ariba -->
<!DOCTYPE html>

<html lang="en">
<head>
    <title>Nuclear AMRC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../site.css"/>
</head>
<body>
<div class="container">
    <header class="header">
        <div class="logo">
            <img class="logo-img" src="logo.png" alt="Nuclear AMRC Logo">
        </div>
        <nav class="navigation">
            <ul class="left-options">
            <li><a href="HS_View.php">View employees</a></li>
            <li><a href="HS_Viewcell.php">View cells</a></li>
            <li><a href="HS_Viewtraining.php">View available training/certifications</a></li>
            <li><a href="HS_Addcertification.php">Add certification & training</a></li>
            <li><a href="HS_Home.php">Back</a></li>
            <li class="right-link"><a href="../Home.html">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>

<div class="login">
    <div class="login_header">Add Certification</div>
    <div class="container">
        <form method="post" action="process_addcertification.php">
            <div class="inputlabel"> 
                
                <label for="certification_name"><span>Certification Name</span></label> <!-- updated field names - ariba naveed-->
                <input type="text" id="certification_name" name="certificationName" required>
                
                <label for="cell_ID"><span>Cell ID</span></label>
                <input type="text" id="cell_ID" name="cell_ID" required>

                <input type="submit" name="submit" value="Submit" class="addsubmit">
            </div>
        </form>
    </div>
</div>


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