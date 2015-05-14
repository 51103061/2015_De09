<?php $idsp=$_GET["idsp"];settype($idsp,"int");
	$qr = "SELECT * FROM sanpham_thuoctinh
		WHERE idsp = $idsp";
		$hang =  mysql_query($qr);
	$row_hang = mysql_fetch_array($hang)
 ?>
 <?php
	if (isset($_POST['btn_suatt'])){
		$tinh_nang_noi_bat = $_POST['tinh_nang_noi_bat'];
		$may_anh = $_POST['may_anh'];
		$dac_tinh_may_anh = $_POST['dac_tinh_may_anh'];
		$may_phu_anh = $_POST['may_phu_anh'];settype($may_phu_anh,"int");
		$video_call = $_POST['video_call'];settype($video_call,"int");
		$quay_phim = $_POST['quay_phim'];
		$xem_phim = $_POST['xem_phim'];
		$nghe_nhac = $_POST['nghe_nhac'];
		$fm_radio = $_POST['fm_radio'];settype($fm_radio,"int");
		$xem_tivi = $_POST['xem_tivi'];
		$ghi_am = $_POST['ghi_am'];settype($ghi_am,"int");
		$ghi_am_cuoc_goi = $_POST['ghi_am_cuoc_goi'];settype($ghi_am_cuoc_goi,"int");
		$ghi_am_fm = $_POST['ghi_am_fm'];settype($ghi_am_fm,"int");
		$java = $_POST['java'];settype($java,"int");
		$tro_choi = $_POST['tro_choi'];
		$ket_noi_tv = $_POST['ket_noi_tv'];settype($ket_noi_tv,"int");
		$ung_dung_van_phong = $_POST['ung_dung_van_phong'];
		$ung_dung_khac = $_POST['ung_dung_khac'];
		$nhacchuong_loai = $_POST['nhacchuong_loai'];
		$nhacchuong_tai_nhac = $_POST['nhacchuong_tai_nhac'];settype($nhacchuong_tai_nhac,"int");
		$nhacchuong_loa_ngoai = $_POST['nhacchuong_loa_ngoai'];settype($nhacchuong_loa_ngoai,"int");
		$nhacchuong_bao_rung = $_POST['nhacchuong_bao_rung'];settype($nhacchuong_bao_rung,"int");
		$nhacchuong_jack_tai_nghe = $_POST['nhacchuong_jack_tai_nghe'];
		$bonho_bo_nho_trong = $_POST['bonho_bo_nho_trong'];
		$bonho_ram = $_POST['bonho_ram'];
		$bonho_vi_xu_ly_cpu = $_POST['bonho_vi_xu_ly_cpu'];
		$bonho_the_nho_ngoai = $_POST['bonho_the_nho_ngoai'];
		$bonho_ho_tro_the_toi_da = $_POST['bonho_ho_tro_the_toi_da'];
		$danh_ba = $_POST['danh_ba'];
		$tin_nhan = $_POST['tin_nhan'];
		$email = $_POST['email'];settype($email,"int");
		$qr = "UPDATE sanpham_thuoctinh
				SET
					tinh_nang_noi_bat = '$tinh_nang_noi_bat',
					may_anh = '$may_anh',
					dac_tinh_may_anh = '$dac_tinh_may_anh',
					may_phu_anh = '$may_phu_anh',
					video_call = '$video_call',
					quay_phim = '$quay_phim',
					xem_phim = '$xem_phim',
					nghe_nhac = '$nghe_nhac',
					fm_radio = '$fm_radio',
					xem_tivi = '$xem_tivi',
					ghi_am = '$ghi_am',
					ghi_am_cuoc_goi = '$ghi_am_cuoc_goi',
					ghi_am_fm = '$ghi_am_fm',
					java = '$java',
					tro_choi = '$tro_choi',
					ket_noi_tv = '$ket_noi_tv',
					ung_dung_van_phong = '$ung_dung_van_phong',
					ung_dung_khac = '$ung_dung_khac',
					nhacchuong_loai = '$nhacchuong_loai',
					nhacchuong_tai_nhac = '$nhacchuong_tai_nhac',
					nhacchuong_loa_ngoai = '$nhacchuong_loa_ngoai',
					nhacchuong_bao_rung = '$nhacchuong_bao_rung',
					nhacchuong_jack_tai_nghe = '$nhacchuong_jack_tai_nghe',
					bonho_bo_nho_trong = '$bonho_bo_nho_trong',
					bonho_ram = '$bonho_ram',
					bonho_vi_xu_ly_cpu = '$bonho_vi_xu_ly_cpu',
					bonho_the_nho_ngoai = '$bonho_the_nho_ngoai',
					bonho_ho_tro_the_toi_da = '$bonho_ho_tro_the_toi_da',
					danh_ba = '$danh_ba',
					tin_nhan = '$tin_nhan',
					email = '$email'
				WHERE idsp = $idsp";
		mysql_query($qr);
		echo "<script>alert('Sửa thuộc tính điện thoại thành công');window.location = \"index.php?type=sanpham&t=thuoctinh&idsp=".$idsp."&idcl=".$idcl."\";</script>";
	}
?>
 
<div id="admin_title">Sửa thuộc tính điện thoại</div>
<style>
#thuoctinh tr td padding:3px}
</style>
<form name="form1" method="post" action="">
<table id="thuoctinh" width="100%" border="1"bordercolor="#CCCCCC" cellspacing="0" cellpadding="0"> 
  <tr> 
    <td width="130">Tính năng nổi bật</td> 
    <td colspan="2"><label for="tinh_nang_noi_bat"></label>
      <textarea name="tinh_nang_noi_bat" id="tinh_nang_noi_bat" cols="45" rows="5"><?php echo $row_hang['tinh_nang_noi_bat'] ?></textarea></td> 
  </tr> 
  <tr> 
    <td rowspan="9" align="left" valign="middle">Giải trí</td> 
    <td width="150">Máy ảnh</td> 
    
    <td><label for="may_anh"></label>
      <input value="<?php echo $row_hang['may_anh'] ?>" type="text"name="may_anh"id="may_anh"></td> 
  </tr> 
  <tr> 
    <td>Đặc tính máy ảnh</td> 
    <td><label for="dac_tinh_may_anh"></label>
      <input value="<?php echo $row_hang['dac_tinh_may_anh'] ?>" type="text"name="dac_tinh_may_anh"id="dac_tinh_may_anh"></td> 
  </tr> 
  <tr> 
    <td>Máy ảnh phụ</td> 
    <td><label for="may_phu_anh"></label>
      <input value="<?php echo $row_hang['may_phu_anh'] ?>" type="text"name="may_phu_anh"id="may_phu_anh"></td> 
  </tr> 
  <tr> 
    <td>Videocall</td> 
    <td><label for="video_call"></label>
      <input value="<?php echo $row_hang['video_call'] ?>" type="text"name="video_call"id="video_call"></td> 
  </tr> 
  <tr> 
    <td>Quay phim</td> 
    <td><label for="quay_phim"></label>
      <input value="<?php echo $row_hang['quay_phim'] ?>" type="text"name="quay_phim"id="quay_phim"></td> 
  </tr> 
  <tr> 
    <td>Xem phim</td> 
    <td><label for="xem_phim"></label>
      <input value="<?php echo $row_hang['xem_phim'] ?>" type="text"name="xem_phim"id="xem_phim"></td> 
  </tr> 
  <tr> 
    <td>Nghe nhạc</td> 
    <td><label for="nghe_nhac"></label>
      <input value="<?php echo $row_hang['nghe_nhac'] ?>" type="text"name="nghe_nhac"id="nghe_nhac"></td> 
  </tr> 
  <tr> 
    <td>FM radio</td> 
    <td><label for="fm_radio"></label>
      <input value="<?php echo $row_hang['fm_radio'] ?>" type="text"name="fm_radio"id="fm_radio"></td> 
  </tr> 
  <tr> 
    <td>Xem Tivi</td> 
    <td><label for="xem_tivi"></label>
      <input value="<?php echo $row_hang['xem_tivi'] ?>" type="text"name="xem_tivi"id="xem_tivi"></td> 
  </tr> 
  <tr> 
    <td rowspan="8">Ứng dụng &amp; Trò chơi</td> 
    <td>Ghi âm</td> 
    <td><label for="ghi_am"></label>
      <input value="<?php echo $row_hang['ghi_am'] ?>" type="text"name="ghi_am"id="ghi_am"></td> 
  </tr> 
  <tr> 
    <td>Ghi âm cuộc gọi</td> 
    <td><label for="ghi_am_cuoc_goi"></label>
      <input value="<?php echo $row_hang['ghi_am_cuoc_goi'] ?>" type="text"name="ghi_am_cuoc_goi"id="ghi_am_cuoc_goi"></td> 
  </tr> 
  <tr> 
    <td>Ghi âm FM</td> 
    <td><label for="ghi_am_fm"></label>
      <input value="<?php echo $row_hang['ghi_am_fm'] ?>" type="text"name="ghi_am_fm"id="ghi_am_fm"></td> 
  </tr> 
  <tr> 
    <td>Java</td> 
    <td><label for="java"></label>
      <input value="<?php echo $row_hang['java'] ?>" type="text"name="java"id="java"></td> 
  </tr> 
  <tr> 
    <td>Trò chơi</td> 
    <td><label for="tro_choi"></label>
      <input value="<?php echo $row_hang['tro_choi'] ?>" type="text"name="tro_choi"id="tro_choi"></td> 
  </tr> 
  <tr> 
    <td>Kết nối Tivi</td> 
    <td><label for="ket_noi_tv"></label>
      <input value="<?php echo $row_hang['ket_noi_tv'] ?>" type="text"name="ket_noi_tv"id="ket_noi_tv"></td> 
  </tr> 
  <tr> 
    <td>Ứng dụng văn phòng</td> 
    <td><label for="ung_dung_van_phong"></label>
      <input value="<?php echo $row_hang['ung_dung_van_phong'] ?>" type="text"name="ung_dung_van_phong"id="ung_dung_van_phong"></td> 
  </tr> 
  <tr> 
    <td>Ứng dụng khác</td> 
    <td><label for="ung_dung_khac"></label>
      <input value="<?php echo $row_hang['ung_dung_khac'] ?>" type="text"name="ung_dung_khac"id="ung_dung_khac"></td> 
  </tr> 
  <tr> 
    <td rowspan="5">Nhạc chuông</td> 
    <td>Loại</td> 
    <td><label for="nhacchuong_loai"></label>
      <input value="<?php echo $row_hang['nhacchuong_loai'] ?>" type="text"name="nhacchuong_loai"id="nhacchuong_loai"></td> 
  </tr> 
  <tr> 
    <td>Tải nhạc</td> 
    <td><label for="nhacchuong_tai_nhac"></label>
      <input value="<?php echo $row_hang['nhacchuong_tai_nhac'] ?>" type="text"name="nhacchuong_tai_nhac"id="nhacchuong_tai_nhac"></td> 
  </tr> 
  <tr> 
    <td>Loa ngoài</td> 
    <td><label for="nhacchuong_loa_ngoai"></label>
      <input value="<?php echo $row_hang['nhacchuong_loa_ngoai'] ?>" type="text"name="nhacchuong_loa_ngoai"id="nhacchuong_loa_ngoai"></td> 
  </tr> 
  <tr> 
    <td>Báo rung</td> 
    <td><label for="nhacchuong_bao_rung"></label>
      <input value="<?php echo $row_hang['nhacchuong_bao_rung'] ?>" type="text"name="nhacchuong_bao_rung"id="nhacchuong_bao_rung"></td> 
  </tr> 
  <tr> 
    <td>Jack tai nghe</td> 
    <td><label for="nhacchuong_jack_tai_nghe"></label>
      <input value="<?php echo $row_hang['nhacchuong_jack_tai_nghe'] ?>" type="text"name="nhacchuong_jack_tai_nghe"id="nhacchuong_jack_tai_nghe"></td> 
  </tr> 
  <tr> 
    <td rowspan="5">Bộ nhớ</td> 
    <td>Bộ nhớ trong</td> 
    <td><label for="bonho_bo_nho_trong"></label>
      <input value="<?php echo $row_hang['bonho_bo_nho_trong'] ?>" type="text"name="bonho_bo_nho_trong"id="bonho_bo_nho_trong"></td> 
  </tr> 
  <tr> 
    <td>RAM</td> 
    <td><label for="bonho_ram"></label>
      <input value="<?php echo $row_hang['bonho_ram'] ?>" type="text"name="bonho_ram"id="bonho_ram"></td> 
  </tr> 
  <tr> 
    <td>Vi xử lý CPU</td> 
    <td><label for="bonho_vi_xu_ly_cpu"></label>
      <input value="<?php echo $row_hang['bonho_vi_xu_ly_cpu'] ?>" type="text"name="bonho_vi_xu_ly_cpu"id="bonho_vi_xu_ly_cpu"></td> 
  </tr> 
  <tr> 
    <td>Thẻ nhớ ngoài</td> 
    <td><label for="bonho_the_nho_ngoai"></label>
      <input value="<?php echo $row_hang['bonho_the_nho_ngoai'] ?>" type="text"name="bonho_the_nho_ngoai"id="bonho_the_nho_ngoai"></td> 
  </tr> 
  <tr> 
    <td>Hỗ trợ thẻ tối đa</td> 
    <td><label for="bonho_ho_tro_the_toi_da"></label>
      <input value="<?php echo $row_hang['bonho_ho_tro_the_toi_da'] ?>" type="text"name="bonho_ho_tro_the_toi_da"id="bonho_ho_tro_the_toi_da"></td> 
  </tr> 
  <tr> 
    <td rowspan="3">Danh bạ, tin nhắn, Email</td> 
    <td>Danh bạ</td> 
    <td><label for="danh_ba"></label>
      <input value="<?php echo $row_hang['danh_ba'] ?>" type="text"name="danh_ba"id="danh_ba"></td> 
  </tr> 
  <tr> 
    <td>Tin nhắn</td> 
    <td><label for="tin_nhan"></label>
      <input value="<?php echo $row_hang['tin_nhan'] ?>" type="text"name="tin_nhan"id="tin_nhan"></td> 
  </tr> 
  <tr> 
    <td>Email</td> 
    <td><label for="email"></label>
      <input value="<?php echo $row_hang['email'] ?>" type="text"name="email"id="email"></td> 
  </tr> 
  <tr>
  	<td>&nbsp;</td>
    <td><input type="submit" name="btn_suatt" id="btn_suatt" value="Sửa"></td>
    <td>&nbsp;</td>
  </tr>
</table> 

</form>
