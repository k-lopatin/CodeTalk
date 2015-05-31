<?php
require_once('models/UsersModel.php');
require_once('Controller.php');

class RegController extends Controller {
	function index($f = ''){
		if( $this->checkPost() ){
			$this->register();
		}
		//$vars['news'] = $newsModel->getAllNews();
		$this->showView('reg', $this->vars);
	} 


	function register(){
		$error = '';
		$usersModel = new UsersModel;
		if( $_POST['login'] == '' ){
			$error .= 'Введите логин <br />';
		}
		if( $usersModel->isLoginExist( $_POST['login'] ) ){
			$error .= 'Такой логин уже существует <br />';
		}
		if( $_POST['pass1'] == '' ){
			$error .= 'Введите пароль <br />';
		}	
		if( $_POST['pass1'] != $_POST['pass2'] ){
			$error .= 'Пароли не совпадают <br />';
		}	
		if( $error == '' ){
			
			if( $usersModel->register($_POST['login'], $_POST['pass1']) ){
				header('Location: /profile');
			}
		} else {
			$this->vars['error'] = $error;
		}	
	}



	function checkPost(){

		if( isset($_POST['login']) ){
			return true;
		}

	}
}


