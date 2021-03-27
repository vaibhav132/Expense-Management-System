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
        <?php
        $user_id=$_SESSION['user_id'];
        $user_plan_id=$_GET['plan_id'];
        $_SESSION['user_plan_id']=$user_plan_id;
        $select_query = "SELECT planTitle, initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $user_id . "' AND user_plan_id='" . $user_plan_id . "'";
        $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
        $row=mysqli_fetch_array($select_query_result);
        $planTitle=$row['planTitle'];
        $initial_budget=$row['initial_budget'];
//        $plan_from=$row['plan_from'];
//        $plan_to=$row['plan_to'];
            $total_amount_spent=0;
        ?>
        <div class="container">
            <div class="row row_style">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-heading-color">
                            <?php
                            echo '<h4>'.$planTitle.'</h4>';
                            ?>
                        </div>
                        <div class="panel-body">
                                <table class="table" style="border-collapse: collapse;">
                                    <tr>
                                        <td>Initial Budget</td>
                                        <?php
                                        echo '<td style="float:right;">'.$initial_budget.'</td>';
                                        ?>
                                    </tr>
                                    <?php
                                    $select_query1 = "SELECT amount, person_name FROM people WHERE user_plan_id='".$user_plan_id."' AND user_id='".$user_id."'";
                                    $select_query_result1 = mysqli_query($con, $select_query1)or die($mysqli_error($con));
                                    $no_of_persons=0;
                                    while($row = mysqli_fetch_array($select_query_result1))
                                    {
                                        $total_amount_spent+=$row['amount'];
                                    echo '<tr>
                                        <td>'.$row["person_name"].'</td>
                                        <td style="float:right;">'.$row["amount"].'</td>
                                    </tr>';
                                    $no_of_persons+=1;
                                    }
                                    $remaining_amount=$initial_budget-$total_amount_spent;
                                    if($no_of_persons==0)
                                    {$no_of_persons=1;}
                                    ?>
                                    <tr>
                                        <td>Total Amount Spent</td>
                                        <?php
                                        echo '<td style="float:right;">'.$total_amount_spent.'</td>';
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Remaining Amount</td>
                                        <?php
                                        if($remaining_amount>0){
                                            echo '<td style="color:lightgreen; float:right;">'.$remaining_amount.'</td>';
                                        }
                                        elseif ($remaining_amount==0) {
                                            echo '<td style="color:black; float:right">'.$remaining_amount.'</td>';
                                        }
                                        else{
                                            echo '<td style="color:red; float:right;">'.$remaining_amount.'</td>';
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td>Individual Shares</td>
                                        <?php
                                        $i_shares=$total_amount_spent/$no_of_persons;
                                        echo '<td style="float:right;">'.$i_shares.'</td>';
                                        ?>
                                    </tr>
                                    <?php
                                    $select_query1 = "SELECT amount as P, person_name as N FROM people WHERE user_plan_id='".$user_plan_id."' AND user_id='".$user_id."'";
                                    $select_query_result1 = mysqli_query($con, $select_query1)or die($mysqli_error($con));
                                    while($row = mysqli_fetch_array($select_query_result1))
                                    {
                                    if($row["P"]-$i_shares<0){
                                    echo '<tr>
                                        <td>'.$row["N"].'</td>';
                                    $per_person=$i_shares-$row["P"];
                                    echo '<td style="color:red; float:right;">Owes Rs.'.$per_person.'</td>
                                    </tr>';
                                    }
                                    elseif($row["P"]-$i_shares==0){
                                    echo '<tr>
                                        <td>'.$row["N"].'</td>
                                        <td style="float:right;">All Settled up</td>
                                    </tr>';
                                    }
                                    else{
                                    echo '<tr>
                                        <td>'.$row["N"].'</td>';
                                    $per_person=$row["P"]-$i_shares;
                                    echo '<td style="color:lightgreen; float:right;">Gets back Rs.'.$per_person.'</td>
                                    </tr>';
                                    }
                                    }
                                    ?>
                                </table>
                                <centre>
                                    <?php
                                    $select_query = "SELECT planTitle ,initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $user_id . "' AND user_plan_id='" . $user_plan_id . "'";
                                    $select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
                                    $row=mysqli_fetch_array($select_query_result);
                                    $planTitle=$row['planTitle'];
                                    $initial_budget=$row['initial_budget'];
                                    $plan_from=$row['plan_from'];
                                    $plan_to=$row['plan_to'];
                                        $total_amount_spent=0;
                                        $select_query1 = "SELECT amount FROM people WHERE user_plan_id='".$user_plan_id."' AND user_id='".$user_id."'";
                                        $select_query_result1 = mysqli_query($con, $select_query1)or die($mysqli_error($con));
                                        while($row = mysqli_fetch_array($select_query_result1))
                                        {
                                            $total_amount_spent+=$row['amount'];
                                        }
                                        $remaining_amount=$initial_budget-$total_amount_spent;
                                    echo'<a href="viewplan.php?ib='.$initial_budget.'&pto='.$plan_to.'&pfrom='.$plan_from.'&pTitle='.$planTitle.'&r_amount='.$remaining_amount.'&upi='.$user_plan_id.'" class="btn buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125); float:right;"><span class="glyphicon glyphicon-arrow-left"> Go Back</span></a>';
                                    ?>
                                </centre>
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
