<?php
	$id_youtube = $_GET["id_youtube"];
	settype ($id_youtube,"int");
	$idsp = $_GET["idsp"];
	settype ($idsp,"int");
	$qr = "DELETE FROM sanpham_youtube
			WHERE id_youtube = $id_youtube";
	mysql_query($qr);
	echo "<script>window.location = \"index.php?type=sanpham&t=viedit&idsp=".$idsp."\";</script>";
?>