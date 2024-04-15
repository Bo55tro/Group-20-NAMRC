<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Nuclear AMRC</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../site.css"/>
    </head>
    <body>
    <?php
     require("navbar.php");
     ?>

        <div class ="login">
            <div class="login_header">Login</div> 
            <div class ="Email">Email</div>
            <div class ="Log">Password</div>
            <form method="post" action="Tprocess_login.php">
                <div>
                <div class="emaillabel">
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="passwordlabel">
                        <input type="password" id="password" name="password">
                    </div>
                    <input type="submit" name="submit" value="Submit" class="loginsubmit">
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