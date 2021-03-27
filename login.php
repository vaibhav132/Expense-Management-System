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
                    <br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align: center; color: black;">Login</h4>
                        </div>
                        <div class="panel-body">
                            <p class="text-warning">Login to manage budget</p>
                            <form method="POST" action="login_submit.php">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">    
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">    
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="submit" style="background-color: rgb(65, 135, 125)">Login</button>
                                <?php
                                    echo "<br><b class='red'>" . $_GET['error'] . "</b>";
                                ?>
                            </form>
                        </div>
                        <div class="panel-footer">
                            Don't have an account? <a href="signup.php">Register Here</a>
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
