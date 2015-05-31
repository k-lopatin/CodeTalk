<?php

class TestController extends Controller {
	function index($f = ''){
		$this->showView('test', $this->vars);
	} 
}


