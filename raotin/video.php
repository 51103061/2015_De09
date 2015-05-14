<script language="javascript">  	
	function isCheck()
	{
		var theform = document.form1;	
		
		if(theform.value.value == "") {
			alert("Vui lòng nhập giá trị.");
			theform.value.focus();			
			return false;
		}
		if(theform.mota.value == "") {
			alert("Vui lòng nhập mota.");
			theform.mota.focus();			
			return false;
		}
		if(theform.stt.value == "") {
			alert("Vui lòng nhập hình stt.");
			theform.stt.focus();			
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
		$value = $_POST['value'];
		$stt = $_POST['stt'];settype($stt,"int");
		$anhhien = $_POST['anhhien'];settype($anhhien,"int");
		$mota = $_POST['mota'];
		$qr = "INSERT INTO sanpham_youtube
				VALUES (null,'$idsp','$value','$mota','$stt','$anhhien')";
		mysql_query($qr);
		echo "<script>alert('Thêm hình sản phẩm thành công');window.location = \"index.php?type=sanpham&t=video&idsp=".$idsp."\";</script>";
	}
?>
<div id="admin_title">Thêm video</div>
<form name="form1" method="post" action="" onsubmit="return checkRadios(this);">
  <table width="100%" border="1">
  	<tr>
      <td>Giá trị(*)</td>
      <td>
        <label for="value"></label>
      <input type="text" name="value" id="value"></td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td>
        <label for="mota"></label>
      <input type="text" name="mota" id="mota"></td>
    </tr>
    <tr>
    	<td>Thứ tự</td>
        <td><label for="stt"></label>
        <input type="text" name="stt" id="stt"></td>
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
      <td><a href="index.php?type=sanpham&t=viedit&idsp=<?php echo $idsp; ?>">Xem</a></td>
      <td><input type="submit" name="btn_addpic" id="btn_addpic" value="Thêm"  onclick="return isCheck()"/></td>
    </tr>

  </table>
</form>
lưu ý: giá trị(*) là mã video trên youtube. ví dụ như: UBc2O0cUH4g
