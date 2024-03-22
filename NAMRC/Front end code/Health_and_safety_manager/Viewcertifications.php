<!-- Viewing done by Ariba !-->

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Certifications:</h2><br>

<div class="row">
    <div class="col-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th style="min-width: 175px;">Certification ID</th> 
                <th style="min-width: 175px;">Certification Name</th> 
                <th style="min-width: 175px;">Cell ID</th> 
                </thead>
           
           
            <?php
            include 'ViewcertifcationsSQL.php';
            $Certifications = getCertifications();

                for ($i=0; $i<count($Certifications); $i++):
            ?>
            <tr>
                <td><?php echo $Certifications[$i]['certification_ID']?></td>
                <td><?php echo $Certifications[$i]['certification_name']?></td>
                <td><?php echo $Certifications[$i]['cell_ID']?></td>
                <a href="deletecertifications.php?certification_ID=<?php echo $Training[$i]['certification_ID']; ?>"> Delete</a><td>
                <a href="../Viewtraining.php">Back</a>
                </body>
                </tr>

                    <?php
                    endfor;
                    ?>
                </table>
            </div>
        </div>
    </main>
</div>
