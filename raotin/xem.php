<?php $idsp = $_GET["idsp"];settype($idsp,"int"); ?>
<div id="admin_title">Xem hình ảnh sản phẩm</div>
<table border="1" width="300px" align="center">
	<tr>
      <td colspan="2" align="center"><a href="index.php?type=sanpham&t=pic&idsp=<?php echo $idsp;?>">Thêm</a></td>
  </tr>
	<?php
		
		$t = mysql_query("SELECT * FROM sanpham_hinh
							WHERE idsp = $idsp");
		while($row_t = mysql_fetch_array($t)){
	?>
  <tr>
    <td width="200px"><img src="../upload/sanpham/hinhphu/<?php echo $row_t[urlHinh]?>" width="200px"/></td>
    <td><a onclick="return confirm('ban muon xoa ko?')" href="index.php?type=sanpham&t=xoa&id_hinh=<?php echo $row_t['id_hinh'];?>&idsp=<?php echo $idsp;?>">Xoá</a></td>
  </tr>
  	<?php
		}
	?>
</table>
