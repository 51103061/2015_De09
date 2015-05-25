 <?php include('includes/header.php');?>
 <?php include('includes/mysqli_connect.php');?>
 <?php include('includes/functions.php');?>
 <?php include('includes/sidebar-a.php');?>
    <div id="content">
    <?php 
    if(isset($_GET['cid']) && filter_var($_GET['cid'],FILTER_VALIDATE_INT,array('min_rage' => 1))){
        $cid = $_GET['cid'];
        $user_id = $_SESSION['user_id'];
        $q = "SELECT p.page_id, p.page_name, LEFT(p.content, 400) AS content,";
        $q .= " DATE_FORMAT(p.post_on,'%b %d, %Y') AS date,";
        $q .= " CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id";
        $q .= " FROM pages AS p";
        $q .= " INNER JOIN user AS u";
        $q .= " USING(user_id)";
        $q .= " WHERE p.cat_id = {$cid}";
        $q .= " ORDER BY date ASC LIMIT 0, 10";
        $r = mysqli_query($dbc,$q);
        confirm_query($r,$q);
        if(mysqli_num_rows($r) > 0){
            //co page hien thi ra trinh duyet
            while($page = mysqli_fetch_array($r,MYSQLI_ASSOC)){
               echo "
                    <div class='post'>
                    <h2><a href='single.php?pid={$page['page_id']}'>{$page['page_name']}</a></h2>
                    <p>".the_excerpt($page['content'])." ... <a href='single.php?pid={$page['page_id']}'>Read more</a></p>
                    <p class='meta'><strong>Posted by: </strong><a href='author.php?aid={$page['user_id']}'> {$page['name']}</a> | <strong>on: </strong> {$page['date']}</p>
                    
                    </div>
               "; 
            }//END while loop
        }else{
            echo "<p>There are currently no post in this category.</p>";
        }
    }
    
    elseif(isset($_GET['pid']) && filter_var($_GET['pid'],FILTER_VALIDATE_INT,array('min_rage' => 1))){
        $pid = $_GET['pid'];
        $q = "SELECT p.page_name, p.content, 
        DATE_FORMAT(p.post_on,'%b %d, %Y') AS date, 
        CONCAT_WS(' ',u.first_name,u.last_name) AS name, 
        u.user_id, COUNT(c.comment_id) AS count 
        FROM pages AS p INNER JOIN user AS u 
        USING(user_id) LEFT JOIN comments AS c 
        ON p.page_id = c.page_id 
        WHERE p.page_id = ($pid) 
        GROUP BY p.page_name 
        ORDER BY date ASC 
        ";
        $r = mysqli_query($dbc,$q);
        confirm_query($r,$q);
         if(mysqli_num_rows($r) > 0){
            //co page hien thi ra trinh duyet
            while($pages = mysqli_fetch_array($r,MYSQLI_ASSOC)){
               echo "
                    <div class='post'>
                    <h2><a href='single.php?pid={$pid}'>{$pages['page_name']}</a></h2>
                    <p class='comments'><a href='single.php?pid={$pid}#disscuss'>{$pages['count']}</a></p>
                    <p>".the_excerpt($pages['content'])." ... <a href='single.php?pid={$pid}'>Read more</a></p>
                    <p class='meta'><strong>Posted by: </strong><a href='author.php?aid={$pages['user_id']}'> {$pages['name']}</a> | <strong>on: </strong> {$pages['date']}</p>
                    
                    </div>
               "; 
            }//END while loop
        }else{
            //trong truong hop khong co post, hoac page da bi xoa.
            echo "<p class='warning'>The post you are trying to view is no longer in our database.</p>";
        }
        }else{
            
    ?>
    <h2>Chào mừng bạn đến với trang web rao vặt</h2>
        <div>
            <p>Chào mừng bạn đến với trang chủ của trang web rao vặt</p>
        </div>
        <?php } ?>
    </div><!--end content-->
<?php include('includes/sidebar-b.php');?>
 <?php include('includes/footer.php');?>
    
