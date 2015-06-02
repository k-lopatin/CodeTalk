<?php

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
	function is_update($id = ''){
			if($id != ''){
				$this->chatId = $id;
				
				$file_time = $this->openTimeFileToWrite();
				while ( !feof($file_time) ) {
					$line = fgets($file_time, 16);
					echo $line;
				}
				fclose($file_time);
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

		if($id != ''){
			$this->chatId = $id;

			$username = $_POST['username'];
			$time = time();

			$msg = $_POST['message'];

			$str = $time . ' ' . $username . ' ' . $msg;

			$file = $this->openChatFileToWrite();
			
			$file_time = $this->openTimeFileToWrite();

			ftruncate($file_time, 0);

			fwrite($file_time, $time);


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

	function openTimeFileToWrite(){
		global $config_chat;
		$filename = $config_chat['chats_folder'] . $this->chatId . '_last.txt';

		return fopen( $filename, "c+" );
	}

	function closeChatFile( $file ){
		fclose($file);
	}
}

