<?php

class AuthController extends Controller {


	function index( $f = '' ){
		$this->vars = array();
		if(!isset($_SESSION))
	    	session_start();
	    $_SESSION['auth'] = 0;
        $this->vars['auth'] = 0;

		if( $_SERVER["REQUEST_METHOD"]=="POST" ){

			if( !empty($_POST['login']) && !empty($_POST['password']) ){
				$link = mysqli_connect("localhost", "root", "root", "codetalk");
	            if(isset($_POST['chat_id'])){
	                $this->vars['chat_id'] =  $_POST['chat_id'];
	            }

	            if(isset($_POST['login'])){
	                $login =  $_POST['login'];
	            }
				$salt = 'vnsdptb3yh';
	            if(isset($_POST['password'])){
                	$password = md5(htmlspecialchars(mysqli_real_escape_string($link, $_POST['password'] . $salt )));
            	}
                if (!$link){
                    echo 'CONNECTION ERROR';
                } else {                	
                    $query = "SELECT login, password FROM users WHERE login='$login'";

                    if ($res = mysqli_query($link, $query)) {
            			$data = mysqli_fetch_assoc($res);
            			if ($data['password'] == $password) {
                			$_SESSION['auth'] = 1;
                			$_SESSION['curr_login'] = $login;
                			$this->vars['auth'] = 1;
                			$this->vars['login'] = $login;
							$this->vars['msg'] = "Привет," . $login; 
            			} else {
							$this->vars['msg'] = "Неверное имя пользователя или пароль";            				
            			}
            		}
                }
			} else {
				$this->vars['msg'] = "Неверное имя пользователя или пароль";
			}

		}

    	echo json_encode($this->vars);

	}
}