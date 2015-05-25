<?php $title='Activate Account'; include('../includes/header.php');?>
 <?php include('../includes/mysqli_connect.php');?>
 <?php include('../includes/functions.php');?>
 <?php include('../includes/sidebar-a.php');?>
 <div id="content">
    <?php
    if(isset($_GET['x'],$_GET['y']) && filter_var($_GET['x'],FILTER_VALIDATE_EMAIL) && strlen($_GET['y']) == 32){
        //neu thong tin hop le thi xu ly form trong CSDL
        $e = mysqli_real_escape_string($dbc,$_GET['x']);
        $a = mysqli_real_escape_string($dbc,$_GET['y']);
        
        $q = "UPDATE user SET active = NULL WHERE email = '{$e}' AND active='{$a}' LIMIT 1";
        $r = mysqli_query($dbc,$q);
        confirm_query($r,$q);
        if(mysqli_affected_rows($dbc) == 1){
            echo "<p class='success'>Your account has been activated successfully. You may <a href='".BASE_URL."'>login.php</a> now.</p>";
        }else{
            echo "<p class='warning'>Your account could not be activated. Please try again late.</p>";
        }
    }else{
        //neu thong tin khong hop le thi chuyen huong nguoi dung
        redirect_to();
    }
    ?>
 
 </div><!--end content-->
 <?php include('../includes/sidebar-b.php');?>
 <?php include('../includes/footer.php');?>
    