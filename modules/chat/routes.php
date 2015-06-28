<?php

function get($q){
	switch($q[1]){
		case 'get': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->index($_GET['curr_id']);
			break;
		}

		case 'add': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->addMessage($q[2]);
			break;
		}
		case 'update_login': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
		$_SESSION['curr_login'] = $_POST['new_login'];
			$curController->updateLogin($_POST['new_login']);			
			break;
		}
	}
}