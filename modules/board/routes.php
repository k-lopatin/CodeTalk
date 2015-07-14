<?php

function get($q){
	switch($q[1]){
		case 'add_note': {
			require_once('controllers/board.php');
			$curController = new BoardController();
			$curController->addMessage($q[2]);
			break;
		}
	}
}