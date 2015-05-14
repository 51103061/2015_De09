<link rel="stylesheet" href="blocks/css/style.css" />
<div id="bar">
 <div id="container">
	<div id="loginContainer">
	
  <form name="form1" method="post" action="" id="form2">

<table border="0">
  <tr>
    <td width="140px" id="tenlog">Xin chào : <?php echo '<b>'.$_SESSION['HoTen'].'</b>'; ?><br />  <?php if($_SESSION["idGroup"]==1){ echo "<a href='admin'>Trang quản trị</a>"; } ?>
</td>
    <td>
    <input type="submit" name="btnThoat" id="btnThoat" value="Thoát">
</td>
  </tr>
</table>
  </form>
  </div>
  </div>
</div>