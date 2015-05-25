<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = array();
    if(!empty($_POST['name'])){
        $name = mysqli_real_escape_string($dbc, strip_tags($_POST['name']));
    }else{
        $errors[] = 'name';
    }
    
    if(isset($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $email = mysqli_real_escape_string($dbc, strip_tags($_POST['email']));
    }else{
        $errors[] = 'email';
    }
    
    if(!empty($_POST['comment'])){
        $comment = mysqli_real_escape_string($dbc,$_POST['comment']);
    }else{
        $errors[] = 'comment';
    }
    
    if(isset($_POST['captcha']) && trim($_POST['captcha'] != $_SESSION['q']['answer'])){
        $errors[] = 'wrong';
    }
    
    if(!empty($_POST['url'])){
        redirect_to('thankyou.html');
    }
    if(empty($errors)){
        //neu khong co loi xay ra them comment vao CSDL
        $q = "INSERT INTO comments (page_id,author,email,comment,comment_date) VALUES ({$pid},'{$name}','{$email}','{$comment}',NOW())";
        $r = mysqli_query($dbc,$q);
        confirm_query($r,$q);
        if(mysqli_affected_rows($dbc) == 1){
            $message = "<p class='success'>Thank you for your comment.</p>";
        }else{
            $message = "<p class='error'>Your comment could not be posted due to a system error.</p>";
        }
        
    }else{
        $message = "<p class='error'>Please try again</p>";
    }  
}

?>
<?php
    $q = "SELECT comment_id, author, comment, DATE_FORMAT(comment_date, '%b %d, %Y') AS date FROM comments WHERE page_id = {$pid}";
    $r = mysqli_query($dbc,$q);
    confirm_query($r,$q);
    if(mysqli_num_rows($r) > 0){
        echo "<ol id='disscuss'>";
        while(list($cmt_id,$author,$comment,$date) = mysqli_fetch_array($r, MYSQLI_NUM)){
            echo "<li class='comment_wrap'>
            <p class='author'>{$author}</p>
            <p class='comment-sec'>{$comment}</p>";
            if(isset($_SESSION['user_level']) && ($_SESSION['user_level'] == 3)){
                echo "<a id='{$cmt_id}' class='remove'>Delete</a>";
            }
            echo "<p class='date'>{$date}</p>
            </li>";
        }
        echo "</ol>";
        
    }else{
        echo "<h2>Be the first to comment</h2>";
    }
?>

<form id="comment-form" action="" method="post">
    <fieldset>
    	<legend>Leave a comment</legend>
        <?php if(isset($message)) echo $message?>
            <div>
            <label for="name">Name: <span class="required">*</span>
            <?php if(isset($errors) && in_array('name',$errors)){ echo "<span class='warning'>Please enter your name.</span>";}?>
            </label>
            <input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) {echo htmlentities($_POST['name'],ENT_COMPAT,'UTF-8');}?>" size="20" maxlength="80" tabindex="1" />
        </div>
        <div>
                <label for="email">Email: <span class="required">*</span>
                <?php if(isset($errors) && in_array('email',$errors)){ echo "<span class='warning'>Please enter your email.</span>";}?>
                </label>
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) { echo htmlentities($_POST['email']);}?>" size="20" maxlength="80" tabindex="2" />
            </div>
        <div>
            <label for="comment">Your Comment: <span class="required">*</span>
            <?php if(isset($errors) && in_array('comment',$errors)){ echo "<span class='warning'>Please enter your message.</span>";}?>
            </label>
            <div id="comment"><textarea name="comment" rows="10" cols="50" tabindex="3"><?php if(isset($_POST['comment'])) {echo htmlentities($_POST['comment'],ENT_COMPAT,'UTF-8');}?></textarea></div>
        </div>
        
        <div>
        <label for="captcha">Phien ban dien vao gia tri so cho cau hoi sau: <?php echo captcha();?><span class="required">*</span>
        <?php if(isset($errors) && in_array('wrong',$errors)){ echo "<span class='warning'>Please give a correct answer.</span>";}?>
        </label>
            <input type="text" name="captcha" id="captcha" value="" size="20" maxlength="4" tabindex="4" />
        </div>
        <div class="website">
        <label for="website">Neu ban nhin thay truong nay thi DUNG dien gi vao het: </label>
        <input type="text" name="url" id="url" value="" size="10" maxlength="20" />
        </div>
    </fieldset>
    <div><input type="submit" name="submit" value="Post Comment" /></div>
</form>