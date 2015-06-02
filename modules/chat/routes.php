<?php

function get($q){
	switch($q[1]){
		case 'is_update': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->is_update($_GET['curr_id']);
			break;
		}
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
	}
}