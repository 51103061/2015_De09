
<script language="javascript">  	
	function isCheck()
	{
		var theform = document.form1;	
		
		if(theform.tensp.value == "") {
			alert("Vui lòng nhập Tên sp.");
			theform.tensp.focus();			
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
	if (isset($_POST['btn_addsp'])){
		$tensp = $_POST['tensp'];
		$tensp_khongdau = changeTitle($tensp);
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
		$qr = "INSERT INTO sanpham
				VALUES (null,'$idloai','$idcl','$tensp','$tensp_khongdau','$mota','$ngaycapnhat','$gia','$urlhinh',null,'$solanxem','$soluongtonkho','$ghichu',0,'$anhhien')";
		mysql_query($qr);
		$idsp = mysql_insert_id();
		if($idcl==1){
			mysql_query("
				INSERT INTO sanpham_thuoctinh
				VALUES (
				NULL , '$idsp', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'
				), (
				'0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'
				);
			");	
		}else{
				mysql_query("
				INSERT INTO sanpham_thuoctinh1
				VALUES (
				NULL , '$idsp', '0', '0','0'
				)");	
		}
		echo "<script>alert('Thêm sản phẩm thành công');window.location = \"index.php?type=sanpham&idcl=".$idcl."&idloai=".$idloai."\";</script>";
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
$( "#ngaycapnhat" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
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
      <input type="text" name="tensp" id="tensp" /></td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><label for="mota"></label>
      <textarea name="mota" id="mota" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Ngày cập nhập</td>
      <td><label for="ngaycapnhat"></label>
      <input type="text" name="ngaycapnhat" id="ngaycapnhat" /></td>
    </tr>
    <tr>
      <td>Loại sản phẩm</td>
      <td><label for="idcl"></label>
        <select name="idcl" id="idcl">
        <?php
			$loai = Danhsachloaisp();
				while ($row_loai = mysql_fetch_array($loai)){
		?>
              <option value="<?php echo $row_loai['idcl']; ?>"><?php echo $row_loai['tencl']; ?></option>
        <?php
			}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Hãng sản xuất</td>
      <td><label for="idloai"></label>
        <select name="idloai" id="idloai">
      </select></td>
    </tr>
    <tr>
      <td>Giá</td>
      <td><label for="gia"></label>
      <input type="text" name="gia" id="gia" /></td>
    </tr>
    <tr>
      <td>urlhinh</td>
      <td><label for="urlhinh"></label>
      <input type="text" name="urlhinh" id="urlhinh" />
      <input onclick="BrowseServer('Images:/','urlhinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" />
      <div id="preview">
           <div id="thumbnails"></div>
        </div>   

      </td>
    </tr>
    <tr>
      <td>Số lần xem</td>
      <td><label for="solanxem"></label>
      <input type="text" name="solanxem" id="solanxem" /></td>
    </tr>
    <tr>
      <td>Số lượng tồn kho</td>
      <td><label for="soluongtonkho"></label>
      <input type="text" name="soluongtonkho" id="soluongtonkho" /></td>
    </tr>
    <tr>
      <td>Ghi chú</td>
      <td><label for="ghichu"></label>
      <input type="text" name="ghichu" id="ghichu" /></td>
    </tr>
    <tr>
      <td>Ẩn Hiện</td>
      <td><p>
        <label>
          <input type="radio" name="anhhien" value="1" id="anhhien_0" />
          Hiện</label>
        <br />
        <label>
          <input type="radio" name="anhhien" value="0" id="anhhien_1" />
          Ẩn</label>
        <br />
      </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_addsp" id="btn_addsp" value="Thêm"  onclick="return isCheck()"/></td>
    </tr>
  </table>
</form>
