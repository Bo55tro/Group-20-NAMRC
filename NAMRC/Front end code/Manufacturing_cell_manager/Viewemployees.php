<!-- Viewing done by Ariba !-->
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
           
                
                </thead>
           
                
           
            <?php
            include 'ViewemployeesSQL.php';
            $Employee = getEmployee();

            for ($i=0; $i<count($Employee); $i++):

                echo "<table border='1'>";

                echo "<tr>";
            
                for ($i = 0; $i < $Employee->numColumns(); $i++) {
            
                    $columnName = $Employee->columnName($i);
            
                    echo "<th>$columnName</th>";
            
                }
            
                    echo "<th>Update</th>";
            ?>
            <tr>
                <td><?php echo $Employee[$i]['tech_ID']?></td>
                <td><?php echo $Employee[$i]['tech_fname']?></td>
                <td><?php echo $Employee[$i]['tech_mname']?></td>
                <td><?php echo $Employee[$i]['tech_lname']?></td>
                <td><?php echo $Employee[$i]['tech_email']?></td>
                <td><?php echo $Employee[$i]['address_id']?></td>
                <td><?php echo $Employee[$i]['tech_dob']?></td>
                <td><?php echo $Employee[$i]['DEP_ID']?></td>
                <td colspan="2" align="center">
                
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
