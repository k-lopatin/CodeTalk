<?php
require_once('Model.php');
class UsersModel extends Model {

	function register($login, $pass){
		$login = mysqli_real_escape_string($this->mysqli, $login);
		$pass = md5( mysqli_real_escape_string($this->mysqli, $pass) );
		$this->mysqli->query('INSERT INTO users (login, password) VALUES ("'.$login.'", "'.$pass.'")');
		echo 'INSERT INTO users (login, password) VALUES ("'.$login.'", "'.$pass.'")';
		echo mysqli_error($this->mysqli);

		return true;
	}

	function getCurrUser(){
		$id = $_SESSION['user_id'];
		$res = $this->mysqli->query('SELECT name, age FROM users WHERE id = '.$id);
		if( $user = $res->fetch_row() ){
			return $user;
		} else {
			return false;
		}
	}

	function updateUser($name, $age){		
		$name = mysqli_real_escape_string($this->mysqli, $name);
		$id = $_SESSION['user_id'];
		$this->mysqli->query('UPDATE users SET name = "'.$name.'", age = "'.$age.'" WHERE id ='.$id);
		echo mysqli_error($this->mysqli);
	}

	function auth($login, $pass){
		$login = mysqli_real_escape_string($this->mysqli, $login);
		$pass = md5( mysqli_real_escape_string($this->mysqli, $pass) );
		$res = $this->mysqli->query('SELECT id, login, role FROM users WHERE login = "'.$login.'" AND password = "'.$pass.'"');
		if( $user = $res->fetch_row() ){
			$_SESSION['logged_in'] = 1;
			$_SESSION['user_id'] = $user[0];
			$_SESSION['user_login'] = $user[1];
			$_SESSION['user_role'] = $user[2];
			return true;
		} else {
			return false;
		}
	}

	function isLoginExist($login){
		$login = mysqli_real_escape_string($this->mysqli, $login);
		$res = $this->mysqli->query('SELECT id FROM users WHERE login = "'.$login.'"');
		if( $user = $res->fetch_row() ){
			return true;
		} else {
			return false;
		}
	}

	function logout(){
		session_unset();
	}

}