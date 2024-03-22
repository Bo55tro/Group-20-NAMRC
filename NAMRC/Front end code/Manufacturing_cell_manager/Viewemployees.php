<!-- Viewing done by Ariba !-->

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Cells:</h2><br>

<div class="row">
    <div class="col-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th style="min-width: 175px;">First Name</th> 
                <th style="min-width: 175px;">Last Name</th> 
                <th style="min-width: 175px;">Email</th> 
                <th style="min-width: 175px;">Dob</th> 
           
                <td colspan="2" align="center"> Action </td>
                </thead>
           
                
           
            <?php
            include 'ViewemployeesSQL.php';
            $Employee = getEmployee();

                for ($i=0; $i<count($Employee); $i++):
            ?>
            <tr>
                <td><?php echo $Cell[$i]['tech_fname']?></td>
                <td><?php echo $Cell[$i]['tech_lname']?></td>
                <td><?php echo $Cell[$i]['tech_email']?></td>
                <td><?php echo $Cell[$i]['tech_dob']?></td>
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
