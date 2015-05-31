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
									<h2>Регистрация</h2>
									<form method="post">
										<b class="error"><?php if( isset($vars['error']) ) echo $vars['error']; ?></b>
										<input type="text" name="login" placeholder="Логин" />
										<input type="password" name="pass1" placeholder="Пароль" />
										<input type="password" name="pass2" placeholder="Повторите пароль" />
										<input type="submit" value="Зарегистрироваться" />
									</form>
								</header>
							</div>
						</section>

					<!-- Two 
						<section id="two">
							<div class="container">
								<h3>Things I Can Do</h3>
								<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non. Adipiscing cubilia elementum integer lorem ipsum dolor sit amet.</p>
								<ul class="feature-icons">
									<li class="fa-code">Write all the code</li>
									<li class="fa-cubes">Stack small boxes</li>
									<li class="fa-book">Read books and stuff</li>
									<li class="fa-coffee">Drink much coffee</li>
									<li class="fa-bolt">Lightning bolt</li>
									<li class="fa-users">Shadow clone technique</li>
								</ul>
							</div>
						</section>

					
						<section id="three">
							<div class="container">
								<h3>A Few Accomplishments</h3>
								<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non. Adipiscing cubilia elementum integer. Integer eu ante ornare amet commetus.</p>
								<div class="features">
									<article>
										<a href="#" class="image"><img src="/assets/images/pic01.jpg" alt="" /></a>
										<div class="inner">
											<h4>Possibly broke spacetime</h4>
											<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer adipiscing ornare amet.</p>
										</div>
									</article>
									<article>
										<a href="#" class="image"><img src="/assets/images/pic02.jpg" alt="" /></a>
										<div class="inner">
											<h4>Terraformed a small moon</h4>
											<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer adipiscing ornare amet.</p>
										</div>
									</article>
									<article>
										<a href="#" class="image"><img src="/assets/images/pic03.jpg" alt="" /></a>
										<div class="inner">
											<h4>Snapped dark matter in the wild</h4>
											<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer adipiscing ornare amet.</p>
										</div>
									</article>
								</div>
							</div>
						</section>

					
						<section id="four">
							<div class="container">
								<h3>Contact Me</h3>
								<p>Integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non. Adipiscing cubilia elementum integer. Integer eu ante ornare amet commetus.</p>
								<form method="post" action="#">
									<div class="row uniform">
										<div class="6u 12u(xsmall)"><input type="text" name="name" id="name" placeholder="Name" /></div>
										<div class="6u 12u(xsmall)"><input type="email" name="email" id="email" placeholder="Email" /></div>
									</div>
									<div class="row uniform">
										<div class="12u"><input type="text" name="subject" id="subject" placeholder="Subject" /></div>
									</div>
									<div class="row uniform">
										<div class="12u"><textarea name="message" id="message" placeholder="Message" rows="6"></textarea></div>
									</div>
									<div class="row uniform">
										<div class="12u">
											<ul class="actions">
												<li><input type="submit" class="special" value="Send Message" /></li>
												<li><input type="reset" value="Reset Form" /></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
						</section> -->
					

				</div>			

		</div>
	</body>
</html>