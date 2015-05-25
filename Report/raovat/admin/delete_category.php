 <?php include('../includes/header.php');?>
 <?php include('../includes/mysqli_connect.php');?>
  <?php include('../includes/functions.php');?>
 <?php include('../includes/sidebar-admin.php');?>
<div id="content">
    <?php
    if(isset($_GET['cid'],$_GET['cat_name']) && filter_var($_GET['cid'],FILTER_VALIDATE_INT,array('min_rage' => 1))){
        $cid = $_GET['cid'];
        $cat_name = $_GET['cat_name'];
        //neu cid va cat name ton tai thi se xoa category khoi co so du lieu.
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //xu ly form
            if(isset($_POST['delete']) && $_POST['delete'] == 'yes'){
                //neu muon delete category
                $q = "DELETE FROM categories WHERE cat_id = {$cid} LIMIT 1";
                $r = mysqli_query($dbc,$q);
                confirm_query($r,$q);
                if(mysqli_affected_rows($dbc) == 1){
                    $message = "<p class='success'>The category was deleted success.</p>";
                }else{
                    $message = "<p class='warning'>The category was not deleted due to a system error.</p>";
                }
            }else{
                //ko muon delete category
                $message = "<p class='warning'>I though so too! shouldn't be deleted. </p>";
            }
        }
    }else{
        //neu cid va cat_name khong dung dinh dang hoac khong mong muon
        redirect_to('admin/view_categories.php');
    }
    ?>
	<h2>Delete Category: <?php if(isset($cat_name)) echo htmlentities($cat_name, ENT_COMPAT,'utf-8'); ?></h2>
    <?php if(!empty($message)) echo $message; ?>
    <form action="" method="POST">
    <fieldset>
        <legend>Delete Category</legend>
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
