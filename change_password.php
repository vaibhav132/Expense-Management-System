<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) 
{
 header('location: index.php');
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
                            <h4 style="text-align: center; color: black;">Change Password</h4>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="password_script.php">
                                <div class="form-group">
                                    <label for="old_pass">Old Password</label>
                                    <input type="password" class="form-control" name="old_pass" placeholder="Old Password" required="">     
                                </div>
                                <div class="form-group">
                                    <label for="new_pass">New Password</label>
                                    <input type="password" class="form-control" name="new_pass" placeholder="New Password (Min. 6 characters)" required="" minlength="6">    
                                </div>
                                <div class="form-group">
                                    <label for="repeat">Password</label>
                                    <input type="password" class="form-control" name="repeat" placeholder="Re-type New Password">    
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" name="submit" style="background-color: rgb(65, 135, 125)">Change</button>
                                <?php
                                    echo "<br><b class='red'>" . $_GET['error'] . "</b>";
                                ?>
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
