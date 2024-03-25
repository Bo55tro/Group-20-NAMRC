<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuclear AMRC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../site.css"/>
</head>
<body>
    <nav class="loginnavbar">
        <ul>
            <li><a href="../Home.html">Back</a></li>
        </ul>
    </nav>
    <img class="loginlogo" src="../images/logo.png">

    <div class="login">
        <div class="login_header">Login</div> 
        <div class="Email">Email</div>
        <div class="Log">Password</div>
        <form method="post" action="process_login.php">
            <div>
                <div class="emaillabel">
                    <input type="text" id="EMAIL" name="email">
                </div>
                <div class="passwordlabel">
                    <input type="password" id="username" name="username">
                </div>
                <input type="submit" name="submit" value="Submit" class="loginsubmit">
            </div>
        </form>
    </div>

    <footer class="footertext">Contact tel:+44 (0)114 222 9900 &nbsp;&nbsp;&nbsp;email: enquiries@namrc.co.uk</footer>
</body>
</html>
