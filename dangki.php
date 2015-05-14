<?php if(!($_SESSION["view"]==0)){
		$_SESSION["view"]="0";	
	}
?>

<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="blocks/css/style.css" type="text/css" media="screen"/>

<script>


$(function() {
	window.scrollBy(0,630); 
    scrolldelay = setTimeout('pageScroll()',1); 
$( "#ngaysinh" ).datepicker({
      changeMonth: true,
      changeYear: true,
    yearRange: '1950:2005'
	});
$( "#ngaysinh" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
});
</script>
<script language="javascript">
  	
	function isCheck()
	{
		var theform = document.formdk;	
		
		if(theform.hoten.value == "") {
			alert("Vui lòng nhập Họ Tên thật của bạn.");
			theform.hoten.focus();			
			return false;
		}
		
		if(theform.username.value == "") {
			alert("Username phải nhiều hơn 5 ký tự và không chứa khoảng trắng");
			theform.username.focus();			
			return false;
		}
		
		else if(theform.username.value != "")
		{
			var str = theform.username.value;
			if(!(str.indexOf(' ',0) == -1)||(str.length <5))
			{
				alert("Sai định dạng: Username phải nhiều hơn 5 ký tự và không chứa khoảng trắng");
				theform.username.focus();
				return false;
			}
		}
		
		if(theform.password.value == "") {
			alert("Vui lòng nhập password của bạn.");
			theform.password.focus();			
			return false;
		}else if(theform.password.value != "")
		{
			var str = theform.password.value;
			if((str.length <6))
			{
				alert("Sai định dạng: password phải nhiều hơn 6 ký tự");
				theform.password.focus();
				return false;
			}
		}
		
		if(theform.diachi.value == "") {
			alert("Vui lòng nhập địa chỉ của bạn.");
			theform.diachi.focus();			
			return false;
		}
			
		if(theform.sdt.value == "") {
			alert("Vui lòng nhập số điện thoại của bạn.");
			theform.sdt.focus();			
			return false;
		}
		
		if(theform.sdt.value != ""){
			var str = theform.sdt.value;
			if(isNaN(theform.sdt.value)||(str.length <9)||(str.length >14)){
				alert("Vui lòng nhập đúng số điện thoại của bạn.");
				theform.sdt.focus();
				return false;
			}
		}
		if(theform.email.value == "") {
			alert("Vui lòng nhập email của bạn.");
			theform.email.focus();			
			return false;
		}
		
		if(theform.email.value != "")
		{
			var str = theform.email.value;
			if((str.indexOf('@',0) == -1)||(str.indexOf('.') == -1)||(str.length <5))
			{
				alert("Sai định dạng Email. VD: web@domain.vn");
				theform.email.focus();
				return false;
			}
		}
		
		if(theform.ngaysinh.value == "") {
			alert("Vui lòng nhập ngày sinh của bạn.");
			theform.ngaysinh.focus();			
			return false;
		}		
		
	}
	function checkRadios(form) {
	   var btns = form.gioitinh;
	   for (var i=0; el=btns[i]; i++) {
		 if (el.checked) return true;
	   }
	   alert('Vui lòng nhập giới tính của bạn.');
	   return false;
	}
  </script>
<script>
$(document).ready(function (){
	$("#username").blur(function(){
		var ktun = $(this).val();
		if(ktun==null){}else{
		$.get("xuly/kt_un.php",{un:ktun}, function(data){
			$("#ktra_un").val(data);
			if(data == 1){
				$("#tb1").html("Username đã tồn tại");
				$("#tb1").css('background-color','red');	
				$("#tb1").css('color','white');	
			}else{
				$("#tb1").html("");
			}
		});
		}
	});
	$("#email").blur(function(){
		var ktem = $(this).val();
		$.get("xuly/kt_em.php",{em:ktem}, function(data){
			$("#ktra_em").val(data);
			if(data == 1){
				$("#tb2").html("Email đã tồn tại");
				$("#tb2").css('background-color','red');	
				$("#tb2").css('color','white');	
			}else{
				$("#tb2").html("");
			}
		});	
	});
	$("#btn_dangky").click(function(){
		var u = $("#ktra_un").val();
		var e = $("#ktra_em").val();
		if(u==1 || e==1){
			alert("Vui lòng kiểm tra Username/Email");
			return false;	
		}else{
			return true;	
		}
	});
});
<?php
	if(isset($_POST["btn_dangky"])){
		$HoTen = $_POST["hoten"];
		$username = $_POST["username"];
		$password = $_POST["password"];$password = md5($password);
		$diachi = $_POST["diachi"];
		$sdt = $_POST["sdt"];
		$email = $_POST["email"];
		$ngaysinh = $_POST["ngaysinh"];
		$gioitinh = $_POST["gioitinh"]; settype ($gioitinh,"int");
		$NgayDangKy = date('Y-m-d');
		$random = PhatSinhRandomKey();
		$qr = "INSERT INTO users
				VALUES (null,'$HoTen','$username','$password','$diachi','$sdt','$email','$NgayDangKy','0','$ngaysinh','$gioitinh','0','$random','0','0','0')";
		mysql_query($qr);
		header('location:index.php?p=dktc'); 
	}
	
?>
</script>
<div class="tennhomsp">ĐĂNG KÝ THÀNH VIÊN</div>
<div id="dktv">
<form id="formdk" name="formdk" method="post" action=""  onsubmit="return checkRadios(this);">

  <table class="reg" width="700px" align="center">
    <tr width="200px">
      <td width="200px">Họ Tên</td>
      <td width="300px"><label for="hoten"></label>
      <input type="text" name="hoten" id="hoten" /></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="username"></label>
      <input type="text" name="username" id="username" /><span id="tb1" style="margin-left:5px"></span></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input type="password" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>Địa chỉ</td>
      <td><label for="diachi"></label>
      <input type="text" name="diachi" id="diachi" /></td>
    </tr>
    <tr>
      <td>Số điện thoại</td>
      <td><label for="sdt"></label>
      <input type="text" name="sdt" id="sdt" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" /><span id="tb2" style="margin-left:5px"></span></td>
    </tr>
    <tr>
      <td>Ngày sinh</td>
      <td><label for="ngaysinh"></label>
      <input type="text" name="ngaysinh" id="ngaysinh" /></td>
    </tr>
    <tr>
      <td>Giới tính</td>
      <td><p>
        <label>
          <input type="radio" name="gioitinh" value="1" id="gioitinh_0" />
          Nam</label>
        <label>
          <input type="radio" name="gioitinh" value="0" id="gioitinh_1" />
          Nữ</label>
      </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_dangky" id="btn_dangky" value="Đăng ký" onclick="return isCheck()" />
      <input name="ktra_un" type="hidden" id="ktra_un" value="1" />
      <input name="ktra_em" type="hidden" id="ktra_em" value="1" />
      </td>
    </tr>
  </table>
  
  
</form>
</div>
