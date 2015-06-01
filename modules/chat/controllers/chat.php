<?php

class ChatController extends Controller {
	
	private $chatId;

	function index( $id = '' ){
		if($id != ''){
			$this->chatId = $id;

			$chatArr = $this->openChatFileArray();
			if($chatArr != -1){
				foreach( $chatArr as $msg ){
					echo $msg.'<br>';
				}
			}
		} else {
			// @todo normal error system
			echo 'error';
		}

	} 

	function addMessage( $id = '' ){

		if($id != ''){
			$this->chatId = $id;

			$username = 'guest';
			$time = time();

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
}

