<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<nav class="navbar">
<ul>
        <li><a href="Technical_Home.php">Back</a></li>
        <li><a href="Technical_view.php">View employees</a></li>
        <li><a href="Technical_Viewcell.php">View cells</a></li>
        <li class="right-link"><a href="../Home.html">Logout</a></li>
    </ul>
</nav>
<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2>View Training:</h2><br>

<div class="row">
    <div class="col-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <th style="min-width: 175px;">Training ID</th> 
                <th style="min-width: 175px;">Training Name</th> 
                </thead>
           
           
            <?php
            include 'viewtrainingSQL.php';
            $Training = getTraining();

                for ($i=0; $i<count($Training); $i++):
            ?>
            <tr>
                <td><?php echo $Training[$i]['training_ID']?></td>
                <td><?php echo $Training[$i]['training_name']?></td>
                </body>
                </tr>
              

                    <?php
                    endfor;
                    ?>
                </table>
            </div>
        </div>
    </main>
    <div class= "tablelink">Press the "Next" icon to view the list of certifications. <a href="../Technical_Staff/Viewcertifications.php">Next</a></div>


</div>

