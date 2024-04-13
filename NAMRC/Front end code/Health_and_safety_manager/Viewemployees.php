<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Employees:</h2><br>

<div class="row">
    <div class="col-5">
        <table class="table table-bordered table-stri5ped">
            <thead class="table-dark">
                <th style="min-width: 175px;">Employee First Name</th> 
                <th style="min-width: 175px;">Employee Last Name</th> 
                <th style="min-width: 175px;">Employee Email</th> 
                <td colspan="2" align="center"> Action </td>
                </thead>
           
                
           
            <?php
            include 'ViewemployeesSQL.php';
            $Cell = getEmployee ();

                for ($i=0; $i<count($Cell); $i++):
            ?>
            <tr>
                <td><?php echo $Cell[$i]['tech_fname']?></td>
                <td><?php echo $Cell[$i]['tech_lname']?></td>
                <td><?php echo $Cell[$i]['tech_email']?></td>
               
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
