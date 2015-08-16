<?php require_once('head.php');?>
<body class="">
<!--==============================header=================================-->
		<header class="page1">
			<div class="container_12">
				<div class="grid_12">
					<h1><a href="#" onClick="goToByScroll('page1'); return false;"><img src="/assets/images/logo.png"></a></h1>
					<div class="menu_block">
						<nav class="">
							<ul class="sf-menu">
								<li class="current men"><a onClick="goToByScroll('page1'); return false;" href="#">Главная </a> <strong class="hover"></strong></li>
								<li class=" men2"><a onClick="goToByScroll('page3'); return false;" href="#">Возможности</a> <strong class="hover"></strong></li>
								<li class=" men1"><a onClick="goToByScroll('page2'); return false;" href="#">Присоединиться</a> <strong class="hover"></strong></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</header>
<!--=======content================================-->
		<div id="page1" class="content">
			<div class="container_12">
				<div class="grid_12">
					<div class="slider_wrapper">
						<ul class="items">	
							<li>						
								<img src="/assets/images/spacer.gif" alt="">
								<div class="caption banner">
									<h2>Управление проектом стало еще проще</h2>
								</div>
							</li>
							<li>						
								<img src="/assets/images/spacer.gif" alt="">
								<div class="caption banner">
									<h2>Еще одна пафосная надпись</h2>
								</div>
							</li>
							<li>						
								<img src="/assets/images/spacer.gif" alt="">
								<div class="caption banner">
									<h2>и еще одна</h2>
								</div>
							</li>
					</div>
						<div class="btns gray" onclick="goToByScroll('page2'); return false;"><a id="link1">Регистрация</a></div>
						<div class="btns gray" onclick="goToByScroll('page2'); return false;"><a id="link1">Вход</a></div>
					<!--<div class="socials">							
						<a href="#">Вход</a>
						<a href="#"></a>
						<a href="#"></a>
						<a href="#"></a>
					</div>-->
				</div>
			</div>
		</div>		
		<div id="page3" class="content">
			<div class="container_12 small" id="small_cont">
				<div class="grid_12 small">
					<div class="slogan">
						<h3>Возможности</h3>
						<!--<div class="text1">
							Vivamus at magna non nunc tristique rhoncus. Aliquam nibh ante, egestas id dictum a, commodo luctus libero. Praesent faucibus malesuada faucibus. Donec laoreet metus id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam consectetur orci sed nulla facilisis consequat. Curabitur vel lorem sit amet nulla ullamcorper fermentum.  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						</div>-->
					</div>
				</div>
				<div class="grid_3">
					<div class="box maxheight1">
						<img src="/assets/images/box1_img1.png" alt="">
						<div class="text1"><a href="#">WideBoard</a></div>Держите все файлы проекта на виду, помещая их на доску.
					</div>
				</div>
				<!--<div class="grid_3">
					<div class="box maxheight1">
						<img src="images/box1_img2.png" alt="">
						<div class="text1"><a href="#">Research</a></div>Ite auctor non pellentesque vel, aliquet sit amet erat. Nullam eget dignissim nisi, aliquam feugiat nibhh sagittis ut.
					</div>
				</div>-->
				<div class="grid_3">
					<div class="box maxheight1">
						<img src="/assets/images/box1_img3.png" alt="">
						<div class="text1"><a href="#">Development</a></div>Еще какая-нибудь неимоверно крутая фишка.
					</div>
				</div>
				<div class="grid_3">
					<div class="box maxheight1">
						<img src="/assets/images/box1_img4.png" alt="">
						<div class="text1"><a href="#">Обсуждение</a></div>Обсуждайте детали проекта в удобном чате.
					</div>
				</div>
			</div>
		</div>
		<div id="page2" class="content">
			<div class="container_12">
				<div class="grid_12">
					<div class="connect">
						<h3>Присоединиться</h3>
					</div>	
					<!--<div class="text2">
						<a href="/registration" class="underlined">Зарегистрируйтесь</a> и создайте свой проект прямо сейчас!
					</div>
					<div class="text2">
						ИЛИ
					</div>
					<div class="text2">
						<?php
							//echo '<a class="underlined" href="/project/'.$this->vars[0].' ">Попробуйте систему</a>'; 
						?> 
						в качетсве гостя.
					</div>			-->
					<div class="register_from">

						<div class="form_container one">
							<form action="/registration" method="post" id="register">
								<label>Имя:</label><br/>
								<input class="input-text base_input" name="name" type="text" size="25"  id="reg_name" /><br/>
								<label>Логин:</label><br/>
								<input class="input-text base_input" name="login" type="text" size="25" id="reg_login" /><br/>
								<label>E-mail:</label><br/>
								<input class="input-text base_input" name="email" type="text" size="25" id="reg_email" /><br/>
								<label>Пароль:</label><br/>
								<input class="input-text base_input" name="password" type="password" size="25" id="reg_pass" /><br/><br/>
								<div class="err_msg one"></div>
								<div class="btns center gray" id="main_submit" onclick=" main_submit_f('register'); "><a id="link1">Зарегистрироваться</a></div>		
							</form>
						</div>

						<div class="form_container two">
							<form action="/registration" method="post" id="auth">
								<input class="input-text base_input" name="chat_id" type="hidden" value="<?=$this->vars[0] ?>" size="25" id="chat_id" />
								<label>Логин:</label><br/>
								<input class="input-text base_input" name="login" type="text" size="25" id="auth_login" /><br/>
								<label>Пароль:</label><br/>
								<input class="input-text base_input" name="password" type="password" size="25" id="auth_pass" /><br/><br/>
								<div class="err_msg two"></div>
								<div class="btns center gray big_margin" id="main_submit" onclick=" main_submit_f('auth'); "><a id="link2">Войти</a></div>		
							</form>
						</div>

							<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="copy">
						<a onClick="goToByScroll('page1'); return false;" href="#"><img src="/assets/images/logo.png" id="footer_logo"></a>  &copy; 2015 | CodeTalk
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</footer>
	</body>
</html>