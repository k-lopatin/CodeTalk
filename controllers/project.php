<?php

class ProjectController extends Controller {
	
	function index( $f = '' ){		
		$this->showView('chat', $this->vars);
	} 

	
}

