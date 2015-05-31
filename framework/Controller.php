<?php
abstract class Controller {
	abstract function index( $f = '' );
	protected $vars;

	function showView($name, $vars){
		require_once( 'views/'.$name.'View.php');
	}
}