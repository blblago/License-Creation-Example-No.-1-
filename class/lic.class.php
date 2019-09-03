<?php	

/**
 * @package    License Creation Example No. 1 
 * @author     Original Author <blblago@ukr.net>
 * @version    alpha beta
 * @link       https://vd-studio.in.ua
 * @copyright  2017-2019 {vd-studio}
*/

class lic {	

	private $licenseError;

	public function __construct(){		

		@$f = file_get_contents(LICENSE);			
		$license = unserialize(base64_decode($f));		
	
		if(!$license){
			$this->licenseError = 'Лицензия не найдена!';
			include(VIEW . "/license.tpl");
			exit();
		}
	
		if(count($license)!==3){
			$this->licenseError = 'Ошибка файла лицензии!';
			include(VIEW . "/license.tpl");	
			exit();
		}
			
		$server = $_SERVER['HTTP_HOST'] . "/";
		$server = str_replace('http://','',$server);
		$server = str_replace('www.','',$server);
		$server = substr($server,0,strpos($server,'/'));	
		
		if($license['domain']!==$server){
			$this->licenseError = 'Лицензия не соответствует домену!';
			include(VIEW . "/license.tpl");
			exit();
		}

		if($license['expirationDate']<date('Ymd')){
			$this->licenseError = 'Срок действия лицензии истек!';
			include(VIEW . "/license.tpl");
			exit();
		}

		if($license['sign']!==md5($license['domain'].$license['expirationDate']."b7g79asdrig8aos7y546461nbguyvy6UTRFVhsfd")){
			$this->licenseError = 'Неверная подпись лицензии!';
			include(VIEW . "/license.tpl");	
			exit();
		}

	}
}	

$license = new lic();

?>