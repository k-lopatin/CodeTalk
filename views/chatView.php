<?php 
	if(!isset($_SESSION)){
   		session_start();
	}
	if(!isset($_SESSION['curr_login'])){
		$_SESSION['curr_login'] = 'guest';
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Чат</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/chat.js"></script>

		<link rel="stylesheet" href="/assets/css/style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<div id="chat_box">

		</div>
		<div class="is_write">
			<img src="/assets/images/pencil.png"></img>
		</div>
		<div id="add_msg">
			<textarea id="new_msg"></textarea>
				<input type="text" id="username" value="<?= $_SESSION['curr_login']?>" />
		</div>

	</body>
</html>