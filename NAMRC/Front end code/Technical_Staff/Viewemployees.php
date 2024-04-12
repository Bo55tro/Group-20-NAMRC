<!-- Javascript coded to retrieve technical staff trainings and certifications - ariba -->
<?php
// Check if email is set in the session
if (!isset($_SESSION['email'])) {
    // Handle the case where email is not set in the session
    echo "Email not found in session.";
    exit();
}
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: Technical_Login.php");
    exit();
}

$email = $_SESSION['email']; // Retrieve email from session

?>

<!DOCTYPE html>
<html>
<head>
    <title>Technical Employees</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!--W3Schools script for ajax--> <!--needs to be referenced-->
    <script>
    $(document).ready(function() {
        var staff_email = "<?php echo $email; ?>"; //gets the email from technical staff login 

        $.ajax({
            url: "process_staff_data.php",
            type: "POST",
            dataType: "json",
            data: { email: staff_email },
            success: function(response) {
                if (response.success) {
                    var staff_data = response.data;
                    var html = "<h2>Your Training & Certifications:</h2>";
                    staff_data.forEach(function(item) {
                        html += "Training: " + item.training + ", Certifications: " + item.certifications + "<br>";                        
                    });
                    $("#staff_data").html(html);
                } else {
                    $("#staff_data").html("Error retrieving staff data."); 
                }
            },
            error: function(xhr, status, error) {
                console.error("Error: ", error);
                $("#staff_data").html("An error occurred while processing your request.");
            }
        });
    });
    </script>
    </head>
    <body>
        <div id="staff_data"></div>
        <?php include 'C:\xampp\htdocs\Group-20-NAMRC\NAMRC\Front end code\Technical_Staff\Viewemployees.php'; ?>
    </body>
    </html>



