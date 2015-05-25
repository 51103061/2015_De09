<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8' />
	
	<title>RAO VẶT - <?php echo (isset($title)) ? $title : "My Home Page"; ?></title>
	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/check_ajax.js"></script>
    <script type="text/javascript" src="js/delete_comment.js"></script>
	<link rel='stylesheet' href='css/style.css' />
</head>

<body>
	<div id="container">
	<div id="header">
		<h1><a href="index.php">RAO VẶT</a></h1>
        <p class="slogan">Trang rao vặt hàng đầu Việt Nam</p>
	</div>
	<div id="navigation">
		<ul>
	        <li><a href='index.php'>Home</a></li>
			<li><a href='#'>About</a></li>
			<li><a href='#'>Services</a></li>
			<li><a href='contact.php'>Contact us</a></li>
            <li><a href='add_pages.php'>Đăng tin</a></li>
		</ul>
        
        <p class="greeting">Xin chào <?php echo (isset($_SESSION['first_name'])) ? $_SESSION['first_name'] : "khách!"; ?></p>
	</div><!-- end navigation-->
