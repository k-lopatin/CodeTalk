<!DOCTYPE HTML>
<html>
	<head>
		<title>Добавить новость</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/tiny/tinymce.min.js"></script>
		<script>tinymce.init({selector:'textarea'});</script>
		<script src="/assets/js/main.js"></script>
		
			<link rel="stylesheet" href="/assets/css/skel.css" />
			<link rel="stylesheet" href="/assets/css/style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<?php include('blocks/adminSidebar.php'); ?>
			<div id="main">
				<section id="one">
					
					<form method="post" class="add_news_form">
						<b class="error"><?php if( isset($vars['error']) ) echo $vars['error']; ?></b>
						<input type="text" name="title" placeholder="Заголовок" />
						<b>Текст новости:</b>
						<textarea name="body"></textarea>
						<input type="submit" value="Добавить" />	
					</form>
				</section>
			</div>
		</div>
	</body>
</html>