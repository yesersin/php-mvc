<?php

class Session_helper {

	function set($key, $val)
	{
		$_SESSION[$key] = $val;
	}
	
	function get($key)
	{
		///eğer boş bu dolumu buna bak boş geliyorsa hata gelsin  errolog a düşeblir trace donecek 
		//erp projesinin loggerına bak 
		if (!isset($_SESSION[$key]))
		{	
			echo "<span>".$key.'</span> olmayan bir degisken girdiniz';
			exit();
		}
		
		else 
		return $_SESSION[$key];
		//$_SESSION["zim"] = "Başka bir gezegenden bir istilacı.";
	}
	
	function destroy()
	{
		session_destroy();
	}

}

?>