<?php
session_start();
header('Access-Control-Allow-Origin: *');
require_once("../../CONEXION/Conexion.php");
require_once("../DAO/DAOLogin.php");
require_once("../../UTIL_PHP/verificacion.php");
require_once("../../UTIL_PHP/variables_globales.php");

require_once("../../UTIL_PHP/phpmailer/class.phpmailer.php");
require('config.php');

$DAOLogin=new DAOLogin();

	
	
		$respuesta=$DAOLogin->solicitar_password($_POST['correo']);	
			
		if($respuesta!='mysql_no'){

				$config=new COMP_LOGIN_CONFIG();

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
				$mail->Subject= $config->nombre_pagina.' - Solicitud de Password';
				
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
								<td width="30px"> </td><td width="">Hola, te hemos enviado tu contrase&ntilde;a.</td>
								</tr>
								
								<tr>
								
								<td width=""></td><td width="">
								<br/>
								<br/><br/>
								<b><h3>Tu contrase&ntilde;a es</h3></b><br/>
								'.$respuesta->password.'
								<br/>
								<br/>

								<br><br>Este mensaje ha sido enviado solo a ti. El derecho de solicitar la contrase&ntilde;a se reserva solo para el titular del correo electr&oacute;nico registrado.
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
				

				echo "enviado";
			
		}else{
			echo 'mysql_no';
		}
			
		


?>