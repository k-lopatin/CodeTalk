<!DOCTYPE HTML>
<html>
	<head>
		<title>НОВОСТИ</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/main.js"></script>
		
			<link rel="stylesheet" href="/assets/css/skel.css" />
			<link rel="stylesheet" href="/assets/css/style.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<div id="wrapper">

			<!-- Header -->
				<?php include('blocks/mainSidebar.php'); ?>

			<!-- Main -->
				<div id="main">

					<!-- One -->
						<section id="one">
							<div class="container">
								<h1>Отзывы</h1>
								<header class="major">
									<?php 
										if( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 ){
											$error = '';
											if( isset($vars['error']) ) $error = $vars['error'];

											echo '
												<form method="post" class="guest_form">
													<b class="error">'.$error.'</b>
													<textarea name="text"></textarea>
													<input type="submit" value="Отправить" />
												</form>
											';
										}
									?>
									<?php 
										foreach ($vars['notes'] as $note) {
											echo '
												<h3>'.$note['username'].'</h3>
												<b class="date">'.date('d.m.Y', $note['created_at']).'</b>
												<p>'.$note['text'].'</p>
												<hr />
											';
										}
									?>
								</header>
							</div>
						</section>					

				</div>			

		</div>
	</body>
</html>