<?php
require 'includes/common.php';

$user_id = $_SESSION['user_id'];
$initial_budget = mysqli_real_escape_string($con,$_POST['initial_budget']);
$people_num = mysqli_real_escape_string($con,$_POST['people_num']);

header('location: plandetails.php?ib='.$_POST['initial_budget'].'&pn='.$_POST['people_num']);
?>