 <?php
session_start();

require_once("../../CONEXION/Conexion.php");
		require_once("DAO.php");

		$DAOContacto=new DAOContacto();
	$objDatos = json_decode(file_get_contents("php://input"));

	
		$r=$DAOContacto->add_PA($objDatos->id);
		echo $r;


?>