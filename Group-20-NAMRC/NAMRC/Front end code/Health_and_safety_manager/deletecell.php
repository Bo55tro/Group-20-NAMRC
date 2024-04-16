<!-- Delete function for the certification done by ariba -->

<link rel="stylesheet" href="../site.css"/>
<nav class="navbar">
    <ul>
        <li><a href="HS_Home.php">Back</a></li>
        <li><a href="HS_View.php">View employees</a></li>
        <li><a href="HS_Viewtraining.php">View available training/certifications</a></li>
        <li><a href="HS_Addcertification.php">Add certification & training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>

<?php

$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

if (isset($_GET['cell_ID']) && is_numeric($_GET['cell_ID'])) {
    $certification_ID = $_GET['cell_ID'];

    $sql = "SELECT cell_ID, cell_name, MCM_ID FROM Cells WHERE cell_ID=:cell_ID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':cell_ID', $cell_ID, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $arrayResult = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $arrayResult[] = $row;
    }

    if (isset($_POST['delete'])) {
        $stmt = $db->prepare("DELETE FROM Cells WHERE cell_ID = :cell_ID");
        $stmt->bindParam(':cell_ID', $cell_ID, SQLITE3_INTEGER);
        $stmt->execute();
        header("Location: HS_Viewcell.php");
        exit();
    }
    } else {
        echo "Invalid cell ID.";
        exit();
    }
    ?>

<h2>Delete Cell For <?php echo $cell_ID; ?></h2><br>
<h4 style="color: red;">Are you sure want to delete this cell?</h4><br>

<div class="row">
    <div class="col-11">
        <?php if (!empty($arrayResult)): ?>
            <form method="post">
                <?php foreach ($arrayResult as $row): ?>
                    <input type="hidden" name="cell_ID" value="<?php echo $row['cell_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Cell Name</label>
                        <input class="form-control" type="text" name="cell_name" value="<?php echo $row['cell_name']; ?>">
                    </div>

                    <input type="hidden" name="MCM_ID" value="<?php echo $row['MCM_ID']; ?>">
                    <div class="form-group col-md-3">
                        <label class="control-label labelFont">Manufacturing Cell Manager ID</label>
                        <input class="form-control" type="integer" name="MCM_ID" value="<?php echo $row['MCM_ID']; ?>">
                    </div>

                <?php endforeach; ?>
                <input type="submit" name="delete" value="Delete Cell" class="btn btn-primary">
            </form>
        <?php else: ?>
            <p>Can not delete the cell you have selected.</p>
        <?php endif; ?>
    </div>
</div>
<p>Press the "Back" icon to view the list of trainings. <div class="form-group col-md-3"><a href="Viewcell.php">Back</a></div></p>