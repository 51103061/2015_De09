<?php $title='Đăng nhập'; include('includes/header.php');?>
 <?php include('includes/mysqli_connect.php');?>
 <?php include('includes/functions.php');?>
 <?php include('includes/sidebar-a.php');?>
 <div id="content">
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //bat dau xu ly form, tao bien errors
        $errors = array();
        if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $e = mysqli_real_escape_string($dbc,$_POST['email']);
        }else{
            $errors[] = 'email';
        }
        
        //Validate password
        if(isset($_POST['password']) && preg_match('/^[\w\'._]{4,20}$/',$_POST['password'])){
            $p = mysqli_real_escape_string($dbc,$_POST['password']);
        }else{
            $errors[] = 'password';
        }
        
        if(empty($errors)){
            //bat dau truy van CSDL de lay du lieu nguoi dung
            $q = "SELECT user_id, first_name, user_level FROM user WHERE (email = '{$e}' AND pass=SHA1('$p')) AND active IS NULL";
            $r = mysqli_query($dbc,$q);
            confirm_query($r,$q);
            if(mysqli_num_rows($r) == 1){
                //neu tim duoc du lieu nguoi dung, chuyen huong ve trang thich hop.
                list($uid, $first_name, $user_level) = mysqli_fetch_array($r, MYSQLI_NUM);
                $_SESSION['user_id'] = $uid;
                $_SESSION['first_name'] = $first_name;
                $_SESSION['user_level'] = $user_level;
                redirect_to('index.php');
            }else{
                $message = "<p class='error'>The email or password do not match those on file. Or you have not activated your account.</p>";
            }
        }else{
            $message = "<p class='warning'>Please fill all the required feilds</p>";
        }
    }
    ?>
    <div id="content">
         <h2>Login Account</h2>
         <?php if(!empty($message)){ echo $message;}?>
         <form id="login" action="" method="post">
               <fieldset>
                     <legend>Login</legend>
                     <div>
                     <label for="email">Email:
                     <?php if(isset($errors) && in_array('email', $errors)) echo "<span class='warning'>Please enter your email.</span>";?>
                     </label>
                     <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email'],ENT_COMPAT);}?>" size="20" maxlength="80" tabindex="1" />

                     </div>
                     <div>
                     <label for="password">Password:
                     <?php if(isset($errors) && in_array('password', $errors)) echo "<span class='warning'>Please enter your password.</span>";?>
                     </label>
                     <input type="password" name="password" id="pass" value="" size="20" maxlength="20" tabindex="2"/>
                     </div>
               </fieldset>
               <div><input type="submit" name="submit" value="Login"/></div>
         </form>
         <p><a href="retrieve_password.php">Forgot password?</a></p>
    </div>
 </div><!--end content-->
 <?php include('includes/sidebar-b.php');?>
 <?php include('includes/footer.php');?>
    