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
				<table class="guest_table">
				<tr><td>Заголовок</td><td></td></tr>
				 <?php 
					foreach ($vars['notes'] as $note) {
						echo '<tr>
							<td class="name">'.$note['username'].'</td>
							<td class="edit">
								<form method="post">
								<input type="hidden" name="note_id" value="'.$note['id'].'" />
								<textarea name="text">'.$note['text'].'</textarea>
								<input type="submit" value="Сохранить" />
								</form>
							</td>
							<td><a href="/admin/del_guest/'.$note['id'].'" class="del">Удалить</a></td>
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