 <?php include('includes/header.php');?>
 <?php include('includes/mysqli_connect.php');?>
 <?php include('includes/functions.php');?>
 <?php include('includes/sidebar-a.php');?>
    <div id="content">
    
    <?php 
    if($aid = validate_id($_GET['aid'])){
        $display = 4;
    $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_rage' => 1)))? $_GET['s'] : 0;
    
    
    
        //neu author ton tai thi se truy cap vao CSDL
        $q = "SELECT p.page_id, p.page_name, p.content, 
        DATE_FORMAT(p.post_on,'%b %d, %Y') AS date, 
        CONCAT_WS(' ',u.first_name,u.last_name) AS name, u.user_id
        FROM pages AS p INNER JOIN user AS u 
        USING(user_id) 
        WHERE user_id = {$aid}
        ORDER BY date ASC LIMIT {$start}, {$display}
        ";
        $r = mysqli_query($dbc,$q);
        confirm_query($r,$q);
        if(mysqli_num_rows($r) > 0){
            //neu CSDL cho ket qua
            while($author = mysqli_fetch_array($r,MYSQLI_ASSOC)){
               echo "
                    <div class='post'>
                    <h2><a href='single.php?pid={$author['page_id']}'>{$author['page_name']}</a></h2>
                    <p>".the_excerpt($author['content'])." ... <a href='single.php?pid={pid={$author['page_id']}'>Read more</a></p>
                    <p class='meta'><strong>Posted by: </strong><a href='author.php?aid={$author['user_id']}'> {$author['name']}</a> | <strong>on: </strong> {$author['date']}</p>
                    
                    </div>
               "; 
            }//END while loop
           echo pagination($aid,$display);
    
    
            
        }else{
            echo "<p class='warning>The author you are trying to view is no longer available</p>'";
        }
    }else{
      redirect_to();
    }
    ?>
    
    </div><!--end content-->
   
<?php include('includes/sidebar-b.php');?>
<?php include('includes/footer.php');?>
    
