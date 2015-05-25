 <?php include('includes/mysqli_connect.php');?>
 <?php include('includes/functions.php');?>
 <?php if($pid = validate_id($_GET['pid'])){
        // neu bien pid hop le thi tien hanh truy van CSDL
        $set = get_page_by_id($pid);
        $posts = array();
        if(mysqli_num_rows($set) > 0){
            //co page hien thi ra trinh duyet
            $page = mysqli_fetch_array($set,MYSQLI_ASSOC);
               $title = $page['page_name'];
               $page_views = view_counter($pid);

               $posts[] = array('page_name' => $page['page_name'],
                'content' => $page['content'],
                 'author' => $page['name'],
                  'post_on' => $page['date'],
                  'aid' => $page['user_id']
                  );
        }else{
            echo "<p>There are currently no post in this category.</p>";
        }
    }else{
        //neu pid khong hop le thi chuyen nguoi dung ve trang index
        redirect_to('index.php');
    } ?>
 <?php include('includes/header.php');?>
 <?php include('includes/sidebar-a.php');?>
    <div id="content">
    <?php 
    foreach($posts as $post){
               echo "
                    <div class='post'>
                    <h2>{$post['page_name']}</h2>
                    <p>".the_content($post['content'])."</p>
                    <p class='meta'><strong>Posted by: </strong><a href='author.php?aid={$post['aid']}'>{$post['author']}</a> | <strong>on: </strong> {$post['post_on']}
                    <strong>Page views: </strong> {$page_views}

                    </p>
                    
                    </div>
               
               "; 
    }
    ?>
    <?php include('includes/comment_form.php')?>

    </div><!--end content-->
<?php include('includes/sidebar-b.php');?>
 <?php include('includes/footer.php');?>
    
