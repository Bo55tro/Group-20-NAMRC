<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<body>
</body>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Cells:</h2><br>
    
<div class="row">
    <div class="col-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th style="min-width: 75px;">Tech ID</th> 
                <th style="min-width: 75px;">First Name</th>
                <th style="min-width: 75px;">Middle Name</th>  
                <th style="min-width: 75px;">Last Name</th> 
                <th style="min-width: 175px;">Email</th> 
                <th style="min-width: 75px;">Password</th>
                <th style="min-width: 75px;">Address ID</th>  
                <th style="min-width: 75px;">Dob</th> 
                <th style="min-width: 75px;">Department ID</th> 
                <th style="min-width: 75px;">Update</th>
           
                
                </thead>
           
                
           
            <?php
            include 'ViewemployeesSQL.php';
            $Employee = getEmployee();

            for ($i=0; $i<count($Employee); $i++):

            foreach ($Employee as $row)
            ?>
            <tr>
                <td><?php echo $Employee[$i]['tech_ID']?></td>
                <td><?php echo $Employee[$i]['tech_fname']?></td>
                <td><?php echo $Employee[$i]['tech_mname']?></td>
                <td><?php echo $Employee[$i]['tech_lname']?></td>
                <td><?php echo $Employee[$i]['tech_email']?></td>
                <td><?php echo $Employee[$i]['tech_password']?></td>
                <td><?php echo $Employee[$i]['address_id']?></td>
                <td><?php echo $Employee[$i]['tech_dob']?></td>
                <td><?php echo $Employee[$i]['DEP_ID']?></td>
                <td><a href="MCM_Update.php?tech_ID=<?php echo $Employee[$i]['tech_ID'];?>">Update</a></td>
                <td colspan="2" align="center">
                
                </tr>
                </body>
                

                <?php
                endfor;
                ?>
                    
                </table>
            </div>
        </div>
    </main>
</div>
