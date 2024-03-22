<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="../site.css"/>
<nav class="navbar">
    <ul>
        <li><a href="HS_Home.php">Back</a></li>
        <li><a href="HS_Viewcell.php">View cells</a></li>
        <li><a href="HS_Viewtraining.php">View available training</a></li>
        <li><a href="HS_Addcertification.php">Add certification & training</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Certifications:</h2><br>

        <div class="row">
            <div class="col-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th style="min-width: 175px;">Certification ID</th> 
                            <th style="min-width: 175px;">Certification Name</th> 
                            <th style="min-width: 175px;">Cell ID</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'ViewcertificationsSQL.php';
                        $Certifications = getCertifications();

                        foreach ($Certifications as $certification):
                        ?>
                        <tr>
                            <td><?php echo $certification['certification_ID']?></td>
                            <td><?php echo $certification['certification_name']?></td>
                            <td><?php echo $certification['cell_ID']?></td>
                            <td>
                                <a href="deletecertifications.php?certification_ID=<?php echo $certification['certification_ID']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <a href="../Health_and_safety_manager/HS_view.php">Back</a>
            </div>
        </div>
    </main>
</div>
