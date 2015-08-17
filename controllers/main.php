<?php

class MainController extends Controller {
	
	function index( $f = '' ){	

		$projectHelper = $this->getHelper('project');
		$this->vars[0] = $projectHelper::createId();			

		$this->showView('main', $this->vars);
	} 

	
}

