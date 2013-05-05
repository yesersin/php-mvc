<?php 
var_dump($_REQUEST);

if (isset($_GET['url']))
{
	$params = array();
	$params = explode("/", $_GET['url']);

	var_dump($params);
	echo $controller = ucwords($params[0]);
	
	if (isset($params[1]) && !empty($params[1]))
	{
		$action = $params[1];
	}
	
	if (isset($params[2]) && !empty($params[2]))
	{
		$query = $params[2];
	}
}

$modelName = $controller;
$controller .= '_Controller';
$load = new $controller($modelName, $action);

if (method_exists($load, $action))
{
    $load->{$action}($query);
}
else 
{
	die('Invalid method. Please check the URL.');
}

?>