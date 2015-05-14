<?php
	mysql_connect("localhost","root","");
	mysql_select_db("web_ban_hang");
	mysql_query("SET NAMES 'utf8'");
?>


<?php
	$idcl = $_POST["idcl"];
	$qr = "SELECT * FROM  loaisp
			WHERE idcl = $idcl";
			$sp =  mysql_query($qr);
		while ($row_sp = mysql_fetch_array($sp)){
?>
	<option value="<?php echo $row_sp['idloai']; ?>"><?php echo $row_sp['tenloai']; ?></option>
<?php
	}
?>
	