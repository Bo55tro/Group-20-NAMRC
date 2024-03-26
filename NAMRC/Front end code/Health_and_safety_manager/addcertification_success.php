<!-- Add certificate success done by ariba -->
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
        <li><a href="HS_Viewtraining.php">View available training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<div class="content">
    <h2>Certification was successfully added. Press the "Next" icon to add a training.</h2>
    <form method="post" action="HS_Addtraining.php">
        <input type="submit" name="Next" value="Next" class="returnbutton">
    </form>
    <form method="post" action="HS_Home.php">
        <input type="submit" name="Back" value="Back" class="returnbutton">
    </form>
</div>

</body>
</html>
