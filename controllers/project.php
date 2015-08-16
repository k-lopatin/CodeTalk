<?php

class ProjectController extends Controller {
	
	function index( $f = '' ){	
		//$projectHelper = $this->getHelper('project');
		//echo $projectHelper::createId();
		$this->vars['project_id'] =  $f;

		if(!isset($_SESSION)){
   			session_start();
		}
		if(!isset($_SESSION['curr_login'])){
			$_SESSION['curr_login'] = 'guest';
		}

		$this->vars['curr_login'] = $_SESSION['curr_login'];	

		$this->showView('chat', $this->vars);
	} 

	
}

