<?php require_once('head.php');?>
<div class="form_bg">
	<div class="register_from">
		<form action="/registration" method="post" id="register">
		<label>Имя:</label><br/>
		<input class="input-text base_input" name="name" type="text" size="25" value="<?=$v['name']?>"  id="reg_name" /><br/>
		<label>Логин:</label><br/>
		<input class="input-text base_input" name="login" type="text" size="25" value="<?=$v['login']?>" id="reg_login" /><br/>
		<label>E-mail:</label><br/>
		<input class="input-text base_input" name="email" type="text" size="25" value="<?=$v['email']?>" id="reg_email" /><br/>
		<label>Пароль:</label><br/>
		<input class="input-text base_input" name="password" type="password" size="25" id="reg_pass" /><br/><br/>
		<div class="err_msg"><?=$v['msg']?></div>
		<div class="btns" onclick="document.getElementById('register').submit(); return false;"><a id="link1">Зарегистрироваться</a></div>		
		</form>
		<div class="clear"></div>
	</div>
</div>