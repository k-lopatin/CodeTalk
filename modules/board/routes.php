<?php

function get($q){
	switch($q[1]){
		case 'add_note': {
			require_once('controllers/board.php');
			$curController = new BoardController();
			$curController->addNote($q[2]);
			break;
		}
        case 'edit_note': {
            require_once('controllers/board.php');
            $curController = new BoardController();
            $curController->editNote($q[2]);
            break;
        }
		case 'get_notes': {
			require_once('controllers/board.php');
			$curController = new BoardController();
			$curController->getNotes($q[2]);
			break;
		}
	}
}