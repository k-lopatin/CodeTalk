<?php

function get($q){
	switch($q[1]){
        case 'get_notes': {
            require_once('controllers/board.php');
            $curController = new BoardController();
            $curController->getNotes($q[2]);
            break;
        }
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
        case 'del_note': {
            require_once('controllers/board.php');
            $curController = new BoardController();
            $curController->delNote($q[2]);
            break;
        }
	}
}