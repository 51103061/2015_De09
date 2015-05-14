<script language="javascript">  	
	function isCheck()
	{
		var theform = document.form1;	
		
		if(theform.stt.value == "") {
			alert("Vui lòng nhập STT.");
			theform.stt.focus();			
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
	$idsp = $_GET["idsp"];settype($idsp,"int");
?>
<?php
	if (isset($_POST['btn_addpic'])){
		$stt = $_POST['stt'];settype($stt,"int");
		$anhhien = $_POST['anhhien'];settype($anhhien,"int");
		$urlhinh = $_POST['urlhinh'];$urlhinh = substr($urlhinh,30);
		$qr = "INSERT INTO sanpham_hinh
				VALUES (null,'$idsp','$urlhinh','$stt','$anhhien')";
		mysql_query($qr);
		echo "<script>alert('Thêm hình sản phẩm thành công');window.location = \"index.php?type=sanpham&t=pic&idsp=".$idsp."\";</script>";
	}
?>
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
<div id="admin_title">Thêm hình</div>
<form name="form1" method="post" action="" onsubmit="return checkRadios(this);">
  <table width="100%" border="1">
  	<tr>
      <td>Số thứ tự</td>
      <td><label for="stt"></label>
      <input type="text" name="stt" id="stt" /></td>
    </tr>
    <tr>
      <td>Thêm hình ảnh sản phẩm</td>
      <td>
      <label for="urlhinh"></label>
      <input type="text" name="urlhinh" id="urlhinh" />
      <input onclick="BrowseServer('Phu:/','urlhinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" />
      <div id="preview">
           <div id="thumbnails"></div>
        </div>
      </td>
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
      <td><a href="index.php?type=sanpham&t=xem&idsp=<?php echo $idsp; ?>">Xem</a></td>
      <td><input type="submit" name="btn_addpic" id="btn_addpic" value="Thêm"  onclick="return isCheck()"/></td>
    </tr>

  </table>
</form>
