 <?php include('../includes/header.php');?>
 <?php include('../includes/functions.php');?>
 <?php include('../includes/sidebar-admin.php');?>
    <div id="content">
   
   <?php if($_SESSION['user_level'] != 3) redirect_to();?>
        <h2>Admin Panel</h2>
        <div>
            <p>
                Chào mừng bạn đến với trang admin của rao vặt, bạn có thể thêm sửa xóa nội dung ở đây!!!
            </p>
        </div>

    </div><!--end content-->
<?php include('../includes/sidebar-b.php');?>
 <?php include('../includes/footer.php');?>
    
