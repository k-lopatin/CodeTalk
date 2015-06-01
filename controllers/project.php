<?php

class ProjectController extends Controller {
	
	function index( $f = '' ){	
		//$projectHelper = $this->getHelper('project');
		//echo $projectHelper::createId();
		echo $f;
		$this->showView('chat', $this->vars);
	} 

	
}

