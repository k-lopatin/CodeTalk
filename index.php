<?php

if( isset($_GET['q']) ){
	$q = explode('/', $_GET['q']);
} else {
	$q[0] = '';
}

//current controller that displays page
$curController; 

switch( $q[0] ){
	case '': {		
		require_once('controllers/news.php');
		$curController = new NewsController();
		break;
	}
	case 'admin': {		
		require_once('controllers/admin.php');
		$curController = new AdminController();
		break;
	}
	case 'reg': {		
		require_once('controllers/reg.php');
		$curController = new RegController();
		break;
	}
	case 'profile': {		
		require_once('controllers/profile.php');
		$curController = new ProfileController();
		break;
	}
	case 'js': {		
		require_once('controllers/js.php');
		$curController = new JSController();
		break;
	}
	case 'graphics': {		
		require_once('controllers/graphic.php');
		$curController = new GraphicController();
		break;
	}
	case 'guest': {		
		require_once('controllers/guest.php');
		$curController = new GuestController();
		break;
	}
}

session_start();

if( isset( $q[1] ) ){
	$curController->index($q[1]);
} else {
	$curController->index();
}
