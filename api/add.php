 <?php
session_start();

		require_once("Conexion.php");
		require_once("DAO.php");

		$DAOContacto=new DAOContacto();
	//$objDatos = json_decode(file_get_contents("php://input"));
//var_dump($_POST);
var_dump($_FILES);

//echo json_encode($objDatos);
	
	//	$r=$DAOContacto->add_PA($objDatos->id);
	//	echo $r;


?>