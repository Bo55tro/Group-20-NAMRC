<?php
include('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\Front end code\Health_and_safety_manager\HS_Home.php');

$db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');
$sql = "SELECT training_ID, training_name FROM Training WHERE training_ID=:training_ID";
$stmt = $db->prepare($sql);
$stmt->bindParam(':training_ID', $_GET['training_ID'], SQLITE3_INTEGER);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['delete'])){

    $db = new SQLite3('C:\xampp\htdocs\Group-20-NAMRC\NAMRC\NAMRC.db');

    $stmt = "DELETE FROM Training WHERE training_ID = :training_ID";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':training_ID', $_POST['training_ID'], SQLITE3_NUM);

    $sql->execute();
}

?>

<h2>Delete Training For <?php echo $_GET['training_ID'];?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this training?</h4><br>
        
<div class="row">
    <div class="col-11">
        <?php if (!empty($arrayResult)): ?>
            <form method="post">
                <?php foreach($arrayResult as $row): ?>
                <input type="hidden" name="training_name" value="<?php echo $row['training_name']; ?>">
                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Training Name</label>
                    <input class="form-control" type="text" name="training_name" value="<?php echo $row['training_name']; ?>">
                </div>
                <?php endforeach; ?>
                <input type="submit" name="submit" value="Delete Training" class="btn btn-primary">
            </form>
        <?php else: ?>
            <p>Can not delete the training you have selected.</p>
        <?php endif; ?>
    </div>
</div>
<div class="form-group col-md-3"><a href="Viewtraining.php">Back</a></div> 