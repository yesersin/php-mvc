<?php 

	class Logger {
	
		public static function log($e){
			$err = 	"File : " . $e->getFile() . "\n".
					"Code : " . $e->getCode() . "\n".
					"Line : " . $e->getLine() . "\n".
					"Message : ". $e->getMessage() . "\n\n".
					"Trace : ".$e->getTraceAsString() ."\n".
					"------------------------------------------------------------------------------------";
			$errPaths = Application::config("PATHS");
			if ($errPaths){
				$file = Application::$Path . "/../". $errPaths["ERRORLOG"] . "/error_".date("m_Y").".log";
				file_put_contents($file, $err, FILE_APPEND | LOCK_EX);
			}
		}		
	}
	
	function DefaultErrorHandler($errno, $errstr, $errfile, $errline)
	{
		if (!(error_reporting() & $errno)) {
			// This error code is not included in error_reporting
			return;
		}
		
		switch ($errno) {
			case E_ERROR:
			case E_USER_ERROR:
				echo "<b>Error</b> [$errno] $errstr<br />\n";
				echo "  Tehlikeli bir hata Satır: $errline  Dosya: $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				exit();
			break;
			
			case E_WARNING:
			case E_USER_WARNING:
				echo "<b>Warning</b> [$errno] $errstr<br />\n";
				echo "  Bu satırda uygunsuz şeyler oldu $errline dosya $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			break;
			
			case E_NOTICE:
			case E_USER_NOTICE:
				echo "<b>NOTICE</b> [$errno] $errstr<br />\n";
				echo "  Lütfen kodu temiz yazalım notice olmaması lazım! <br /><br />Satır bilgileri : $errline  <br />Dosya: $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
				exit();
			break;

			default:
				echo "<b>UNKNOWN</b> [$errno] $errstr<br />\n";
				echo "  Bilinmeyen bir hata oluştu! <br /><br />Satır bilgileri : $errline  <br />Dosya: $errfile";
				echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
			break;
		}

		return true;
	}
	
	set_error_handler("DefaultErrorHandler");
?>