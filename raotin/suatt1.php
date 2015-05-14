<?php $idsp=$_GET["idsp"];settype($idsp,"int");
	$qr = "SELECT * FROM sanpham_thuoctinh1
		WHERE idsp = $idsp";
		$hang =  mysql_query($qr);
	$row_hang = mysql_fetch_array($hang)
 ?>
 <?php
	if (isset($_POST['btn_edittt1'])){
		$cauhinh = $_POST['cauhinh'];
		$tinhnang = $_POST['tinhnang'];
		$khac = $_POST['khac'];
		$qr = "UPDATE sanpham_thuoctinh1
				SET
					cauhinh = '$cauhinh',
					tinhnang = '$tinhnang',
					khac = '$khac'
				WHERE idsp = $idsp";
		mysql_query($qr);
		echo "<script>alert('Sửa thuộc tính điện thoại thành công');window.location = \"index.php?type=sanpham&t=thuoctinh1&idsp=".$idsp."&idcl=".$idcl."\";</script>";
	}
?>
 
<div id="admin_title">Sửa thuộc tính điện thoại</div>
<style>
#thuoctinh tr td padding:3px}
</style>
<form name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>
      <td>Cấu hình máy</td>
      <td><label for="cauhinh"></label>
      <textarea name="cauhinh" id="cauhinh" cols="45" rows="5"><?php echo $row_hang['cauhinh'] ?></textarea></td>
    </tr>
    <tr>
      <td>Tính năng</td>
      <td><label for="tinhnang"></label>
      <textarea name="tinhnang" id="tinhnang" cols="45" rows="5"><?php echo $row_hang['tinhnang'] ?></textarea></td>
    </tr>
    <tr>
      <td>Tính năng khác</td>
      <td><label for="khac"></label>
      <textarea name="khac" id="khac" cols="45" rows="5"><?php echo $row_hang['khac'] ?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_edittt1" id="btn_edittt1" value="Sửa" /></td>
    </tr>
  </table>
</form>
