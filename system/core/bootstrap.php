<?php 
///var_dump($_REQUEST);

/*
 * mvc yapısının tüm olayı aslında htacces in 
 * baz alıdıgı yer burasıdır 
 * burada gelen parametre mvc yapısının 
 * controller / fonksiyon / id 
 * yapısına göre parçalanır 
 */

if (isset($_GET['url']))
{
	$params = array();
	$params = explode("/", $_GET['url']);

	//var_dump($params);
     $controller = ucwords($params[0]);
     
	//birincil olay parametresi
	if (isset($params[1]) && !empty($params[1]))
	{
		 $action = $params[1];
	}
	//id paremetresi için sorgu 
	if (isset($params[2]) && !empty($params[2]))
	{
		 $query = $params[2];
	}
}

$modelName = $controller; //modele de controllere giden isim verilir mvc modeli gereği
$controller .= '_Controller';//kontroller nasıl olacak 

$load = new $controller($modelName, $action);

if (method_exists($load, $action))
{
	
	//http://www.phpr.org/php-5-4-ile-gelen-yeni-ozellikler/
    $load->{$action}($query);
   
    //php 5.3 =<  uyumlu olsun istersek
    //$load->$action($query); 
   
    
}
else 
{
	die('Invalid method. Please check the URL.');
}

?>