<!DOCTYPE HTML>
<html>
	<head>
		<title>Все новости</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		
			<link rel="stylesheet" href="/assets/css/skel.css" />
			<link rel="stylesheet" href="/assets/css/style.css" />
		<script src="/assets/js/main.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<?php include('blocks/adminSidebar.php'); ?>
			<div id="main">
				<div class="admin_news_list">
				<table>
				<tr><td>Заголовок</td><td></td></tr>
				 <?php 
					foreach ($vars['news'] as $news) {
						echo '<tr>
							<td><a href="/admin/edit/'.$news['id'].'">'.$news['title'].'</a></td>
							<td><a href="/admin/del/'.$news['id'].'" class="del">Удалить</a></td>
						</tr>';
					}
				?>
				</table>
				</div>
			</div>
		</div>
		<div class="popup"></div>
		<div class="del_window">
			<button class="del">Удалить</button>
			<button class="cancel">Отмена</button>
		</div>
	</body>
</html>