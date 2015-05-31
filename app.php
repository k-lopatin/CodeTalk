<?php
require_once('config.php');
final class App
{
    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new App();
        }
        return $inst;
    }

    public function getMysqli(){
    	global $config_db;
    	$mysqli = new mysqli($config_db['server'], $config_db['user'], $config_db['password'], $config_db['db']);
    	mysqli_set_charset( $mysqli , 'utf-8' );
		if (mysqli_connect_error()) {
		    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
		            . mysqli_connect_error());
		} 
		return $mysqli;
    }

    private function __construct()
    {

    }
}