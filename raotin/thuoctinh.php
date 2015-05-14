<?php $idsp=$_GET["idsp"];settype($idsp,"int");
		$idcl=$_GET["idcl"];settype($idcl,"int");
 ?>
<div id="admin_title">Thuộc tính sản phẩm</div>
<?php
	$thuoctinh = mysql_query("SELECT   * FROM   sanpham_thuoctinh
					  	WHERE	idsp = $idsp
					   ");
	$row_thuoctinh = mysql_fetch_array($thuoctinh)
?>
<style>
#thuoctinh tr td{ padding:3px}
</style>
<table id="thuoctinh" width="100%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="0"> 
  <tr> 
    <td width="130">Tính năng nổi bật</td> 
    <td colspan="2"><?php echo $row_thuoctinh['tinh_nang_noi_bat']; ?></td> 
  </tr> 
  <tr> 
    <td rowspan="9" align="left" valign="middle">Giải trí</td> 
    <td width="150">Máy ảnh</td> 
    <td><?php echo $row_thuoctinh['may_anh']; ?></td> 
  </tr> 
  <tr> 
    <td>Đặc tính máy ảnh</td> 
    <td><?php echo $row_thuoctinh['dac_tinh_may_anh']; ?></td> 
  </tr> 
  <tr> 
    <td>Máy ảnh phụ</td> 
    <td><?php echo $row_thuoctinh['may_phu_anh']; ?></td> 
  </tr> 
  <tr> 
    <td>Videocall</td> 
    <td><?php echo $row_thuoctinh['video_call']; ?></td> 
  </tr> 
  <tr> 
    <td>Quay phim</td> 
    <td><?php echo $row_thuoctinh['quay_phim']; ?></td> 
  </tr> 
  <tr> 
    <td>Xem phim</td> 
    <td><?php echo $row_thuoctinh['xem_phim']; ?></td> 
  </tr> 
  <tr> 
    <td>Nghe nhạc</td> 
    <td><?php echo $row_thuoctinh['nghe_nhac']; ?></td> 
  </tr> 
  <tr> 
    <td>FM radio</td> 
    <td><?php echo $row_thuoctinh['fm_radio']; ?></td> 
  </tr> 
  <tr> 
    <td>Xem Tivi</td> 
    <td><?php echo $row_thuoctinh['xem_tivi']; ?></td> 
  </tr> 
  <tr> 
    <td rowspan="8">Ứng dụng &amp; Trò chơi</td> 
    <td>Ghi âm</td> 
    <td><?php echo $row_thuoctinh['ghi_am']; ?></td> 
  </tr> 
  <tr> 
    <td>Ghi âm cuộc gọi</td> 
    <td><?php echo $row_thuoctinh['ghi_am_cuoc_goi']; ?></td> 
  </tr> 
  <tr> 
    <td>Ghi âm FM</td> 
    <td><?php echo $row_thuoctinh['ghi_am_fm']; ?></td> 
  </tr> 
  <tr> 
    <td>Java</td> 
    <td><?php echo $row_thuoctinh['java']; ?></td> 
  </tr> 
  <tr> 
    <td>Trò chơi</td> 
    <td><?php echo $row_thuoctinh['tro_choi']; ?></td> 
  </tr> 
  <tr> 
    <td>Kết nối Tivi</td> 
    <td><?php echo $row_thuoctinh['ket_noi_tv']; ?></td> 
  </tr> 
  <tr> 
    <td>Ứng dụng văn phòng</td> 
    <td><?php echo $row_thuoctinh['ung_dung_van_phong']; ?></td> 
  </tr> 
  <tr> 
    <td>Ứng dụng khác</td> 
    <td><?php echo $row_thuoctinh['ung_dung_khac']; ?></td> 
  </tr> 
  <tr> 
    <td rowspan="5">Nhạc chuông</td> 
    <td>Loại</td> 
    <td><?php echo $row_thuoctinh['nhacchuong_loai']; ?></td> 
  </tr> 
  <tr> 
    <td>Tải nhạc</td> 
    <td><?php echo $row_thuoctinh['nhacchuong_tai_nhac']; ?></td> 
  </tr> 
  <tr> 
    <td>Loa ngoài</td> 
    <td><?php echo $row_thuoctinh['nhacchuong_loa_ngoai']; ?></td> 
  </tr> 
  <tr> 
    <td>Báo rung</td> 
    <td><?php echo $row_thuoctinh['nhacchuong_bao_rung']; ?></td> 
  </tr> 
  <tr> 
    <td>Jack tai nghe</td> 
    <td><?php echo $row_thuoctinh['nhacchuong_jack_tai_nghe']; ?></td> 
  </tr> 
  <tr> 
    <td rowspan="5">Bộ nhớ</td> 
    <td>Bộ nhớ trong</td> 
    <td><?php echo $row_thuoctinh['bonho_bo_nho_trong']; ?></td> 
  </tr> 
  <tr> 
    <td>RAM</td> 
    <td><?php echo $row_thuoctinh['bonho_ram']; ?></td> 
  </tr> 
  <tr> 
    <td>Vi xử lý CPU</td> 
    <td><?php echo $row_thuoctinh['bonho_vi_xu_ly_cpu']; ?></td> 
  </tr> 
  <tr> 
    <td>Thẻ nhớ ngoài</td> 
    <td><?php echo $row_thuoctinh['bonho_the_nho_ngoai']; ?></td> 
  </tr> 
  <tr> 
    <td>Hỗ trợ thẻ tối đa</td> 
    <td><?php echo $row_thuoctinh['bonho_ho_tro_the_toi_da']; ?></td> 
  </tr> 
  <tr> 
    <td rowspan="3">Danh bạ, tin nhắn, Email</td> 
    <td>Danh bạ</td> 
    <td><?php echo $row_thuoctinh['danh_ba']; ?></td> 
  </tr> 
  <tr> 
    <td>Tin nhắn</td> 
    <td><?php echo $row_thuoctinh['tin_nhan']; ?></td> 
  </tr> 
  <tr> 
    <td>Email</td> 
    <td><?php echo $row_thuoctinh['email']; ?></td> 
  </tr> 
  <tr>
  	<td colspan="3">
	<?php 
		if($idcl==1){$tt="suatt";}
		else{$tt="suatt1";}
	?>
    <a href="index.php?type=sanpham&t=<?php echo $tt;?>&idsp=<?php echo $idsp;?>&idcl=<?php echo $idcl;?>">Sửa</a>
    </td>
  </tr>
</table> 
