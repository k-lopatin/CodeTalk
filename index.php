<?php
ini_set('display_errors', 1);
require_once 'framework/autoload.php';
if( isset($_GET['q']) ){
	$q = explode('/', $_GET['q']);
} else {
	$q[0] = '';
}
//echo "tesdt";
//current co
$curController; 

switch( $q[0] ){
	case '': {		
		require_once('controllers/main.php');
		$curController = new MainController();
		break;
	}
	case 'project': {		
		require_once('controllers/project.php');
		$curController = new ProjectController();	
		break;
	}
	case 'chat_api': {
		require_once('modules/chat/routes.php');
		get($q);
		break;
	}
	case 'board_api': {
		require_once('modules/board/routes.php');
		get($q);
		break;
	}
	case 'registration': {		
		require_once('controllers/registration.php');
		$curController = new RegisterController();
		break;
	}
	case 'auth': {		
		require_once('controllers/auth.php');
		$curController = new AuthController();
		break;
	}
}

if(!isset($_SESSION)){
   	session_start();
}
if(isset($curController)){
	if( isset( $q[1] ) ){
		$curController->index($q[1]);
	} else {
		$curController->index();
	}
}
