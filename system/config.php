<?php 
ini_set ('display_errors', 1);

define ('DB_HOST', 	'localhost');
define ('DB_NAME', 	'stncmvc');
define ('DB_USER', 	'root');
define ('DB_PASS', 	'123456');

//$route['404_override'] = '';


//route yapısı aşama 1
//burası varsayılan kontroller
$controller = "news";
$action = "index";
$query = null;


/*
 * // This will allow the browser to cache the pages of the store.

header('Cache-Control: max-age=3600, public');
header('Pragma: cache');
header("Last-Modified: ".gmdate("D, d M Y H:i:s",time())." GMT");
header("Expires: ".gmdate("D, d M Y H:i:s",time()+3600)." GMT");
 * */
