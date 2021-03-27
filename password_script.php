<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) 
{
header('location: index.php');
}
$old = mysqli_real_escape_string($con, $_POST['old_pass']);
$old = md5($old);
$new = mysqli_real_escape_string($con, $_POST['new_pass']);
$new = md5($new);
$repeat = mysqli_real_escape_string($con, $_POST['repeat']);
$repeat = md5($repeat);

$select_query = "SELECT email, password FROM users WHERE email ='" . $_SESSION['email'] . "'";
$select_query_result = mysqli_query($con, $select_query)or die($mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);

$original = $row['password'];

if($new == $repeat)
{
    if ($old == $original) 
    {
        $update_query = "UPDATE  users SET password = '" . $new . "' WHERE email = '" . $_SESSION['email'] . "'";
        mysqli_query($con, $update_query) or die($mysqli_error($con));
        header('location: change_password.php?error=Password Updated Successfully');
    } 
    else
        header('location: change_password.php?error=Incorrect Password.');
}
else
{
    header('location: change_password.php?error=Password not matched.');
}
?>
