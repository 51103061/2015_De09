<script language="javascript">  	
	function isCheck()
	{
		var theform = document.form1;	
		
		if(theform.tensp.value == "") {
			alert("Vui lòng nhập Tên sp.");
			theform.tensp.focus();			
			return false;
		}
		if(theform.tensp_khongdau.value == "") {
			alert("Vui lòng nhập Tên ko dấu.");
			theform.tensp_khongdau.focus();			
			return false;
		}
		if(theform.mota.value == "") {
			alert("Vui lòng nhập mô tả sp.");
			theform.mota.focus();			
			return false;
		}
		if(theform.gia.value == "") {
			alert("Vui lòng nhập giá sp.");
			theform.gia.focus();			
			return false;
		}
		if(theform.ngaycapnhat.value == "") {
			alert("Vui lòng nhập Ngày.");
			theform.ngaycapnhat.focus();			
			return false;
		}
		if(theform.idloai.value == "") {
			alert("Vui lòng nhập Tên hãng.");
			theform.idloai.focus();			
			return false;
		}
		if(theform.urlhinh.value == "") {
			alert("Vui lòng nhập hình sp.");
			theform.urlhinh.focus();			
			return false;
		}
		
	}
		function checkRadios(form) {
	   var btns = form.anhhien;
	   for (var i=0; el=btns[i]; i++) {
		 if (el.checked) return true;
	   }
	   alert('Vui lòng nhập ẩn hiện.');
	   return false;
		}
  </script>
<?php
	$idsp = $_GET["idsp"]; settype($idsp,"int");
	$qr = "SELECT * FROM sanpham
		WHERE idsp = $idsp";
	$sp =  mysql_query($qr);
	$row_sp = mysql_fetch_array($sp);
?>
<?php
	if (isset($_POST['btn_editsp'])){
		$tensp = $_POST['tensp'];
		$tensp_khongdau = $_POST['tensp_khongdau'];
		$mota = $_POST['mota'];
		$ngaycapnhat = $_POST['ngaycapnhat'];
		$gia = $_POST['gia'];settype($gia,"int");
		$urlhinh = $_POST['urlhinh'];$urlhinh = substr($urlhinh,32);
		$solanxem = $_POST['solanxem'];settype($solanxem,"int");
		$soluongtonkho = $_POST['soluongtonkho'];settype($soluongtonkho,"int");
		$ghichu = $_POST['ghichu'];
		$idcl = $_POST['idcl'];settype($idcl,"int");
		$idloai = $_POST['idloai'];settype($idloai,"int");
		$anhhien = $_POST['anhhien'];settype($anhhien,"int");
		$qr = "UPDATE sanpham
				SET
					tensp = '$tensp',
					tensp_khongdau = '$tensp_khongdau',
					mota = '$mota',
					ngaycapnhat = '$ngaycapnhat',
					gia = '$gia',
					urlhinh = '$urlhinh',
					solanxem = '$solanxem',
					soluongtonkho = '$soluongtonkho',
					ghichu = '$ghichu',
					idcl = '$idcl',
					idloai = '$idloai',
					anhhien = '$anhhien'
				WHERE idsp = $idsp";
		mysql_query($qr);
		echo "<script>alert('Sửa sản phẩm thành công');window.location = \"index.php?type=sanpham&idcl=".$idcl."&idloai=".$idloai."\";</script>";
	}
?>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<script src="../js/jquery-ui.js"></script>
<script>
$(document).ready(function(){
		$("#idcl").change(function(){
			var id = $(this).val();
			$.post ("sanpham/hangtheoloai.php",{idcl:id}, function(data){
				$("#idloai").html(data);
			});
		});	
	});
$(function() {
$( "#ngaycapnhat" ).datepicker({
      changeMonth: true,
      changeYear: true
	});
$( "#ngaycapnhat" ).datepicker( "option", "dateFormat","yy-mm-dd" );
});
</script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){	
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
}
</script>

<div id="admin_title">Thêm sản phẩm</div>
<form id="form1" name="form1" method="post" action="" onsubmit="return checkRadios(this);">
  <table width="100%">
    <tr>
      <td>Tên sản phẩm</td>
      <td><label for="tensp"></label>
      <input value="<?php echo $row_sp['tensp']; ?>" type="text" name="tensp" id="tensp" /></td>
    </tr>
    <tr>
      <td>Tên không dấu</td>
      <td><label for="tensp_khongdau"></label>
      <input value="<?php echo $row_sp['tensp_khongdau']; ?>" type="text" name="tensp_khongdau" id="tensp_khongdau" /></td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><label for="mota"></label>
      <textarea name="mota" id="mota" cols="45" rows="5"><?php echo $row_sp['mota']; ?></textarea></td>
    </tr>
    <tr>
      <td>Ngày cập nhập</td>
      <td><label for="ngaycapnhat"></label>
      <input value="<?php echo $row_sp[ngaycapnhat]; ?>" type="text" name="ngaycapnhat" id="ngaycapnhat" /></td>
    </tr>
    <tr>
      <td>Loại sản phẩm</td>
      <td><label for="idcl"></label>
        <select name="idcl" id="idcl">
        <?php
			$loai = Danhsachloaisp();
				while ($row_loai = mysql_fetch_array($loai)){
		?>
              <option value="<?php echo $row_loai['idcl']; ?>" <?php if($row_sp['idcl']==$row_loai['idcl']){echo "selected='selected'";}?>><?php echo $row_loai['tencl']; ?></option>
        <?php
			}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Hãng sản xuất</td>
      <td><label for="idloai"></label>
        <select name="idloai" id="idloai">
        <?php 
			$t = $row_sp["idcl"];settype($t,"int");
			$qr = "SELECT * FROM  loaisp
			WHERE idcl = $t";
			$hang =  mysql_query($qr);
					while ($row_hang = mysql_fetch_array($hang)){
		?>
		<option value="<?php echo $row_hang[idloai]; ?>" <?php if($row_sp['idloai']==$row_hang['idloai']){echo "selected='selected'";}?>><?php echo $row_hang['tenloai']; ?></option>
		<?php
			}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Giá</td>
      <td><label for="gia"></label>
      <input value="<?php echo $row_sp['gia']; ?>" type="text" name="gia" id="gia" /></td>
    </tr>
    <tr>
      <td>urlhinh</td>
      <td><label for="urlhinh"></label>
      <input value="<?php echo "/detai/upload/sanpham/hinhchinh/".$row_sp['urlhinh']; ?>" type="text" name="urlhinh" id="urlhinh" />
      <input onclick="BrowseServer('Images:/','urlhinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" />
      <div id="preview">
           <div id="thumbnails"></div>
        </div>   

      </td>
    </tr>
    <tr>
      <td>Số lần xem</td>
      <td><label for="solanxem"></label>
      <input value="<?php echo $row_sp['solanxem']; ?>" type="text" name="solanxem" id="solanxem" /></td>
    </tr>
    <tr>
      <td>Số lượng tồn kho</td>
      <td><label for="soluongtonkho"></label>
      <input value="<?php echo $row_sp['soluongtonkho']; ?>" type="text" name="soluongtonkho" id="soluongtonkho" /></td>
    </tr>
    <tr>
      <td>Ghi chú</td>
      <td><label for="ghichu"></label>
      <input value="<?php echo $row_sp['ghichu']; ?>" type="text" name="ghichu" id="ghichu" /></td>
    </tr>
    <tr>
      <td>Ẩn Hiện</td>
      <td><p>
        <label>
          <input type="radio" name="anhhien" value="1" id="anhhien_0" <?php if($row_sp['anhhien']==1){echo "checked='checked'";}?>/>
          Hiện</label>
        <br />
        <label>
          <input type="radio" name="anhhien" value="0" id="anhhien_1" <?php if($row_sp['anhhien']==0){echo "checked='checked'";}?>/>
          Ẩn</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_editsp" id="btn_editsp" value="Sửa sp"  onclick="return isCheck()"/></td>
    </tr>
  </table>
</form>
