<?php
	$iduser = $_GET["iduser"];
	settype ($iduser,"int");
	$qr = "DELETE FROM users
			WHERE iduser = $iduser";
	mysql_query($qr);
	echo "<script>window.location = \"index.php?type=user\";</script>";
?>