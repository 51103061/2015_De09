<div id="admin_title">Quản lý user</div>
<table width="100%" border="1">
  <tr class="tit">
  	<td>Mã</td>
    <td>Họ tên</td>
    <td>username</td>
    <td>Số điện thoại</td>
    <td>email</td>
    <td>Địa chỉ</td>
    <td align="center">-</td>
  </tr>
  <?php
		$loai = Danhsachuser();
			while ($row_loai = mysql_fetch_array($loai)){
			ob_start();
	?>
  <tr>
  	<td>{iduser}</td>
    <td>{hoten}</td>
    <td>{username}</td>
    <td>{dienthoai}</td>
    <td>{email}</td>
    <td>{diachi}</td>
    <td style="text-align:center"><a onclick="return confirm('ban muon xoa ko?')" href="index.php?type=user&t=del&iduser={iduser}">Xóa</a></td>
  </tr>
  <?php
		$s = ob_get_clean();
		$s = str_replace("{iduser}",$row_loai['iduser'],$s);
		$s = str_replace("{hoten}",$row_loai['hoten'],$s);
		$s = str_replace("{username}",$row_loai['username'],$s);
		$s = str_replace("{dienthoai}",$row_loai['dienthoai'],$s);
		$s = str_replace("{email}",$row_loai['email'],$s);
		$s = str_replace("{diachi}",$row_loai['diachi'],$s);
		echo $s;
		}
	?>
</table>