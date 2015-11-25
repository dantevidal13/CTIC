<?php


class Conexion 
{
	//SERVIDOR LOCAL
	//-------------------------------


/*
 	var $bd = "dantejef_ctic";
	
	var $servidor="localhost";
	var $user="dantejef_ctic";
	var $pass="123456";
*/


 	var $bd = "postgrado_uni";
	
	var $servidor="localhost";
	var $user="root";
	var $pass="root";


	function Conexion(){
		//$cn = mysql_connect($this->servidor_localhost,$this->user_localhost,$this->pass_localhost);
		$cn = new mysqli($this->servidor, $this->user, $this->pass,$this->bd);
		//$result = $cn;
		if (mysqli_connect_errno()) {
			return "no_conexion";
		}else{
			$cn->set_charset("utf8");		
			return $cn;			
		}

		
	}

	function close($cn){
		mysqli_close($cn);
		
	}

}

?>