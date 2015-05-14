<div id="admin_title">Sản phẩm</div>
<form id="form1" name="form1" method="post" action="">
  <table width="100%">
    <tr>
    	<td width="10%">Chọn loại SP:</td>
      <td width="85%">
      <?php
	  	$loai = Danhsachloaisp();
		while ($row_loai = mysql_fetch_array($loai)){
	?>
      <div class="loai"><a href="index.php?type=sanpham&idcl=<?php echo $row_loai['idcl']; ?>"><?php echo $row_loai['tencl']; ?></a></div>
      <?php
		}
	  ?>
    </tr>
    <tr>
    	<td width="10%">Hãng SX:</td>
      <td width="85%" id="hang">
      <?php
	  if(isset($_GET["idcl"])){
      $idcl = $_GET["idcl"];
		$qr = "SELECT * FROM loaisp
		WHERE idcl = $idcl";
		$hang =  mysql_query($qr);
	while ($row_hang = mysql_fetch_array($hang)){
	?>
	<div class="hang"><a href="index.php?type=sanpham&idcl=<?php echo $row_hang['idcl']; ?>&idloai=<?php echo $row_hang['idloai']; ?>"><?php echo $row_hang['tenloai']; ?></a></div>
<?php
}
?>
<?php
}
?>
</td>
   </tr>
   <tr>
      <td colspan="2">
			<table width="100%" border="1">
                  <tr  class="tit">
                    <td>Mã SP</td>
                    <td>Tên SP</td>
                    <td>Ẩn Hiện</td>
                    <td align="center"><a href="index.php?type=sanpham&t=add">Thêm</a></td>
                    <td>Hình sản phẩm</td>
                    <td>Thuộc tính</td>
                    <td>video sản phẩm</td>
                  </tr>
                
                    <?php
                        if (isset($_GET["idcl"])&&isset($_GET["idloai"])){
                        $idcl = $_GET["idcl"];
                        $idloai=$_GET["idloai"];
                        $qr = "SELECT * FROM  sanpham
                                WHERE idcl = $idcl AND idloai = $idloai";
                                $sp =  mysql_query($qr);
                            while ($row_sp = mysql_fetch_array($sp)){
                                ob_start();
                        ?>
                  <tr>
                    <td>{idsp}</td>
                    <td>{tensp}</td>
                    <td>{anhhien}</td>
                    <td style="text-align:center"><a href="index.php?type=sanpham&t=edit&idsp={idsp}">Sửa</a> - <a onclick="return confirm('ban muon xoa ko?')" href="index.php?type=sanpham&t=del&idsp={idsp}">Xóa</a></td>
                    <td><a href="index.php?type=sanpham&t=pic&idsp={idsp}">Thêm</a> - <a href="index.php?type=sanpham&t=xem&idsp={idsp}">Xem</a></td>
                    <td><?php  
						if($idcl==1){echo '<a href="index.php?type=sanpham&t=thuoctinh&idsp={idsp}&idcl={idcl}">Xem</a>';}
						else{echo '<a href="index.php?type=sanpham&t=thuoctinh1&idsp={idsp}&idcl={idcl}">Xem</a>';}
					?></td>
                    <td><a href="index.php?type=sanpham&t=video&idsp={idsp}">Thêm</a> - <a href="index.php?type=sanpham&t=viedit&idsp={idsp}">Xem</a></td>
                  </tr>
                <?php
                    $s = ob_get_clean();
						$s = str_replace("{idcl}",$idcl,$s);
                        $s = str_replace("{idsp}",$row_sp['idsp'],$s);
                        $s = str_replace("{tensp}",$row_sp['tensp'],$s);
                        $s = str_replace("{anhhien}",$row_sp['anhhien'],$s);
                        echo $s;
							}
                ?>      
                <?php
						}
				?>
                </table>

      
      </td>
   </tr>
    
  </table>
</form>