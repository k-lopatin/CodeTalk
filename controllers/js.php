<?php
require_once('Controller.php');

class JSController extends Controller {
	function index($f = ''){
		$this->showView('js', $this->vars);
	} 
}


