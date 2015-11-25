<?php
session_start();

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 360000);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(360000);

require_once("../../CONEXION/Conexion.php");
require_once("../DAO/DAOLogin.php");
require_once("../../UTIL_PHP/verificacion.php");
require_once("../../UTIL_PHP/variables_globales.php");

$logeo=new DAOLogin();



if(empty($_POST['correo'])){
	$resultado=array("error"=>true,'detalle'=>'sin_user');
}else{
	if(empty($_POST['password'])){
		$resultado=array("error"=>true,'detalle'=>'sin_password');
	}else{
		
		if((valida_string_correo($_POST['correo'])==1 || valida_string_alias($_POST['correo'])==1) && valida_string_tipo_password($_POST['password'])==1){
									
			$resultado=$logeo->logear($_POST['correo'],$_POST['password']);
			
			if( $resultado['detalle']=="ok_sesion"){
										
				$_SESSION['id']=$resultado['id'];
				$_SESSION['id_fb']=$resultado['id_fb'];
				$_SESSION['user']=$resultado['correo'];
				$_SESSION['nombre']=$resultado['nombre'];
				$_SESSION['id_img']=$resultado['id_img'];
				$_SESSION['ext_img']=$resultado['ext_img'];
				$_SESSION['presentacion']=$resultado['presentacion'];
				$_SESSION['usuario_activo']=$resultado['usuario_activo'];
				
			}

		}else{

			$resultado=array("error"=>true,'detalle'=>'mysql');
		}
	}
}


	echo json_encode($resultado);

?>