<?php
require_once('models/NewsModel.php');
require_once('models/GuestModel.php');
require_once('Controller.php');

class AdminController extends Controller {
	
	function index( $f = '' ){
		if( !isset($_SESSION['logged_in']) || $_SESSION['user_role'] != 1 ){
			header('Location: /');
		}

		if( $f != '' ){
			switch( $f ){
				case 'news': {
					$this->allNews();
					break;
				}
				case 'edit': {
					$this->editNews();
					break;
				}
				case 'del': {
					$this->delNews();
					break;
				}
				case 'guest': {
					$this->guestNotes();
					break;
				}
				case 'del_guest': {
					$this->delNote();
					break;
				}

			}
			return;
		}

		if( $this->checkPost() ){
			$this->addNews();
		}
		$this->showView('addNews', $this->vars);

	} 

	function checkPost(){

		if( isset($_POST['text']) || isset($_POST['title']) ){
			return true;
		}

	}

	function allNews(){
		$newsModel = new NewsModel;
		$this->vars['news'] = $newsModel->getAllNews();

		$this->showView('allNews', $this->vars);
	}

	function guestNotes(){
		if( $this->checkPost() ){
			$this->updateNote();
		}
		$guestModel = new GuestModel;
		$this->vars['notes'] = $guestModel->getAllNotes();

		$this->showView('adminGuest', $this->vars);
	}

	function updateNote(){
		$error = '';
		if( $_POST['text'] == '' ){
			$error .= 'Введите текст сообщения <br />';
		}
		if( $error == '' ){
			$guestModel = new GuestModel;
			$guestModel->editNote($_POST['note_id'], $_POST['text']);
		} else {
			$this->vars['error'] = $error;
		}	
	}

	function delNote(){
		$error = '';
		global $q;
		if( !isset($q[2]) )
			return;		

		$guestModel = new GuestModel;
		$guestModel->delNoteById( $q[2] );

		header('Location: /admin/guest');
			
	}

	function addNews(){
		$error = '';
		if( $_POST['title'] == '' ){
			$error .= 'Введите заголовок <br />';
		}
		if( $_POST['body'] == '' ){
			$error .= 'Введите текст новости <br />';
		}		
		if( $error == '' ){
			$newsModel = new NewsModel;
			$newsModel->addNews($_POST['title'], $_POST['body']);
		} else {
			$this->vars['error'] = $error;
		}	
	}
	function editNews(){
		$error = '';
		global $q;

		if( !isset($q[2]) )
			return;
		
		if( $this->checkPost() ){


			if( $_POST['title'] == '' ){
				$error .= 'Введите заголовок <br />';
			}
			if( $_POST['body'] == '' ){
				$error .= 'Введите текст новости <br />';
			}		
			if( $error == '' ){
				$newsModel = new NewsModel;
				$newsModel->editNews($q[2], $_POST['title'], $_POST['body']);
			} else {
				$this->vars['error'] = $error;
			}

		}

		$newsModel = new NewsModel;
		$this->vars['news'] = $newsModel->getNewsById( $q[2] );

		$this->showView('editNews', $this->vars);
			
	}

	function delNews(){
		$error = '';
		global $q;
		if( !isset($q[2]) )
			return;
		

		$newsModel = new NewsModel;
		$this->vars['news'] = $newsModel->delNewsById( $q[2] );

		header('Location: /admin/news');
			
	}
}

