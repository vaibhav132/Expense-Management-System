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
        $user_id = $_SESSION['user_id'];
        $select_plan = "SELECT user_plan_id FROM plans WHERE user_id='" . $user_id . "'";
        $select_plan_result = mysqli_query($con, $select_plan) or die(mysql_error($con));
        $num_of_plans=mysqli_num_rows($select_plan_result);
        ?>
        <?php
        if($num_of_plans==0)
        {
        echo '<div class="container-fluid page-margin">
            <div class="row row_style gap">
                <h3>You don\'t have any active plans</h3>
                <center>
                        <div id="homepage-content">
                            <ul class="u-list">
                                <li><a href="createnewplan.php" class="list-color"><span class="glyphicon glyphicon-plus-sign"></span> Create a New Plan</a></li>
                            </ul>
                        </div>
                </center>
            </div>
        </div>';
        }
        else
        {
        echo '<div class="container-fluid page-margin">
                <div class="row row_style">
                    <centre>
                        <div>
                                <h3>Your Plans</h3>
                        </div>
                    </centre>';
                    
                    $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=1";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=1" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>';
        if($num_of_plans>1)
        {
            $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=2";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=2" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>';
        }
        if($num_of_plans>2)
        {
            $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=3";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=3" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>';
        }
        if($num_of_plans>3)
        {
            $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=4";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=4" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>
                </div>'; //closing of 1st row
        }
        if($num_of_plans>4)
        {
            echo '<div class="row">';
                    
                    $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=5";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=5" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>';
        }
        if($num_of_plans>5)
        {
            $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=6";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=6" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>';
        }
        if($num_of_plans>6)
        {
            $select_query = "SELECT planTitle, initial_budget, plan_from, plant_o FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=7";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=7" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>';
        }
        if($num_of_plans==8)
        {
            $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $_SESSION['user_id'] . "' AND user_plan_id=8";
                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                    $row=mysqli_fetch_array($select_query_result);
                    
                    echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['planTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>';
                                        if($row['initial_budget']>0){
                                        echo '<td style="color:lightgreen;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else if($row['initial_budget']<0){
                                        echo '<td style="color:red;float:right;">'.$row['initial_budget'].'</td>'; }
                                        else {
                                        echo '<td style="float:right;">'.$row['initial_budget'].'</td>'; }
                                        echo '</tr>
                                        <tr>
                                            <td>Date</td>
                                            <td style="float:right;">'.$row['plan_from'].' - '.$row['plan_to'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>
                            <a href="homepage_submit.php?plan_id=8" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">View Plan</a>
                            </div>
                        </div>
                    </div>
                </div>'; //closing of 2nd row
        }
        
        if($num_of_plans<4 or $num_of_plans<8)
        {
            echo '</div>'; //if either of 1st(if nop<4) or 2nd(if nop<8) row is open 
        }
        echo '</div>
            <div class="add_plus">
                <a href="createnewplan.php"><span class="glyphicon glyphicon-plus-sign glyph_1"></span></a>
            </div>';    
        }
        ?>
        <?php
        include 'includes/fixedFooter.php';
        ?>
    </body>
</html>


