<?php
require 'includes/common.php';

$user_id=$_SESSION['user_id'];
$user_plan_id=$_GET['plan_id'];
$_SESSION['user_plan_id']=$user_plan_id;
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
header('location: viewplan.php?ib='.$initial_budget.'&pto='.$plan_to.'&pfrom='.$plan_from.'&pTitle='.$planTitle.'&r_amount='.$remaining_amount.'&upi='.$user_plan_id);
?>