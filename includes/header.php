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
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid page-margin">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand">Ct&#8377;l Budget</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if (isset($_SESSION['email'])) 
                            {
                        ?>
                            <li><a href = "about.php"><span class = "glyphicon glyphicon-shopping-cart"></span> About us </a></li>
                            <li><a href = "change_password.php?error="><span class = "glyphicon glyphicon-user"></span> Password Settings</a></li>
                            <li><a href = "logout.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>
                        ?>
                        <?php
                            } 
                            else 
                            {
                        ?>
                            <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
                            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="login.php?error="><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
