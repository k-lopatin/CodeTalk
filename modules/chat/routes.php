<?php

function get($q){
	switch($q[1]){
		case 'get': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->index('sdf');
			break;
		}

		case 'add': {
			require_once('controllers/chat.php');
			$curController = new ChatController();
			$curController->addMessage('sdf');
			break;
		}
	}
}