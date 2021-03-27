<?php
require 'includes/common.php';
if (isset($_SESSION['email'])) 
{
 header('location: homepage.php');
}
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
        
        <div class="container">
            <div class="row row_style">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align: center; color: black">Sign Up</h4>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="signup_script.php">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" placeholder="Name" pattern="[A-Za-z-0-9]+\s[A-Za-z-'0-9]+" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" placeholder="Enter Valid Email" required="true" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                                    <?php
        //                                if(isset($_GET["m1"]))
        //                                {
        //                                  echo $_GET['m1'];
        //                                }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" placeholder="Password (Min. 6 characters" name="password" required="true" minlength="6">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Phone Number:</label>
                                    <input type="number" class="form-control" placeholder="Enter valid Phone Number (Ex. 8448444853)" name="contact" required="true" minlength="10">
                                </div>
                                <button type="submit" class="btn btn-success btn-block" name="submit" style="background-color: rgb(65, 135, 125)">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        include 'includes/fixedFooter.php';
        ?>
    </body>
</html>
