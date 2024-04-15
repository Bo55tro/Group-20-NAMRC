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
        <li><a href="DM_View.php">View Employees</a></li>
        <li><a href="DM_Viewcell.php">View cells</a></li>
        <li><a href="DM_Viewtraining.php">View available training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<?php
include '../db_connection.php';

if (isset($_GET['HSM_ID'])) {
    $staff_id = $_GET['HSM_ID'];

    try {
        $stmt_staff = $db->prepare("SELECT * FROM \"Health and Safety Managers, Officers\" WHERE HSM_ID = :HSM_ID");
        $stmt_staff->bindValue(':HSM_ID', $staff_id, SQLITE3_TEXT);
        $result_staff = $stmt_staff->execute();
        $staffData = $result_staff->fetchArray(SQLITE3_ASSOC);

        if ($staffData) {
            if (isset($_POST['submit'])) {
                $update_staff = $db->prepare("UPDATE \"Health and Safety Managers, Officers\" SET HSM_fname = :HSM_fname, HSM_mname = :HSM_mname, HSM_lname = :HSM_lname, HSM_email = :HSM_email, HSM_password = :HSM_password, HSM_dob = :HSM_dob  WHERE HSM_ID = :HSM_ID");
                $update_staff->bindValue(':HSM_fname', $_POST['UPDATEFNAME'], SQLITE3_TEXT);
                $update_staff->bindValue(':HSM_mname', $_POST['UPDATEMNAME'], SQLITE3_TEXT);
                $update_staff->bindValue(':HSM_lname', $_POST['UPDATELNAME'], SQLITE3_TEXT);
                $update_staff->bindValue(':HSM_email', $_POST['UPDATEEMAIL'], SQLITE3_TEXT);
                $update_staff->bindValue(':HSM_password', $_POST['UPDATEPASSWORD'], SQLITE3_TEXT);
                $update_staff->bindValue(':HSM_dob', $_POST['UPDATEDOB'], SQLITE3_TEXT);
                $update_staff->bindValue(':HSM_ID', $staff_id, SQLITE3_TEXT);
                $update_staff->execute();

                echo "<br><br><br><br><br> Staff information updated successfully.";
            } else {
                ?>
                <form method="post"> 
                <br><br><br><br><br><br>
                    <label for="UPDATEFNAME">First Name:</label> 
                    <input type="text" id="UPDATEFNAME" name="UPDATEFNAME" value="<?php echo $staffData['HSM_fname']; ?>" required> 

                    <label for="UPDATEMNAME">Middle Name:</label> 
                    <input type="text" id="UPDATEMNAME" name="UPDATEMNAME" value="<?php echo $staffData['HSM_mname']; ?>"> 

                    <label for="UPDATELNAME">Last Name:</label> 
                    <input type="text" id="UPDATELNAME" name="UPDATELNAME" value="<?php echo $staffData['HSM_lname']; ?>" required> 

                    <br><br><br>

                    <label for="UPDATEEMAIL">Email:</label> 
                    <input type="text" id="UPDATEEMAIL" name="UPDATEEMAIL" value="<?php echo $staffData['HSM_email']; ?>" required> 

                    <label for="UPDATEPASSWORD">Password:</label> 
                    <input type="text" id="UPDATEPASSWORD" name="UPDATEPASSWORD" value="<?php echo $staffData['HSM_password']; ?>" required> 

                    <label for="UPDATEDOB">DOB:</label> 
                    <input type="text" id="UPDATEDOB" name="UPDATEDOB" value="<?php echo $staffData['HSM_dob']; ?>" required> 

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