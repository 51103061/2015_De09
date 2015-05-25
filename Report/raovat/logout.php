<?php $title='Log Out'; include('includes/header.php');?>
 <?php include('includes/mysqli_connect.php');?>
 <?php include('includes/functions.php');?>
 <?php include('includes/sidebar-a.php');?>
 <div id="content">
    <?php
    if(!isset($_SESSION['first_name'])){
        redirect_to();
    }else{
        //neu co thong tin nguoi dung, va da dang nhap,se logout nguoi dung.
        $_SESSION = array();//xoa het array trong session
        session_destroy();//destroy session da tao
        setcookie(session_name(),'',time() - 36000); //xoa cookie cua trinh duyet
    }
    redirect_to();
    ?>
 
 </div><!--end content-->
 <?php include('includes/sidebar-b.php');?>
 <?php include('includes/footer.php');?>
    