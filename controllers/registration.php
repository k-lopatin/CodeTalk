<?php 

class RegisterController extends Controller {

	function index( $f = '' ){
        
		$this->vars = array();
		$this->vars['name'] = '';
		$this->vars['login'] = '';
		$this->vars['email'] = '';
        $this->vars['msg'] = '';
		if( $_SERVER["REQUEST_METHOD"]=="POST" ){

            if(isset($_POST['name'])){
			    $this->vars['name'] = $_POST['name'];
            }
            if(isset($_POST['login'])){
			    $this->vars['login'] = $_POST['login'];
            }
            if(isset($_POST['email'])){
			    $this->vars['email'] = $_POST['email'];
            }
            $this->vars['is_reg'] = 0;

			if( !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty(!empty($_POST['email'])) 
				&& strlen($_POST['password']) > 5){

                $link = mysqli_connect("localhost", "root", "root", "codetalk");
                if (!$link){
                    echo 'CONNECTION ERROR';
                } else {
                    $check = true;
                    $salt = 'vnsdptb3yh'; 
                    
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
                        $password = md5(htmlspecialchars(mysqli_real_escape_string($link, $_POST['password'] . $salt )));
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
                                    $this->vars['msg'] = "Вы успешно зарегистрированы";
                                    $this->vars['is_reg'] = 1;
                                    // echo 'OK';
                                   // $this->showView('registerAfter', $this->vars);  
                                } else {
                                    echo 'Ошибка отправки данных';
                                }
                            } else {
                                $this->vars['msg'] = 'Данный E-mail занят'; 
                                //$this->showView('register', $this->vars);                                 
                            }
                        } else {
                            $this->vars['msg'] = 'Данный логин занят';
                            //$this->showView('register', $this->vars);                            
                        }
                    } else {
                        echo 'ERROR';
                    }
                }

			} else {
                $this->vars['msg'] = "Корректно заполните все поля";
				//$this->showView('register', $this->vars);
			}		
		} else {
			//$this->showView('register', $this->vars);	
		}
        echo json_encode($this->vars);
	}
}