<?php
		
		function mail_utf8($to, $from_user, $from_email, $subject = '(No subject)', $message = '')
		{
		$from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
		$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
		$headers = "From: $from_user <$from_email>\r\n".
		"MIME-Version: 1.0" . "\r\n" .
		"Content-type: text/html; charset=UTF-8" . "\r\n";
		return mail($to, $subject, $message, $headers);
		}


	function kiemtraadmin (){
		if (isset($_SESSION["idUser"])&& $_SESSION["idGroup"]==1){
			return true;
		}
		else {
			return false;
		}
	}
	function Danhsachloaisp(){
		$qr = "SELECT * FROM chungloai
		ORDER BY idCL ASC";
		return mysql_query($qr);
	}
	function Danhsachhangsx(){
		$qr = "SELECT loaisp.*, TenCL FROM loaisp, chungloai
		WHERE chungloai.idCL = loaisp.idCL";
		return mysql_query($qr);
	}
	function Danhsachuser(){
		$qr = "SELECT * FROM users
		ORDER BY idUser ASC";
		return mysql_query($qr);
	}
	function Tensanpham($idSP){
		$qr = "SELECT * FROM sanpham
		WHERE idSP = $idSP";
		return mysql_query($qr);
	}
	function SanPhamTheoChungLoai($idCL){
		$qr = "SELECT   * FROM   sanpham
			   WHERE    idCL = $idCL
			   ORDER BY idSP DESC
			   LIMIT   0,6
			   ";
		return mysql_query($qr);
	};
	function DanhSachChungLoai(){
		$qr = "SELECT   *  FROM   chungloai
				ORDER BY ThuTu ASC
			   ";	
		return mysql_query($qr);
	};
	function DanhSachLoaiSanPham($idCL){
		$qr = "SELECT   *  FROM   loaisp
				WHERE idCL = $idCL
			   ";	
		return mysql_query($qr);
	};
	
	function DanhsachCLtheotenCLkhongdau($TenCL_khongdau){
		$qr = "SELECT * FROM chungloai
		WHERE TenCL_khongdau = '$TenCL_khongdau'
		";
		return mysql_query($qr);
	}
	
	function SanPhamTheo_TenLoaiKhongDau($TenLoaiKhongDau,$idCL){
		$qr = "SELECT   * FROM   sanpham,loaisp
				   WHERE	sanpham.idLoai = loaisp.idLoai 
				   AND sanpham.idCL = $idCL
				   AND TenLoai_KhongDau = '$TenLoaiKhongDau'
				   AND loaisp.idCL = $idCL
				   ";
		return mysql_query($qr);
	};
	function ChiTietSanPhamTheo_TenSPKhongDau($TenSP_KhongDau,$idCL){
		$qr = "SELECT   * FROM   sanpham
				   WHERE	TenSP_KhongDau = '$TenSP_KhongDau'
				   AND idCL = $idCL
				   ";
		return mysql_query($qr);
		
	};
	function timkiem($text){
		$qr = "SELECT * FROM sanpham 
			WHERE TenSP REGEXP '$text'";
		return mysql_query($qr);
		
	};
?>