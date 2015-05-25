<?php $title='Đổi mật khẩu'; include('includes/header.php');?>
 <?php include('includes/mysqli_connect.php');?>
 <?php include('includes/functions.php');?>
 <?php include('includes/sidebar-a.php');?>
 <div id="content">
    <?php
    //kiem tra nguoi dung da dang nhap hay chua
         is_logged_in();
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //bat dau xu ly form
            $errors = array();
            if(isset($_POST['cur_password']) && preg_match('/^[\w\'.-]{4,20}$/',trim($_POST['cur_password']))){
                //truy van CSDL
                $cur_password = mysqli_real_escape_string($dbc,trim($_POST['cur_password']));
                $q = "SELECT first_name FROM user WHERE pass = SHA1('$cur_password') AND user_id = {$_SESSION['user_id']}";
                $r = mysqli_query($dbc,$q);
                confirm_query($r,$q);
                //neu co gia tri tra ve thi lam tiep
                if(mysqli_num_rows($r) == 1){
                    // tim thay. cho phep doi mk
                    if(isset($_POST['password1']) && preg_match('/^[\w\'.-]{4,20}$/',trim($_POST['password1']))){
                        //neu dung
                        //kiem tra xem pass1 co bang pass2 ko
                        if($_POST['password1'] == $_POST['password2']){
                            //neu 2 truong jong nhau
                            $np = mysqli_real_escape_string($dbc,trim($_POST['password1']));
                            
                            $q = "UPDATE user SET pass = SHA1('$np') WHERE user_id = {$_SESSION['user_id']} LIMIT 1";
                            $r = mysqli_query($dbc,$q);
                            confirm_query($r,$q);
                            if(mysqli_affected_rows($dbc) == 1){
                                //neu update thanh cong
                                $message = "<p class='success'>Your password has been successfully updated.</p>";
                            }else{
                                //neu update ko thanh cong
                                $errors[] = "<p class='error'>Your password could not be changed due to a system error.</p>";
                            }
                        }else{
                            $errors[] = "<p class='error'>Your password and confirm password do not match.</p>";
                        }
                        }else{
                            //neu sai
                            $errors[] = "<p class='error'>Your password is either too short or missing.</p>";
                        }
                    
                }else{
                    $errors[] = "<p class='warning'>Your current password is incorrect. Please check your email to verify your password.</p>";
                }
            }else{
                $errors[] = "<p class='error'>Your password is either too short or missing.</p>";
            }
         }
    ?>
    <h2>Change Password</h2>
    <?php if(isset($message)) {echo $message; }
    if(isset($errors)) {report_error($errors);}
    ?>
    <form action="" method="post">
         <fieldset>
         <legend>Change Password:</legend>
         
         <div>
         <label for="current password">Current Password:
         
         </label>
         <input type="password" name="cur_password" value="" size="20" maxlength="40" tabindex="1"/>
         </div>
         
         <div>
         <label for="New password:">New Password:
         
         </label>
         <input type="password" name="password1" value="" size="20" maxlength="40" tabindex="2"/>
         </div>
         
         <div>
         <label for="Confirm password">Confirm Password:
         
         </label>
         <input type="password" name="password2" value="" size="20" maxlength="40" tabindex="3"/>
         </div>
         </fieldset>
         <div><input type="submit" name="submit" value="Update Password" tabindex="4"/></div>
    </form>
 
 </div><!--end content-->
 <?php include('includes/sidebar-b.php');?>
 <?php include('includes/footer.php');?>
    