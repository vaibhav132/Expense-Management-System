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
                        <div class="panel-body">
                            <form method="POST" action="plandetails_submit.php">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" placeholder="Enter Title (Ex. Trip to Goa)" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="date" class="form-control" min="2021-01-01" placeholder="dd/mm/yyyy" required="true" name="from">
                                </div>
                                <div class="form-group">
                                    <label for="to">To</label>
                                    <input type="date" class="form-control" max="2021-03-01" placeholder="dd/mm/yyyy" required="true" name="to">
                                </div>
                                <div class="form-group">
                                    <label for="initial_budget">Initial Budget</label>
                                    <?php
                                    echo '<input type="text" class="form-control same_line" value="'.$_GET['ib'].'" name="initial_budget" readonly="">'
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="people_num">No. of people</label>
                                    <?php
                                    echo '<input type="text" class="form-control same_line" value="'.$_GET['pn'].'" name="people_num" readonly="">'
                                    ?>
                                </div>
                                    <?php
                                        for ($x = 1; $x <= $_GET['pn']; $x++) {
                                          echo '<div class="form-group">
                                                    <label for="name'.$x.'">Person '.$x.'</label>
                                                    <input type="text" class="form-control" placeholder="Person '.$x.' Name" name="name'.$x.'" required="true">
                                                </div>';
                                        }
                                    ?>
                                <button type="submit" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            $x=$_GET['pn'];
            if($x>2)
                include 'includes/footer.php';
            else
                include 'includes/fixedFooter.php';
        ?>
    </body>
</html>
