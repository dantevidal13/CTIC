<?php
session_start();

require_once("../../CONEXION/Conexion.php");
require_once("DAO.php");

$DAOContacto=new DAOContacto();

$r=$DAOContacto->get();
if($r){
	$salida= json_encode($r);
	echo $salida;
}else{
	print 'no data';
}

?>
