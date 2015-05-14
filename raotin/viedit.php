<?php $idsp = $_GET["idsp"];settype($idsp,"int"); ?>
<div id="admin_title">Xem video sản phẩm</div>
<table border="1" width="100%" align="center">
	<tr>
      <td colspan="2" align="center"><a href="index.php?type=sanpham&t=video&idsp=<?php echo $idsp;?>">Thêm</a></td>
  </tr>
	<?php
		
		$t = mysql_query("SELECT * FROM sanpham_youtube
							WHERE idsp = $idsp");
		while($row_t = mysql_fetch_array($t)){
	?>
  <tr>
    <td><iframe width="630" height="472" src="//www.youtube.com/embed/<?php echo $row_t[value]?>" frameborder="0" allowfullscreen></iframe></td>
    <td><a onclick="return confirm('ban muon xoa ko?')" href="index.php?type=sanpham&t=videl&id_youtube=<?php echo $row_t['id_youtube'];?>&idsp=<?php echo $idsp;?>">Xoá</a></td>
  </tr>
  	<?php
		}
	?>
</table>
