<?php

function get($q){
	switch($q[1]){
		case 'time': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->is_update();
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