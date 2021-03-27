<?php
require 'includes/common.php';

$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$password = md5($_POST['password']);
$select_query = "SELECT id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
if(mysqli_num_rows($select_query_result)==0)
{
  $error = $_GET['error'];
  $error = "<span style='color:red;'>Enter the correct E-mail and Password pair</span>";
  header('location: login.php?error=' . $error);
}
else
{
    $row=mysqli_fetch_array($select_query_result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_id'] = $row['id'];
    $select_plan = "SELECT plan_id FROM plans WHERE email='" . $email . "' AND password='" . $password . "'";
    $select_plan_result = mysqli_query($con, $select_plan);
    $num_of_plans=mysqli_num_rows($select_plan_result);
    header('location: homepage.php?nop='.$num_of_plans);
}
?>