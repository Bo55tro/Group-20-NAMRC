<!-- Delete function for the certification done by ariba -->

<link rel="stylesheet" href="../site.css"/>
<nav class="navbar">
    <ul>
        <li><a href="HS_Home.php">Back</a></li>
        <li><a href="HS_Viewcell.php">View cells</a></li>
        <li><a href="HS_Viewtraining.php">View available training/certifications</a></li>
        <li><a href="HS_Addcertification.php">Add certification & training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<?php

$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

if (isset($_GET['tech_ID']) && is_numeric($_GET['tech_ID'])) {
    $tech_ID = $_GET['tech_ID'];

    $sql = "SELECT tech_ID, tech_fname, tech_mname, tech_lname, tech_email, tech_password, address_id, tech_dob, DEP_ID FROM \"Technical Staff\" WHERE tech_ID=:tech_ID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':tech_ID', $cell_ID, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $arrayResult[] = $row;
    }

    if (isset($_POST['delete'])) {
        $stmt = $db->prepare("DELETE FROM \"Technical Staff\" WHERE tech_ID = :tech_ID");
        $stmt->bindParam(':tech_ID', $tech_ID, SQLITE3_INTEGER);
        $stmt->execute();
        header("Location: HS_view.php");
        exit();
    }
    } else {
        echo "Invalid tech ID.";
        exit();
    }
    ?>

<h2>Delete Employee For <?php echo $cell_ID; ?></h2><br>
<h4 style="color: red;">Are you sure want to delete this employee?</h4><br>

<div class="row">
    <div class="col-11">
        <?php if (!empty($arrayResult)): ?>
            <form method="post">
                <?php foreach ($arrayResult as $row): ?>
                    <input type="hidden" name="tech_ID" value="<?php echo $row['tech_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name="tech_fname" value="<?php echo $row['tech_fname']; ?>">
                    </div>

                    <input type="hidden" name="tech_mname" value="<?php echo $row['tech_mname']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Middle Name</label>
                        <input class="form-control" type="text" name="tech_mname" value="<?php echo $row['tech_mname']; ?>">
                    </div>

                    <input type="hidden" name="tech_lname" value="<?php echo $row['tech_lname']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name="tech_lname" value="<?php echo $row['tech_lname']; ?>">
                    </div>

                    <input type="hidden" name="tech_email" value="<?php echo $row['tech_email']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Email</label>
                        <input class="form-control" type="text" name="tech_email" value="<?php echo $row['tech_email']; ?>">
                    </div>

                    <input type="hidden" name="tech_password" value="<?php echo $row['tech_password']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Password</label>
                        <input class="form-control" type="text" name="tech_password" value="<?php echo $row['tech_password']; ?>">
                    </div>

                    <input type="hidden" name="address_id" value="<?php echo $row['address_id']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Address ID</label>
                        <input class="form-control" type="integer" name="address_id" value="<?php echo $row['address_id']; ?>">
                    </div>

                    <input type="hidden" name="address_id" value="<?php echo $row['address_id']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Address ID</label>
                        <input class="form-control" type="integer" name="address_id" value="<?php echo $row['address_id']; ?>">
                    </div>

                    <input type="hidden" name="tech_dob" value="<?php echo $row['tech_dob']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Date Of Birth</label>
                        <input class="form-control" type="date" name="tech_dob" value="<?php echo $row['tech_dob']; ?>">
                    </div>

                    <input type="hidden" name="DEP_ID" value="<?php echo $row['DEP_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Department ID</label>
                        <input class="form-control" type="integer" name="DEP_ID" value="<?php echo $row['DEP_ID']; ?>">
                    </div>
    

                <?php endforeach; ?>
                <input type="submit" name="delete" value="Delete Employee" class="btn btn-primary">
            </form>
        <?php else: ?>
            <p>Can not delete the employee you have selected.</p>
        <?php endif; ?>
    </div>
</div>
<p>Press the "Back" icon to view the list of employees. <div class="form-group col-md-3"><a href="HS_view.php">Back</a></div></p>