<?php

	session_start();

	if(!isset($_SESSION['user'])){

		header('Access-Control-Allow-Origin: *');
		require('../../CONEXION/Conexion.php');
		require('../DAO/DAOLogin.php');

		$DAOLogin=new DAOLogin();

		$consulta=$DAOLogin->logear_con_id_fb($_POST['user']);

		if($consulta=='no user'){
			$consulta=$DAOLogin->registrar_usuario_fb($_POST['user'],$_POST['nombre'],$_POST['correo']);

		}

		$_SESSION['user']=$_POST['user'];
		$_SESSION['nombre']=$_POST['nombre'];

	}
?>

