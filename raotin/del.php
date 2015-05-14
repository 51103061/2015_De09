<?php
	$idsp = $_GET["idsp"];
	settype ($idsp,"int");
	$t = mysql_query("SELECT * FROM sanpham
		WHERE idsp = $idsp");
	$row_t = mysql_fetch_array($t);
	$idcl = $row_t[idcl];
	$idloai = $row_t[idloai];
	$qr = "DELETE FROM sanpham
			WHERE idsp = $idsp";
	mysql_query($qr);
	echo "<script>window.location = \"index.php?type=sanpham&idcl=".$idcl."&idloai=".$idloai."\";</script>";
?>