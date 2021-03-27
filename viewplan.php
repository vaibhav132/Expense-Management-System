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
        
        <div class="container-fluid page-margin">
            <div class="row row_style">
                <div class="col-md-6 ">
                    <div class="panel panel-primary">
                        <div class="panel-heading panel-heading-color">
                            <?php
                            echo '<h4>'.$_GET['pTitle'].'</h4>';
                            ?>
                        </div>
                        <div class="panel-body">
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Budget</td>
                                            <?php
                                            echo '<td style="float:right;">'.$_GET['ib'].'</td>'; 
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>Remaining Amount</td>
                                            <?php
                                            echo '<td style="color:lightgreen; float:right;">'.$_GET['r_amount'].'</td>';
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <?php
                                            echo '<td style="float:right;">'.$_GET['pfrom'].' - '.$_GET['pto'].'</td>';
                                            ?>
                                            </tr>
                                    </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2 ">
                    <?php
                    echo '<div>
                            <a href="distribution.php?plan_id='.$_GET['upi'].'" class="btn buttonhover button1 button_ed" name="submit" style="background-color: white; color: rgb(65, 135, 125);">Expense Distribution</a>
                    </div>';
                    ?>
                </div>
            </div>
                <?php
                $select_query = "SELECT person_name FROM people WHERE user_id='".$_SESSION['user_id']."' AND user_plan_id='".$_SESSION['user_plan_id']."'";
                $select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
                $num=0;
                while ($row = mysqli_fetch_array($select_query_result)){
                    $num+=1;
                } 
                
                $select_query = "SELECT xTitle, xp_date FROM xpense WHERE user_id='".$_SESSION['user_id']."' AND user_plan_id='".$_SESSION['user_plan_id']."'";
                $select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
                        
                $select_query2 = "SELECT amount, person_name FROM people WHERE user_id='".$_SESSION['user_id']."' AND user_plan_id='".$_SESSION['user_plan_id']."'";
                $select_query_result2= mysqli_query($con, $select_query2) or die(mysqli_error($con));
                
                $count=0;
                
                while($row = mysqli_fetch_array($select_query_result) and $row2 = mysqli_fetch_array($select_query_result2)){
                        
                    $count+=1;
                    if($count%2==1 and $count>2){
                        echo '<div class="row">';
                    }
                echo '<div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>'.$row['xTitle'].'</h4>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="">
                                    <table class="table" style="border: 0;">
                                        <tr>
                                            <td>Amount</td>
                                            <td style="float:right;">Rs. '.$row2['amount'].'</td> 
                                        </tr>
                                        <tr>
                                            <td>Paid By</td>
                                            <td style="float:right;">'.$row2['person_name'].'</td> 
                                        </tr>
                                        <tr>
                                            <td>Paid on</td>
                                            <td style="float:right;">'.$row['xp_date'].'</td> 
                                        </tr>
                                    </table>
                                    <div class="form-group"></div>
                                </form>';
                        $select_query3 = "SELECT bill FROM xpense WHERE user_id='".$_SESSION['user_id']."' AND user_plan_id='".$_SESSION['user_plan_id']."'";
                        $select_query_result3= mysqli_query($con, $select_query3) or die(mysqli_error($con));
                        $row3 = mysqli_fetch_array($select_query_result3);
                        if($row3['bill']==null){
                            echo '<centre><a href="#" name="submit" class="btn btn-block buttonhover button1" style="background-color: white; color: rgb(65, 135, 125);">You Dont\'t have Bill</a></centre>';
                        }
                        else{
                            echo '<a href="'.$row3['bill'].'" name="submit" class="btn btn-block buttonhover button1" style="background-color: white; color: rgb(65, 135, 125);">Show Bill</a>';
                        }
                        echo '</div>
                        </div>
                </div>';
                    if($count%2==1 and $count>2){
                        echo '</div>';
                    }
                }
                ?>
                    <div class="container-fluid  col-md-4" style="float: right;">
                        <div class="add_expense panel panel-primary">
                            <div class="panel-heading panel-heading-color">
                                <h4>Add New Expense</h4>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="add_expense.php">
                                    <div class="form-group">
                                        <label for="xtitle">Title</label>
                                        <input type="text" class="form-control" name="xtitle" placeholder="Expense Name">    
                                    </div>
                                    <div class="form-group">
                                        <label for="xdate">Date</label>
                                        <input type="date" class="form-control" name="xdate" max="2021-03-01" placeholder="dd/mm/yyyy">    
                                    </div>
                                    <div class="form-group">
                                        <label for="amount_spent">Amount Spent</label>
                                        <input type="number" class="form-control" name="amount_spent" placeholder="Amount Spent">    
                                    </div>
                                    <div class="form-group">
                                        <label for="person"></label>
                                        <select class="form-control" name="person">
                                            <option>Choose</option>
                                            <?php
                                            $select_query = "SELECT person_name FROM people WHERE user_id='".$_SESSION['user_id']."' AND user_plan_id='".$_SESSION['user_plan_id']."'";
                                            $select_query_result= mysqli_query($con, $select_query) or die(mysqli_error($con));
                                            while ($row = mysqli_fetch_array($select_query_result)){
                                                echo '<option class="form-control" value="'.$row['person_name'].'">'.$row['person_name'].'</option>';
                                            } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bill">Upload Bill</label>
                                        <input type="file" class="form-control" name="bill" placeholder="No File Chosen">    
                                    </div>
                                    <button type="submit" class="btn btn-block buttonhover button1 " name="submit" style="background-color: white; color: rgb(65, 135, 125);">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
        include 'includes/footer.php';
        ?>
    </body>
</html>
