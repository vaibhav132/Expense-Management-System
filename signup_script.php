<?php
require 'includes/common.php';

$email = mysqli_real_escape_string($con,$_POST['email']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$password = md5($_POST['password']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$select_query = "SELECT * FROM users WHERE email ='$email'";
$select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));

$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

if(mysqli_num_rows($select_query_result)>0)
{
    $m = "<span style='color:red;'>Email already exists</span>";
    header('location: signup.php?m1='.$m);
}
else if (!preg_match($regex_email, $email)) 
{
    $m = "<span style='color:red;'>Invalid Email Id</span>";
    header('location: signup.php?m1='.$m);
}
else
{
    $user_registration_query = "insert into users(name, email, password, contact) values ('$name', '$email', '$password', '$contact')";
    $user_registration_submit= mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    header('location: homepage.php');
}
?>