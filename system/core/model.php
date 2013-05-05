<?php

class Model 
{
	protected $_db;
	protected $_sql;
	
	public function __construct()
	{
		$this->_db = Db::init();
	}
	
	protected function _setSql($sql)
	{
		$this->_sql = $sql;
	}
	
	public function getAll($data = null)
	{
		if (!$this->_sql)
		{
			throw new Exception("No SQL query!");
		}
		
		$sth = $this->_db->prepare($this->_sql);
		$sth->execute($data);
		return $sth->fetchAll();
	}
	
	public function getRow($data = null)
	{
		if (!$this->_sql)
		{
			throw new Exception("No SQL query!");
		}
		
		$sth = $this->_db->prepare($this->_sql);
		$sth->execute($data);
		return $sth->fetch();
	}
	
	///gelişecek 
	public function escapeString($string)
	{
		return mysql_real_escape_string($string);
	}
	
	public function escapeArray($array)
	{
		array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
		return $array;
	}
	
	public function to_bool($val)
	{
		return !!$val;
	}
	
	public function to_date($val)
	{
		return date('Y-m-d', $val);
	}
	
	public function to_time($val)
	{
		return date('H:i:s', $val);
	}
	
	public function to_datetime($val)
	{
		return date('Y-m-d H:i:s', $val);
	}
}