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
        <li><a href="MCM_View.php">View Employees</a></li>
        <li><a href="MCM_Viewcell.php">View cells</a></li>
        <li><a href="MCM_Viewtraining.php">View available training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<?php
include '../db_connection.php';

if (isset($_GET['MCM_ID'])) {
    $staff_id = $_GET['MCM_ID'];

    try {
        $stmt_staff = $db->prepare("SELECT * FROM \"Manufacturing cell manager\" WHERE MCM_ID = :MCM_ID");
        $stmt_staff->bindValue(':MCM_ID', $staff_id, SQLITE3_TEXT);
        $result_staff = $stmt_staff->execute();
        $staffData = $result_staff->fetchArray(SQLITE3_ASSOC);

        if ($staffData) {
            if (isset($_POST['submit'])) {
                $update_staff = $db->prepare("UPDATE \"Manufacturing cell Manager\" SET MCM_fname = :MCM_fname, MCM_mname = :MCM_mname, MCM_lname = :MCM_lname, MCM_email = :MCM_email, MCM_password = :MCM_password, MCM_dob = :MCM_dob  WHERE MCM_ID = :MCM_ID");
                $update_staff->bindValue(':MCM_fname', $_POST['UPDATEFNAME'], SQLITE3_TEXT);
                $update_staff->bindValue(':MCM_mname', $_POST['UPDATEMNAME'], SQLITE3_TEXT);
                $update_staff->bindValue(':MCM_lname', $_POST['UPDATELNAME'], SQLITE3_TEXT);
                $update_staff->bindValue(':MCM_email', $_POST['UPDATEEMAIL'], SQLITE3_TEXT);
                $update_staff->bindValue(':MCM_password', $_POST['UPDATEPASSWORD'], SQLITE3_TEXT);
                $update_staff->bindValue(':MCM_dob', $_POST['UPDATEDOB'], SQLITE3_TEXT);
                $update_staff->bindValue(':MCM_ID', $staff_id, SQLITE3_TEXT);
                $update_staff->execute();

                echo "<br><br><br><br><br> Staff information updated successfully.";
            } else {
                ?>
                <form method="post"> 
                <br><br><br><br><br><br>
                    <label for="UPDATEFNAME">First Name:</label> 
                    <input type="text" id="UPDATEFNAME" name="UPDATEFNAME" value="<?php echo $staffData['MCM_fname']; ?>" required> 

                    <label for="UPDATEMNAME">Middle Name:</label> 
                    <input type="text" id="UPDATEMNAME" name="UPDATEMNAME" value="<?php echo $staffData['MCM_mname']; ?>"> 

                    <label for="UPDATELNAME">Last Name:</label> 
                    <input type="text" id="UPDATELNAME" name="UPDATELNAME" value="<?php echo $staffData['MCM_lname']; ?>" required> 

                    <br><br><br>

                    <label for="UPDATEEMAIL">Email:</label> 
                    <input type="text" id="UPDATEEMAIL" name="UPDATEEMAIL" value="<?php echo $staffData['MCM_email']; ?>" required> 

                    <label for="UPDATEPASSWORD">Password:</label> 
                    <input type="text" id="UPDATEPASSWORD" name="UPDATEPASSWORD" value="<?php echo $staffData['MCM_password']; ?>" required> 

                    <label for="UPDATEDOB">DOB:</label> 
                    <input type="text" id="UPDATEDOB" name="UPDATEDOB" value="<?php echo $staffData['MCM_dob']; ?>" required> 

                    <input type="submit" name="submit" value="Submit" class="button"> 
                </form> 
                <?php
            }
        } else {
            echo "Employee data not found.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<img class="logo" src="../images/logo.png">

<footer class="footertext">Contact tel:+44 (0)114 222 9900 &nbsp;&nbsp;&nbsp;email: enquiries@namrc.co.uk</footer>
</body>
</html>