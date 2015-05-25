 <?php include('../includes/header.php');?>
 <?php include('../includes/mysqli_connect.php');?>
  <?php include('../includes/functions.php');?>
 <?php include('../includes/sidebar-admin.php');?>
<div id="content">
    <?php
    if(isset($_GET['pid'],$_GET['pn']) && filter_var($_GET['pid'],FILTER_VALIDATE_INT,array('min_rage' => 1))){
        $pid = $_GET['pid'];
        $page_name = $_GET['pn'];
        //neu pid va page name ton tai thi se xoa page khoi co so du lieu.
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //xu ly form
            if(isset($_POST['delete']) && $_POST['delete'] == 'yes'){
                //neu muon delete page
                $q = "DELETE FROM pages WHERE page_id = {$pid} LIMIT 1";
                $r = mysqli_query($dbc,$q);
                confirm_query($r,$q);
                if(mysqli_affected_rows($dbc) == 1){
                    $message = "<p class='success'>The page was deleted success.</p>";
                }else{
                    $message = "<p class='warning'>The page was not deleted due to a system error.</p>";
                }
            }else{
                //ko muon delete page
                $message = "<p class='warning'>I though so too! shouldn't be deleted. </p>";
            }
        }
    }else{
        //neu pid va page_name khong dung dinh dang hoac khong mong muon
        redirect_to('admin/view_pages.php');
    }
    ?>
	<h2>Delete Page: <?php if(isset($page_name)) echo htmlentities($page_name, ENT_COMPAT,'utf-8'); ?></h2>
    <?php if(!empty($message)) echo $message; ?>
    <form action="" method="POST">
    <fieldset>
        <legend>Delete Page</legend>
        <label for="delete">Are you sure?</label>
        <div>
            <input type="radio" name="delete" value="no" checked="checked"/> No
            <input type="radio" name="delete" value="yes" /> Yes
        </div>
        <div><input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure?');"/></div>
    
    </fieldset>
    </form>
    
    
</div><!--end content-->
<?php include('../includes/sidebar-b.php');?>
<?php include('../includes/footer.php');?>
