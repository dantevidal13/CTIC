<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once('../../CONEXION/Conexion.php');
require_once("../DAO/DAOLogin.php");
require_once("../../UTIL_PHP/verificacion.php");

$DAOLogin=new DAOLogin();

	if(valida_string_solo_letras_numeros($_POST['codigo_activacion'])  ){
			
		$respuesta=$DAOLogin->activar_cuenta($_POST['id_user'],$_POST['codigo_activacion']);	

		if($respuesta!='mysql_no'){

			if($respuesta['respuesta']=='activado'){

				$_SESSION['id']=$respuesta['id'];
				$_SESSION['id_fb']=$respuesta['id_fb'];
				$_SESSION['user']=$respuesta['correo'];
				$_SESSION['nombre']=$respuesta['nombre'];
				$_SESSION['id_img']=$respuesta['id_img'];
				$_SESSION['ext_img']=$respuesta['ext_img'];
				$_SESSION['presentacion']=$respuesta['presentacion'];
				$_SESSION['usuario_activo']=$respuesta['usuario_activo'];


			}

			echo $respuesta['respuesta'];

		}else{
			echo 'mysql_no';
		}

	}else{
		echo "no permitido";
	}


?>