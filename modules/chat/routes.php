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
			$curController->updateLogin($_POST['new_login']);			
			break;
		}
		case 'write':{
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->is_write($_POST['login'], $_POST['value'], $_POST['id']);	
			break;
		}
		case 'check_write':{
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->check_write($_GET['curr_login']);
			break;
		}
		case 'get_time':{
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->get_time($_GET['curr_id']);
			break;
		}
	}
}