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
        <li><a href="HS_Home.php">Back</a></li>
        <li><a href="HS_View.php">View</a></li>
        <li><a href="HS_Viewcell.php">View cells</a></li>
        <li><a href="HS_Viewtraining.php">View available training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<!-- changed the field names to match the database attributes for the table "Certification" - done by Ariba !-->
<form method="post" action="process_addcertification.php"> <!-- added a page of processing - done by Ariba !-->
    <div>
        <div class="inputlabel">
            
            <label for="training_ID"><span>Training ID</span></label>
            <input type="integer" id="training_ID" name="training_ID">
            
            <label for="tech_ID"><span>Tech ID</span></label>
            <input type="integer" id="tech_ID" name="tech_ID">

            <label for="expiry_date"><span>Expiry Date</span></label>
            <input type="date" id="expiry_date" name="expiry_date"> <!-- changed the format to date - done by ariba !-->

            <input type="submit" name="submit" value="Submit" class="addsubmit">
        </div>
    </div>
</form>

<img class="logo" src="../images/logo.png">

<footer class="footertext">Contact tel:+44 (0)114 222 9900 &nbsp;&nbsp;&nbsp;email: enquiries@namrc.co.uk</footer>
</body>
</html>