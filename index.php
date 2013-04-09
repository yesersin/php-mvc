<?php  


define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(__FILE__));
define ('APP_PATH', 'application/');



require_once HOME . DS . '/system/config.php';
require_once HOME . DS . 'system' . DS .'core'.  DS . 'bootstrap.php';

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
