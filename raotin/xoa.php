<?php
	$id_hinh = $_GET["id_hinh"];
	settype ($id_hinh,"int");
	$idsp = $_GET["idsp"];
	settype ($idsp,"int");
	$qr = "DELETE FROM sanpham_hinh
			WHERE id_hinh = $id_hinh";
	mysql_query($qr);
	echo "<script>window.location = \"index.php?type=sanpham&t=xem&idsp=".$idsp."\";</script>";
?>