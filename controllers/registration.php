<?php 

class RegisterController extends Controller {

	function index( $f = '' ){
		$this->vars = array();
		if( $_SERVER["REQUEST_METHOD"]=="POST" ){
			
			$this->vars['name'] = $_POST['name'];
			$this->vars['login'] = $_POST['login'];
			$this->vars['email'] = $_POST['email'];

			if( !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty(!empty($_POST['email'])) ){
				$this->showView('registerAfter', $this->vars);	
			} else {
				$this->showView('register', $this->vars);
				echo 'Корректно заполните все поля';
			}		
		} else {
			$this->showView('register', $this->vars);	
		}
	}

}

       /* $link = mysqli_connect("localhost", "admin", "12345", "main_base");
        if (!$link)
            echo 'CONNECTION ERROR';
        $check = true;
        if(isset($_POST['login']) && !empty($_POST['login']))
            $login = htmlspecialchars(mysqli_real_escape_string($link, $_POST['login']));
        else
            $check=false;
        if(isset($_POST['name']) && !empty($_POST['name']))
            $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));
        else
            $check=false;
        if(isset($_POST['email']) && !empty($_POST['email']))
            $email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));
        else
            $check=false;
        if(isset($_POST['password']) && !empty($_POST['password']))
            $password = md5($_POST['password']);
        else
            $check=false;
        if($check) {
            $query = "SELECT * FROM users WHERE login='$login'";
            $res = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($res);
            if(empty($row['login'])) {
                $query = "INSERT INTO users (name, login, email, password)
VALUES ('$name', '$login', '$email', '$password')";
                if ($res = mysqli_query($link, $query)) {
                    // echo 'OK';
                    //$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
                    //header('Location:' . $host . 'SITE/');
                } else {
                    // echo 'Ошибка отправки данных';
                }
            } 
        }else {
            // echo 'ERROR';
        }*/