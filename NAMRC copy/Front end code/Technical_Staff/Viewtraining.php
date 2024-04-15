<!-- Viewing done by Ariba !-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
    <header class="header">
        <div class="logo">
            <img class="logo-img" src="logo.png" alt="Nuclear AMRC Logo">
        </div>
        <nav class="navigation">
            <ul class="left-options">
            <li><a href="Technical_View.php">View employees</a></li>
            <li><a href="Technical_Viewcell.php">View cells</a></li>
            <li><a href="Technical_Viewtraining.php">View available training/certifications</a></li>
            <li class="right-link"><a href="../Home.html">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>


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
    <div class= "tablelink">Press the "Next" icon to view the list of certifications. <a href="../Technical_Staff/Technical_Viewcertificate.php">Next</a></div>


</div>

