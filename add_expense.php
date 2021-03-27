<?php
require 'includes/common.php';

$user_id=$_SESSION['user_id'];
$user_plan_id=$_SESSION['user_plan_id'];
$xTitle=mysqli_real_escape_string($con,$_POST['xtitle']);
$xdate=mysqli_real_escape_string($con,$_POST['xdate']);
$amount_spent=mysqli_real_escape_string($con,$_POST['amount_spent']);
$person=mysqli_real_escape_string($con,$_POST['person']);
$xpense_registration_query = "insert into xpense(amount_spent, xp_date, xTitle, user_id, user_plan_id) values ('$amount_spent', '$xdate', '$xTitle', '$user_id', '$user_plan_id')";
$xpense_registration_submit= mysqli_query($con, $xpense_registration_query) or die(mysqli_error($con));    
$person_xpense_query = "UPDATE people SET amount='".$amount_spent."' WHERE user_id='".$user_id."' AND user_plan_id='".$user_plan_id."' AND person_name='".$person."'";
$person_xpense_submit= mysqli_query($con, $person_xpense_query) or die(mysqli_error($con));    

    function GetImageExtension($imagetype){
    if(empty($imagetype)) return false;
    switch($imagetype){
    case 'image/bmp': return '.bmp';
    case 'image/gif': return '.gif';
    case 'image/jpeg': return '.jpg';
    case 'image/png': return '.png';
    default: return false;
    }
    }
if (!empty($_FILES["bill"]["name"])) 
{
    $file_name=$_FILES["bill"]["name"];
    $temp_name=$_FILES["bill"]["tmp_name"];
    $imgtype=$_FILES["bill"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=date("d-m-Y")."-".time().$ext;
    $target_path = "img/".$imagename;
    if(move_uploaded_file($temp_name, $target_path)){
    // Make a query to save data to your database.
        $image_insertion_query="insert into xpense(bill) values ('$target_path')";
        $image_insertion_result=mysqli_query($con, $image_insertion_query);
    }
}
$select_query = "SELECT planTitle ,initial_budget, plan_from, plan_to FROM plans WHERE user_id='" . $user_id . "' AND user_plan_id='" . $user_plan_id . "'";
$select_query_result = mysqli_query($con, $select_query) or die(mysql_error($con));
$row=mysqli_fetch_array($select_query_result);
$planTitle=$row['planTitle'];
$initial_budget=$row['initial_budget'];
$plan_from=$row['plan_from'];
$plan_to=$row['plan_to'];
    $select_query = "SELECT people.amount as A, people.user_id, users.id FROM people JOIN users ON people.user_id = users.id AND people.user_plan_id='.$user_plan_id.'";
    $select_query_result = mysqli_query($con, $select_query);
    $total_amount_spent=0;
    while($row = mysqli_fetch_array($select_query_result))
    {
        $total_amount_spent+=$row['A'];
    }
    $remaining_amount=$initial_budget-$total_amount_spent;
header('location: viewplan.php?ib='.$initial_budget.'&pto='.$plan_to.'&pfrom='.$plan_from.'&pTitle='.$planTitle.'&r_amount='.$remaining_amount.'&upi='.$user_plan_id);
?>