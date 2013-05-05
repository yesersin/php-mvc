<?php  
session_start();

define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(__FILE__));
define ('APP_PATH', 'application/');
define ('APP_DIR', HOME.DS.APP_PATH);//yeni


require_once HOME . DS . '/system/config.php';
require_once HOME . DS . 'system' . DS .'core'.  DS . 'bootstrap.php';

/*
 * istenilen class model demi
 * controller da mı 
 * sistem demi bul ve ekle 
 * @link http://php.net/manual/en/language.oop5.autoload.php 
 * */


function __autoload($class)
{
	
	
	if (file_exists(HOME . DS .  'system' . DS .'core'.  DS . strtolower($class) . '.php'))
	{
		require_once HOME . DS . 'system' . DS .'core'.  DS . strtolower($class) . '.php';
	}
	
	
	else if (file_exists(HOME . DS .APP_PATH. 'models' . DS . strtolower($class) . '.php'))
	{
		require_once HOME . DS .APP_PATH. 'models' . DS . strtolower($class) . '.php';
	}
	
	
	
	else if (file_exists(HOME . DS .APP_PATH. 'controllers' . DS . strtolower($class) . '.php'))
	{
		require_once HOME . DS .APP_PATH. 'controllers'  . DS . strtolower($class) . '.php';
	}
}
