

<form action="addnew.php" method = "post"" >
Tên sản phẩm: <br>
<input type="text" size = "40" name="tensp" id="tensp" placeholder="Nhập tên sản phẩm" ><br><br>
Mô tả: <br>
<input type="textarea" size = "40" name="mota" id="mota" placeholder="Nhập mô tả sản phẩm" ><br><br>
Giá:    <br>
<input type="number" size = "40" name="gia" id="gia" placeholder="Nhập giá sản phẩm"><br><br>

<input type="hidden" value="" name="idcl">
<input type="hidden" value="" name="idloai">

Loại sản phẩm:<br>

<?php
mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("web_ban_hang") or die(mysql_error());

$query = "SELECT tencl_khongdau FROM chungloai ORDER BY idcl DESC LIMIT  0,100";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>
<select name="tencl_khongdau" id="tencl_khongdau" onchange="calc(this.form);">
<?php 
while ($row = mysql_fetch_array($result))
{
echo "<option value=".$row['tencl_khongdau'].">".$row['tencl_khongdau']."</option>";

}
?>  
    
</select>
<br><br>

Hãng sản xuất<br>
<?php
mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("web_ban_hang") or die(mysql_error());

$query = "SELECT tenloai_khongdau FROM loaisp ORDER BY idloai DESC LIMIT  0,100";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");
?>

<select name="tenloai_khongdau" id="tenloai_khongdau" onchange="calc_idloai(this.form);">
<?php 
while ($row = mysql_fetch_array($result))
{
    echo "<option value=".$row['tenloai_khongdau'].">".$row['tenloai_khongdau']."</option>";
}
?>        
</select><br><br>
Ngày cập nhât:<br>
<?php
$dt = new DateTime();
echo $dt->format('Y-m-d');
?>
<br><br>
 <script  type="text/javascript">
// populate the years select list

var codeYear = "";
codeYear += "<select id='year1' onchange=\"SelDate('day1','month1','year1');\">";
codeYear += "<option value='--'>- Year -</option>"	
curyear = new Date().getFullYear()		 
for (var i = curyear; i >= 1900; i--) {
codeYear += "<option value='" + i + "' >" + i + "</option>";
}			   
codeYear += "</select>";
document.write(codeYear);


function SelDate(d,m,y) {
var dy=document.getElementById(d);
var mth=document.getElementById(m);
var yr=document.getElementById(y);
dy.options.length=1;
if (mth.value && yr.value) {
var days=new Date(yr.value,mth.value,1,-1).getDate(); // the first day of the next month minus 1 hour
for (var i=1; i<=days; i++){
dy.options[i] = new Option(i,i,true,true);
}
dy.selectedIndex = 0;
}
}

</script>
<select id="month1" onchange="SelDate('day1','month1','year1');">
<option value="na">Month</option>
<option value="1">Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>

<select id="day1" >
<option value="na">Day</option>
</select>
<br><br>

Urlhinh:
      <td><label for="urlhinh"></label>
      <input type="text" name="urlhinh" id="urlhinh" />
      <input onclick="BrowseServer('Images:/','urlhinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" />
      <div id="preview">
           <div id="thumbnails"></div>
        </div> 
<br>
<input type = "submit" value = "Rao tin" onClick="return isCheck()">  
<input type = "reset" value = "Nhập lại">

</form>

<link rel="stylesheet" href="/css/jquery-ui.css" />
<script src="../js/jquery-ui.js"></script>

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
<script type="text/javascript">
function calc(form){        

    var calc = document.getElementById('tencl_khongdau');
    tencl_khongdau = calc.options[calc.selectedIndex].value;
	if (tencl_khongdau=="dien-thoai-di-dong") {
		var result = 1; 
	}
	if (tencl_khongdau=="laptop") {
	    var result = 2;
	}
	if (tencl_khongdau=="May-Tinh-Bang") {
	    var result = 3;
	}
	
	form.idcl.value = result  
}
</script>

<script type="text/javascript">
function calc_idloai(form){        

    var calc_idloai = document.getElementById('tenloai_khongdau');
    tenloai_khongdau = calc_idloai.options[calc_idloai.selectedIndex].value;


		if (tenloai_khongdau=="Nokia") {
		var result = 37; 
		}
		if (tenloai_khongdau=="LG") {
	    var result = 38;
		}
		if (tenloai_khongdau=="Samsung") {
	    var result = 39;
		}
		if (tenloai_khongdau=="Sony_Ericsson") {
	    var result = 40;
		}	
		if (tenloai_khongdau=="HTC") {
	    var result = 41;
		}	
		if (tenloai_khongdau=="Motorola") {
	    var result = 42;
		}	
		if (tenloai_khongdau=="Acer") {
	    var result = 43;
		}	
		if (tenloai_khongdau=="BlackBerry") {
	    var result = 44;
		}	
		if (tenloai_khongdau=="Dell") {
	    var result = 45;
		}	
		if (tenloai_khongdau=="Cayon") {
	    var result = 46;
		}	
		if (tenloai_khongdau=="Apple") {
	    var result = 47;
		}	
		if (tenloai_khongdau=="Vertu") {
	    var result = 48;
		}	
		if (tenloai_khongdau=="Mobell") {
	    var result = 49;
		}	
	
		if (tenloai_khongdau=="Lenovo") {
	    var result = 50;
		}	
		if (tenloai_khongdau=="Asus") {
	    var result = 51;
		}	
		if (tenloai_khongdau=="Sony-Vaio") {
	    var result = 52;
		}	

		if (tenloai_khongdau=="Apple") {
	    var result = 53;
		}	
		if (tenloai_khongdau=="Samsung") {
	    var result = 54;
		}	
		if (tenloai_khongdau=="Acer") {
	    var result = 55;
		}

	form.idloai.value = result 
	
}
</script>



