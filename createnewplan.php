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
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-heading-color">
                            <h4>Create New Plan</h4>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="newplan_submit.php">
                                <div class="form-group">
                                    <label for="initial_budget" class="panelfont">Initial Budget</label>
                                    <input type="number" class="form-control" placeholder="Initial Budget (Ex. 4000)" required="true" name="initial_budget" required>
                                </div>
                                <div class="form-group">
                                    <label for="people_num" class="panelfont">How many peoples you want to add in your group?</label>
                                    <input type="number" class="form-control" placeholder="No. of people" required="true" name="people_num">
                                </div>
                                <button type="submit" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">Next</button>
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
