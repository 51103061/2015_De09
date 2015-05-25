 <?php include('../includes/header.php');?>
 <?php include('../includes/mysqli_connect.php');?>
  <?php include('../includes/functions.php');?>
 <?php include('../includes/sidebar-admin.php');?>
<div id="content">
	<h2>Manage Pages</h2>
    <table>
    	<thead>
    		<tr>
    			<th><a href="view_pages.php?sort=pag">Pages</a></th>
    			<th><a href="view_pages.php?sort=pos">Posted on</th>
    			<th><a href="view_pages.php?sort=by">Posted by</th>
                <th>content</th>
                <th>Edit</th>
                <th>Delete</th>
    		</tr>
    	</thead>
    	<tbody>
        <?php 
        //sap xep thu tu cua table head
        if(isset($_GET['sort'])){
            switch ($_GET['sort']){
                case 'pag':
                $order_by = 'page_name';
                break;
                case 'pos':
                $order_by = 'date';
                break;
                case 'by':
                $order_by = 'name';
                break;
                default:
                $order_by = 'date';
                break;
            }
        }else{
            $order_by = 'date';
        }
        //truy suat du lieu cua CSDL de hien thi categories
            $q = "SELECT p.page_id,p.page_name,DATE_FORMAT(post_on, '%b, %d, %Y') AS date, p.user_id, CONCAT_WS(' ', first_name, last_name) AS name, p.content";
            $q .=" FROM pages AS p";
            $q .=" JOIN user AS u";
            $q .=" USING(user_id)";
            $q .=" ORDER BY {$order_by} ASC";
            $r = mysqli_query($dbc,$q);
            confirm_query($r,$q);
            if(mysqli_num_rows($r) > 0){
                //neu co page de hien thi ra trinh duyet thi chay
            while($pages = mysqli_fetch_array($r,MYSQLI_ASSOC)){
                echo "
               <tr>
                <td>{$pages['page_name']}</td>
                <td>{$pages['date']}</td>
                <td>{$pages['name']}</td>
                <td>".the_excerpt($pages['content'])."</td>
                <td><a class='edit' href='edit_page.php?pid={$pages['page_id']}'>Edit</a></td>
                <td><a class='delete' href='delete_page.php?pid={$pages['page_id']}&pn={$pages['page_name']}'>Delete</a></td>
               </tr> 
               ";
            }
            }else{
                // neu khong co hien thi bao loi hoac noi nguoi dung tao page
                $message = "<p class='warning>No page please add page</p>'";
            }
        ?>
            
    	</tbody>
    </table>
</div><!--end content-->
<?php include('../includes/sidebar-b.php');?>
<?php include('../includes/footer.php');?>
