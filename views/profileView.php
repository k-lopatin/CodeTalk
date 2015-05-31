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
								<header class="major">
									<h2>Личный кабинет</h2>
									<form method="post">
										<b class="error"><?php if( isset($vars['error']) ) echo $vars['error']; ?></b>
										<input type="text" name="username" value="<?php echo $vars['user'][0]; ?>" placeholder="Имя" />
										<input type="text" name="age" value="<?php echo $vars['user'][1]; ?>" placeholder="Возраст" />
										<input type="submit" value="Сохранить" />
									</form>
								</header>
							</div>
						</section>					

				</div>			

		</div>
	</body>
</html>