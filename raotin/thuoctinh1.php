<?php $idsp=$_GET["idsp"];settype($idsp,"int");
		$idcl=$_GET["idcl"];settype($idcl,"int");
 ?>
<div id="admin_title">Thuộc tính sản phẩm</div>
<?php
	$thuoctinh = mysql_query("SELECT   * FROM   sanpham_thuoctinh1
					  	WHERE	idsp = $idsp
					   ");
	$row_thuoctinh = mysql_fetch_array($thuoctinh)
?>
<style>
#thuoctinh tr td{ padding:3px}
</style>
<table id="thuoctinh" width="100%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="0"> 
  <tr> 
    <td width="130">Cấu hình máy</td> 
    <td><?php echo $row_thuoctinh['cauhinh']; ?></td> 
  </tr> 
  <tr> 
    <td>Tính năng</td> 
    <td><?php echo $row_thuoctinh['tinhnang']; ?></td> 
  </tr> 
  <tr> 
    <td >Tính năng khác</td> 
    <td><?php echo $row_thuoctinh['khac']; ?></td> 
  </tr> 
  <tr>
  	<td colspan="2">
	<?php 
		if($idcl==1){$tt="suatt";}
		else{$tt="suatt1";}
	?>
    <a href="index.php?type=sanpham&t=<?php echo $tt;?>&idsp=<?php echo $idsp;?>&idcl=<?php echo $idcl;?>">Sửa</a>
    </td>
  </tr>
</table> 
