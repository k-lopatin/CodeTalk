<?php
require_once('models/UsersModel.php');
require_once('Controller.php');

class ProfileController extends Controller {
	function index($f = ''){

		$this->checkQ();

		$this->check();

		$usersModel = new UsersModel;
		$this->vars['user'] = $usersModel->getCurrUser();
		$this->showView('profile', $this->vars);
	} 


	function register(){
		$error = '';
		if( $_POST['login'] == '' ){
			$error .= 'Введите логин <br />';
		}
		if( $_POST['pass1'] == '' ){
			$error .= 'Введите пароль <br />';
		}	
		if( $_POST['pass1'] != $_POST['pass2'] ){
			$error .= 'Пароли не совпадают <br />';
		}	
		if( $error == '' ){
			$usersModel = new UsersModel;
			if( $usersModel->register($_POST['login'], $_POST['pass1']) ){
				header('Location: /profile');
			}
		} else {
			$this->vars['error'] = $error;
		}	
	}



	function check(){

		if( isset($_POST['login']) ){
			$this->auth();
		} else {
			if( !$this->checkLogin() ){
				header('Location: /');
			}
		}
		if( isset($_POST['username']) ) {
			$this->updateFields();
		}

	}

	function checkQ(){
		global $q;
		if( isset($q[1]) ){
			switch( $q[1] ){
				case 'logout': {
					$this->logout();
					header('Location: /');
				}
			}
		}
	}

	function updateFields(){
		$age = intval( $_POST['age'] );
		$error = '';
		if( $age < 1 || $age > 150 ) {
			$error = 'Введите корректный возраст';
		}
		$this->vars['error'] = $error;
		if( $error == '' ){
			$usersModel = new UsersModel;
			$usersModel->updateUser($_POST['username'], $age);
		}

	}

	function auth(){

		$error = '';
		if( $_POST['login'] == '' ){
			$error .= 'Введите логин <br />';
		}
		if( $_POST['pass'] == '' ){
			$error .= 'Введите пароль <br />';
		}	

		if( $error == '' ){
			$usersModel = new UsersModel;
			if( !$usersModel->auth($_POST['login'], $_POST['pass']) ){
				header('Location: /');
			}
		} else {
			$this->vars['auth_error'] = $error;
			header('Location: /');
		}
		
				
		
	}


	function logout(){
		$usersModel = new UsersModel;
		$usersModel->logout();
	}

	function checkLogin(){
		return isset( $_SESSION['logged_in'] ) && $_SESSION['logged_in'] == 1;
	}
}


