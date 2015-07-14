<?php require_once('head.php');?>
<div class="">
	<form action="/registration" method="post" id="register_form">
	<label>Имя:</label><br/>
	<input class="input-text" name="name" type="text" size="25" value="<?=$v['name']?>"  id="reg_name"><br/>
	<label>логин:</label><br/>
	<input class="input-text" name="login" type="text" size="25" value="<?=$v['login']?>" id="reg_login"><br/>
	<label>email:</label><br/>
	<input class="input-text" name="email" type="text" size="25" value="<?=$v['email']?>" id="reg_email"><br/>
	<label>пароль:</label><br/>
	<input class="input-text" name="password" type="password" size="25" id="reg_pass"><br/><br/>
	<input class="input-submit" type="submit" value="Зарегистрироваться"><br/><br/>
</div>