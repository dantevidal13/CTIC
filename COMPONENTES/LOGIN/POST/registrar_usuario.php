<?php

	session_start();

				
				

	if(!isset($_SESSION['user'])){

		header('Access-Control-Allow-Origin: *');
		require('../../CONEXION/Conexion.php');
		require('../DAO/DAOLogin.php');
		require('config.php');

		$DAOLogin=new DAOLogin();

		$consulta=$DAOLogin->es_usuario($_POST['correo']);

		if($consulta=='no'){

			$config=new COMP_LOGIN_CONFIG();


			if($config->activar_usuario){ 
				
				$codigo_activacion=mt_rand(10000,90000).mt_rand(10000,90000).mt_rand(10000,90000);
			}else{
				$codigo_activacion=0;
			}


			$respuesta=$DAOLogin->registrar_usuario($_POST['correo'],$_POST['password'],$codigo_activacion,$config->activar_usuario);


			if($respuesta!='mysql_no'){

				$_SESSION['user']=$_POST['correo'];
				$_SESSION['nombre']='Nuevo Usuario';


				if($config->activar_usuario){ //se tiene que activar al usuario, entonces se el valor de la variable de sesión se inicializa en falso para que sea activada luego
					$_SESSION['user_activo']=false;

					require_once("../../UTIL_PHP/phpmailer/class.phpmailer.php");
				
					$mail=new PHPMailer();
					$mail->Mailer="smtp";
					$mail->IsSMTP();
					$mail->Helo = $config->dir_pagina; //Muy importante para que llegue a hotmail y otros
					$mail->SMTPAuth=true;
					$mail->Host = $config->host_mail;
					$mail->Port=25; //depende de lo que te indique tu ISP. El default es 25, pero nuestro ISP lo tiene puesto al 26
					$mail->Username = $config->user_mail;
					$mail->Password=$config->pass_user_mail;
					$mail->From=$config->dir_correo_emisor;
					$mail->FromName=$config->nombre_pagina;
					$mail->Timeout=60;
					$mail->IsHTML(true);
					//Enviamos el correo
					//$mail->AddAddress($GL_USER_MAIL); 
					$mail->AddAddress($_POST['correo']); //direccion de destino
					$mail->Subject= $config->nombre_pagina.' te da la bienvenida - Validar tu cuenta';
					
					$mail->Body='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />			 
							<html>
							
							<body>
													
							<table>
								<tr>
									<td width="750px" style="padding-left:20px;font-size:40px;font-weight:bold;color:white;background:'.$config->color_cab_correo.';height:55px;padding-top:5px;">'.$config->nombre_pagina.'</td>
								</tr>
							</table>
							
							<table width="600px">
								<tr>
									<td width="30px"> </td><td width="585px"  style="height:15px;"></td>
									</tr>
									
									<tr>
									<td width="30px"> </td><td width="">Hola, te damos la bienvenida a '.$config->nombre_pagina.'.</td>
									</tr>
									
									<tr>
									
									<td width=""></td><td width="">
									<br/>
									<br/><br/>
									<b><h3>Activaci&oacute;n de tu cuenta</h3></b><br/>
									Activa tu cuenta <a href="http://'.$config->dir_pagina.'/index.php?id='.$respuesta.'&cod='.$codigo_activacion.'" target="blank">haciendo click aqu&iacute;</a>
									<br/>
									<br/>
									<b>Tu nombre de usuario es:  <h3>'.$_POST['correo'].' </h3>
									<br/>
									Tu contrase&ntilde;a es:  <h3>'.$_POST['password'].'</h3></b>


									<br><br>'.$config->mensaje_registro.'
									<br><br/>					
								</td>
							
							</tr>
							
								<tr>
									<td width="30px"> </td><td width=""  style="height:15px;"></td>
									</tr>
							</table>
							
							
							<table>
								<tr>
									<td width="750px" style="padding-left:20px;background-color:#EEE; height:15px; padding-top:5px; border-bottom:1px solid #DDD ;border-top:1px solid #DDD ;" > </td>
								</tr>
							</table>
							
							
							</body>
							</html>';

					

					
					//$mail->AltBody="Texto que debe decir lo mismo que el Body, pero sin etiquetas HTML";
					$mail->Send();	
					
				}
				


				$resultado=array("error"=>false,'detalle'=>'ok_registro');
				echo json_encode($resultado);
			}else{

				$resultado=array("error"=>true,'detalle'=>'mysql_no');
				echo json_encode($resultado);
			}


			
		}else{
			
			$resultado=array("error"=>true,'detalle'=>'existe_user');
			echo json_encode($resultado);
		}


	}
?>