<?php


class Conexion 
{
	//SERVIDOR LOCAL
	//-------------------------------

 	var $bd = "pasepub_bd";
	
	var $servidor="localhost";
	var $user="pasepub_user";
	var $pass="paseillo123publicidad";

	


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