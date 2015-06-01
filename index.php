<?php
require_once 'framework/autoload.php';
if( isset($_GET['q']) ){
	$q = explode('/', $_GET['q']);
} else {
	$q[0] = '';
}
//echo "tesdt";
//current controller that displays page
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
}

session_start();
if(isset($curController)){
	if( isset( $q[1] ) ){
		$curController->index($q[1]);
	} else {
		$curController->index();
	}
}
