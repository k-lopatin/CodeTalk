<?php
abstract class Controller {
	abstract function index( $f = '' );
	protected $vars;

	function showView($name, $vars){
		$v = $vars;
		require_once( 'views/'.$name.'View.php');
	}

	function getHelper($name){
		require_once( 'helpers/'.$name.'.php' );
		return $name.'Helper';
	}
}