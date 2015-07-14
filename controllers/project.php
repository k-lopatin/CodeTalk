<?php

class ProjectController extends Controller {
	
	function index( $f = '' ){	
		//$projectHelper = $this->getHelper('project');
		//echo $projectHelper::createId();
		$this->vars['project_id'] =  $f;

		$this->showView('chat', $this->vars);
	} 

	
}

