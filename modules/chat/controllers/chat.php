<?php

if(!isset($_SESSION)){
   	session_start();
}
class ChatController extends Controller {
	
	private $chatId;

	function index( $id = '' ){
		if($id != ''){
			$this->chatId = $id;

			$chatArr = $this->openChatFileArray();
			$prevMsgArr = array('', '', '');
			if($chatArr != -1){
				foreach( $chatArr as $msg ){

					$msgArr = $this->parseMsg( $msg );
					$this->msgView( $msgArr, $prevMsgArr );

					$prevMsgArr = $msgArr;

				}
			}
		} else {
			// @todo normal error system
			echo 'error';
		}

	} 

	private function msgView( $msgArr, $prevMsgArr ){

		echo '<span class="date">' . $msgArr[0] . '</span> ';

		if( $msgArr[1] != $prevMsgArr[1] ){
			echo '<span class="name">' . $msgArr[1] . '</span> ';
		}		
		echo '<span class="message">' . $msgArr[2] . '</span> ';

		echo '<div class="clear"></div>';

	}

	private function parseMsg( $msg ){
		$msgArr = explode( ' ', $msg, 3 );

		$msgArr[0] = date('H:i:s', $msgArr[0]);

		return $msgArr;
	}

	function addMessage( $id = '' ){
		global $config_chat;

		if($id != ''){
			$this->chatId = $id;

			$username = $_POST['username'];
			$time = time();

			$file_time = $config_chat['chats_folder'].'get_time/'.$id.'_time.txt';

			$f = fopen( $file_time, "a" );

			ftruncate($f, 0);

			fwrite($f, $time);

			fclose($f);

			$msg = $_POST['message'];

			$str = $time . ' ' . $username . ' ' . $msg;

			$file = $this->openChatFileToWrite();

			fwrite($file, $str);

			fclose($file);
		} else {
			// @todo normal error system
			echo 'error';
		}

	}

	// @todo checking 
	function checkIfChatExist(){
		return true;
	}

	// @todo close file
	function openChatFileArray( $page = 1 ){

		global $config_chat;
		$filename = $config_chat['chats_folder'] . $this->chatId . '.txt';

		if(file_exists($filename))
			return file( $filename );
		else
			return -1;
	}	

	function openChatFileToWrite( $page = 1 ){

		global $config_chat;
		$filename = $config_chat['chats_folder'] . $this->chatId . '.txt';

		return fopen( $filename, "a" );
	}

	function closeChatFile( $file ){
		fclose($file);
	}

	function updateLogin( $new_login ){
		$_SESSION['curr_login'] = $new_login;
	}

	function is_write($login, $val, $id){
		global $config_chat;

		$dir = $config_chat['chats_folder'].'is_write/'.$id;
		if(!is_dir($dir))
			mkdir($dir);
		$filename = $dir.'/'.$login.'.txt';
		$f = fopen( $filename, "a" );

		ftruncate($f, 0);

		fwrite($f, $val);

		fclose($f);
	}

	function check_write($login = ''){
		global $config_chat;
		if($login != ''){
			if ($handle = opendir($config_chat['chats_folder'].'is_write/')) {

				$check = false;
			    while (false !== ($entry = readdir($handle))) {

			        if($entry != $login.'.txt'){
			        	$filename = $config_chat['chats_folder'].'is_write/'.$entry;
			        	$val = file_get_contents($filename);
			        	if($val == '1' && $check == false){
			        		echo $val;
			        		$check = true;
			        	}
			        }
			    }

			    closedir($handle);
			}
		}
	}

	function get_time( $id = '' ){
		global $config_chat;
		if($id != ''){
			$filename = $config_chat['chats_folder'].'get_time/'.$id.'_time.txt';
			if(file_exists($filename)){
				$val = array();
				$val[0] = file_get_contents($filename);
				$val[1] = $_SESSION['curr_login'];
				echo json_encode($val);
			} else {
				echo '0';
			}
		} else {
			echo 'error';
		}
	}
}

