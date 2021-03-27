<?php
require 'includes/common.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Welcome | Expense Manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        
        <div class="container-fluid page-margin written">
            <div class="row row_style gap">
                <div class="col-md-6">
                    <h3>Who are we?</h3><br>
                    <p>We are a group of young technocrats who came up with an idea of solving budget and
                    time issues which we usually face in our daily lives. We are here to provide a budget 
                    controller according to your aspects.</p>
                    <p>Budget control is the biggest financial issue in the  present world. One should look after 
                        their budget control to get rid off from their financial crisis.</p><br>
                    
                    <h3>Contact Us</h3><br>
                    <p><b>Email: </b>trainings@internshala.com</p>
                    <p><b>Mobile: </b>+91-8448444853</p>
                    
                </div>
                <div class="col-md-6">
                    <h3>Why choose us?</h3><br>
                    <p>We provide with a predominant way to control and manage your budget estimations with 
                    ease of accessing for multiple users.</p>
                </div>
            </div>
        </div>
        
        <?php
        include 'includes/fixedFooter.php';
        ?>
    </body>
</html>


