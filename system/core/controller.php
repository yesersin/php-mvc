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
		$this->_view = new View(HOME . DS .APP_PATH. 'views' . DS . strtolower($this->_modelBaseName) . DS . $viewName . '.htm');
	}
}
