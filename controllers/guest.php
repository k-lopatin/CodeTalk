<?php
require_once('models/GuestModel.php');
require_once('Controller.php');

class GuestController extends Controller {
	function index($f = ''){
		$guestModel = new GuestModel;

		if( $this->checkPost() ){
			$this->addNote();
		}

		$this->vars['notes'] = $guestModel->getAllNotes();
		$this->showView('guest', $this->vars);
	} 

	function checkPost(){

		if( isset($_POST['text']) ){
			return true;
		}

	}


	function addNote(){
		$error = '';
		if( $_POST['text'] == '' ){
			$error .= 'Введите текст сообщения <br />';
		}

		if( $error == '' ){
			$guestModel = new GuestModel;
			$guestModel->addNote($_POST['text']);
		} else {
			$this->vars['error'] = $error;
		}	
	}
}


