    <div id="footer">
        <ul class="footer-links">
        <?php
        if(isset($_SESSION['user_level'])){
            //neu co session
            switch($_SESSION['user_level']){
                case 0:
                {
                    echo "
                    <li><a href='edit_profile.php'>User Profile</a></li>
                    <li><a href='change_password.php'>Change password</a></li>
                    <li><a href='personal_message.php'>Personal Message</a></li>
                    <li><a href='logout.php'>Log Out</a></li>
                    ";
                    break;
                }
                case 1:
                {
                    break;
                }
                case 2:
                {
                    break;
                }
                case 3:
                {
                    echo "
                    <li><a href='edit_profile.php'>User Profile</a></li>
                    <li><a href='change_password.php'>Change password</a></li>
                    <li><a href='#'>Personal Message</a></li>
                    <li><a href='admin/admin.php'>Admin CP</a></li>
                    <li><a href='logout.php'>Log Out</a></li>
                    ";
                    break;
                }
                default:
                {
                    echo "
                    <li><a href='register.php'>Register</a></li>
                    <li><a href='login.php'>Login</a></li>
                    ";
                    break;
                }
            }
                
            }else{
                    echo "
                    <li><a href='register.php'>Home</a></li>
                    <li><a href='register.php'>Register</a></li>
                    <li><a href='login.php'>Login</a></li>
                    ";
            }
        ?>
        </ul>
    </div><!--end footer-->
</div> <!-- end content-container-->
</div> <!--end container-->
</body>
</html>
