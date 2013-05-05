<?php

class Controller
{
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_view;
	protected $_modelBaseName;
	
	public function __construct($model, $action)
	{
		$this->_controller = ucwords(__CLASS__);
		$this->_action = $action;
		$this->_modelBaseName = $model;
		
		$this->_view = new View(HOME . DS .APP_PATH. 'views' . DS . strtolower($this->_modelBaseName) . DS . $action . '.htm');
	}
	
	protected function _setModel($modelName)
	{
		$modelName .= '_Model';
		$this->_model = new $modelName();
	}
	
	protected function _setView($viewName)
	{
		$this->_view = new View(HOME.DS.APP_PATH. 'views' . DS . strtolower($this->_modelBaseName) . DS . $viewName . '.htm');
	}
	
	
	//yeni ekledim
	protected function loadView($name)
	{
		$view = new View($name);
		return $view;
	}
	
	protected function loadPlugin($name)
	{
		require(APP_DIR .'plugins/'. strtolower($name) .'.php');
	}
	
	protected function loadHelper($name)
	{
		require(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	protected function redirect($loc)
	{
		global $config;
	
		header('Location: '. $config['base_url'] . $loc);
	}
}
