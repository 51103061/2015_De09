<?php
		$tensp = $_POST['tensp'];
		$mota = $_POST['mota'];
		$tencl_khongdau= $_POST['tencl_khongdau'];
		$idcl= $_POST['idcl'];
		$idloai= $_POST['idloai'];

		$date=new DateTime(); //this returns the current date time
		$result = $date->format('YYYY-mm-dd');
		$krr = explode('-',$result);
		$result1 = implode("",$krr);

		$gia = $_POST['gia'];settype($gia,"int");
		$urlhinh = $_POST['urlhinh'];$urlhinh = substr($urlhinh,32);
   
					if (!$tensp)
						{
						echo "Vui long nhap ten san pham. <a href='javascript: history.go(-1)'>Quay lai</a>";
						exit;
						}

					else if (!$mota)
						{
						echo "Vui long nhap mo ta san pham. <a href='javascript: history.go(-1)'>Quay lai</a>";
						exit;
						}
					else if(!$gia)
						{
						echo "Vui long nhap gia san pham. <a href='javascript: history.go(-1)'>Quay lai</a>";
						exit;
						}						



  $servername = "localhost:3306";
  $username = "root";
  $password = "";
  $dbname = "web_ban_hang";
  $conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
		} 
	$stringsql = "INSERT INTO sanpham VALUES (0,0,'$idloai','$idcl','$tensp','$tensp','$mota','$result','$gia','$urlhinh',0,null,0)";
$sql = $stringsql;
	
if ($conn->query($sql) === TRUE) {
    echo "Them san pham thanh cong";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
