<?php
require 'includes/common.php';

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$planTitle=mysqli_real_escape_string($con,$_POST['title']);
$plan_from=mysqli_real_escape_string($con,$_POST['from']);
$plan_to=mysqli_real_escape_string($con,$_POST['to']);
$people_num = mysqli_real_escape_string($con,$_POST['people_num']);
$initial_budget = mysqli_real_escape_string($con,$_POST['initial_budget']);
$select_plan = "SELECT user_plan_id FROM plans WHERE user_id='" . $user_id . "'";
$select_plan_result = mysqli_query($con, $select_plan) or die(mysql_error($con));
$num_of_plans=mysqli_num_rows($select_plan_result);
$user_plan_id=$num_of_plans+1;
$user_registration_query = "INSERT INTO plans(user_id, planTitle, plan_from, plan_to, initial_budget, people_num, user_plan_id) VALUES ('$user_id', '$planTitle', '$plan_from', '$plan_to','$initial_budget','$people_num','$user_plan_id')";
$user_registration_submit= mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
for ($x = 1; $x <= $_POST['people_num']; $x++)
{
    $person_name=mysqli_real_escape_string($con,$_POST['name'.$x.'']);
    $user_registration_query = "INSERT INTO people(user_id, user_plan_id, person_name, amount) VALUES ('$user_id', '$user_plan_id', '$person_name', 0)";
    $user_registration_submit= mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
}
header('location: homepage.php?nop='.$user_plan_id);
?>