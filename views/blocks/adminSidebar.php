<section id="header" class="skel-layers-fixed">
	<header>
		<?php if( isset( $_SESSION['logged_in'] ) && $_SESSION['logged_in'] ) : ?>
			<h2>Привет, <?php echo $_SESSION['user_login'] ?></h2>			
			<a href="/profile">Личный кабинет</a>
			<a class="logout" href="/profile/logout">Выход</a>
			<?php if($_SESSION['user_role'] == 1): ?>
				<br /><a href="/admin/news">Админ-панель</a>
			<?php endif; ?>
		<?php else: ?>
			<form action="profile" method="post">
				<b>Вход:</b><br/>
				<b class="error"><?php if( isset($vars['auth_error']) ) echo $vars['auth_error']; ?></b>
				<input type="text" name="login" placeholder="login" />
				<input type="password" name="pass" placeholder="пароль" />
				<input type="submit" value="Войти" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/reg">Регистрация</a>
			</form>
		<?php endif; ?>
	</header>
	<nav id="nav">
		<ul>
			<li><a href="/" class="active">Перейти на сайт</a></li>
			<li><a href="/admin" class="active">Добавить новость</a></li>
			<li><a href="/admin/news">Все новости</a></li>
			<li><a href="/admin/guest">Гостевая книга</a></li>
		</ul>
	</nav>
</section>