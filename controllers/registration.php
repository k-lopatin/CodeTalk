<?php 

class RegisterController extends Controller {

	function index( $f = '' ){
		$this->vars = array();
		$this->vars['name'] = '';
		$this->vars['login'] = '';
		$this->vars['email'] = '';
        $this->vars['msg'] = '';
		if( $_SERVER["REQUEST_METHOD"]=="POST" ){

			$this->vars['name'] = $_POST['name'];
			$this->vars['login'] = $_POST['login'];
			$this->vars['email'] = $_POST['email'];

			if( !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty(!empty($_POST['email'])) 
				&& strlen($_POST['password']) > 5){

                $link = mysqli_connect("localhost", "root", "root", "codetalk");
                if (!$link){
                    echo 'CONNECTION ERROR';
                } else {
                    $check = true;
                    
                    if(isset($_POST['login'])) {
                        $login = htmlspecialchars(mysqli_real_escape_string($link, $_POST['login']));                        
                    } else {
                        $check = false;
                    }

                    if(isset($_POST['name'])) {
                        $name = htmlspecialchars(mysqli_real_escape_string($link, $_POST['name']));                        
                    } else {
                        $check = false;
                    }

                    if(isset($_POST['email'])) {
                        $email = htmlspecialchars(mysqli_real_escape_string($link, $_POST['email']));                        
                    } else {
                        $check = false;
                    }

                    if(isset($_POST['password']) && !empty($_POST['password'])) {                        
                        $password = md5(htmlspecialchars(mysqli_real_escape_string($link, $_POST['password'])));
                    } else {
                        $check = false;
                    }

                    if($check) {
                        $query = "SELECT * FROM users WHERE login='$login'";
                        $res = mysqli_query($link, $query);
                        $row = mysqli_fetch_assoc($res);

                        $query_email = "SELECT * FROM users WHERE email = '$email'";
                        $res_email = mysqli_query($link, $query_email);
                        $row_email = mysqli_fetch_assoc($res_email);
                        if(empty($row['login'])) {
                            if(empty($row_email['email'])){
                                $query = "INSERT INTO users (name, login, email, password)
                                    VALUES ('$name', '$login', '$email', '$password')";
                                if ($res = mysqli_query($link, $query)) {
                                    // echo 'OK';
                                    $this->showView('registerAfter', $this->vars);  
                                } else {
                                    echo 'Ошибка отправки данных';
                                }
                            } else {
                                $this->vars['msg'] = 'Данный E-mail занят'; 
                                $this->showView('register', $this->vars);                                 
                            }
                        } else {
                            $this->vars['msg'] = 'Данный логин занят';
                            $this->showView('register', $this->vars);                            
                        }
                    } else {
                        echo 'ERROR';
                    }
                }

			} else {
                $this->vars['msg'] = "Корректно заполните все поля";
				$this->showView('register', $this->vars);
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