<?php

require_once("../../UTIL_PHP/verificacion.php");

	function fun_armar_campos_insert($elemento,$valores,$archivos){

		$info_error=array("error"=>false);	
		$data_elemento=array();
		$campo_id='';

		foreach($archivos as $campo=>$archivo){

			if($elemento->estructura_insert[$campo]['obligatorio'] && $archivo['error'] !== UPLOAD_ERR_OK){

				if($archivo['error']==4){
					
					$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>'vacio');

				}else{

					$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>'error_subida');

				}
				break;

			}
		}

		if($info_error['error']){

			return $info_error;
		}else{

			$campos='';
			$vals='';




		foreach ( $elemento->estructura_insert as $campo=>$atributos){


				if($atributos['tipo']=='id' ){
					$campo_id=$campo;
					$tipo_id=$atributos['subtipo'];
				}

				if(  $atributos['tipo']!='archivo' &&  $atributos['tipo']!='imagen'){
//$atributos['tipo']!='id' &&
					$data_elemento[$campo]=$valores[$campo];
					$bandera=false;


				if($atributos['obligatorio']){

					if(is_string($atributos['sesion'])){

						if($campos==''){
							$campos.=$campo;
						}else{
							$campos.=','.$campo;
						}

						$bandera=true;

						//si no es falso, debemos usar la sesion
						$valores[$campo]=$_SESSION[$atributos['sesion']];


					}else{


						if(!fun_esblanco($valores[$campo]) || (($atributos['tipo']=='int' || $atributos['tipo']=='bool'  || $atributos['tipo']=='float') && $valores[$campo]==0 ) || ($atributos['tipo']=='date' && $atributos['now']) ){

							$bandera=true;
							if($campos==''){
								$campos.=$campo;
							}else{
								$campos.=','.$campo;
							}
						}else{
							//si no admite vacio y ademas esta en blanco, entonces debemos avisar que hay error	
							
							$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>'vacio');

						}


					}

				}else{

					if(!fun_esblanco($valores[$campo]) || (($atributos['tipo']=='int' || $atributos['tipo']=='float') && $valores[$campo]==0 ) || ($atributos['tipo']=='date' && $atributos['now']) ){

						$bandera=true;
						if($campos==''){
							$campos.=$campo;
						}else{
							$campos.=','.$campo;
						}
					}
				}




				if($info_error['error']){
					break;
				}else{

				if($bandera){
					

					switch($atributos['tipo']){

						case 'id': 
							switch($atributos['subtipo']){
								case 'auto': 
								break;
								case 'str': 

									if(is_string($valores[$campo])){
										if($vals==''){
											$vals.='"'.$valores[$campo].'"';
										}else{
											$vals.=',"'.$valores[$campo].'"';
										}
									}else{
										
										
										$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
									}

								break;
								case 'int':

									if(is_string($valores[$campo])){
										if($vals==''){
											$vals.=$valores[$campo];
										}else{
											$vals.=','.$valores[$campo];
										}
									}else{																				
										$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
									}

							 	break;
							}
							
						break;
 

						case 'str': 

							if(is_string($valores[$campo])){
								if($vals==''){
									$vals.='"'.$valores[$campo].'"';
								}else{
									$vals.=',"'.$valores[$campo].'"';
								}
							}else{
								
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;
 
						case 'bool': 


							if(strtolower($valores[$campo])=='true' || strtolower($valores[$campo])=='false'|| strtolower($valores[$campo])=='1' || strtolower($valores[$campo])=='0'){
							
							
								if($vals==''){
									$vals.=$valores[$campo];
								}else{
									$vals.=','.$valores[$campo];
								}	
							}else{
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;
						case 'int': 

							if(is_numeric($valores[$campo])){
								$valores[$campo]=(int)$valores[$campo];
								if($vals==''){
									$vals.=$valores[$campo];
								}else{
									$vals.=','.$valores[$campo];
								}	
							}else{
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;


						case 'float': 
						
							if(is_numeric($valores[$campo])){
								$valores[$campo]=(float)$valores[$campo];
								if($vals==''){
									$vals.=$valores[$campo];
								}else{
									$vals.=','.$valores[$campo];
								}
							}else{
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						
						break;

						case 'date':
						
							if($valores[$campo]=='now' || $atributos['now']){
								if($vals==''){
									$vals.='now()';
								}else{
									$vals.=',now()';
								}
							}else{
								if(valida_string_tipo_fecha_hora($valores[$campo])){
									if($vals==''){
										$vals.='"'.$valores[$campo].'"';
									}else{
										$vals.=',"'.$valores[$campo].'"';
									}
								}else{
									
									$info_error=array("error"=>true, "campo"=>$campo,"detalle"=>$atributos['tipo']);	
								}
							}
						break;
					}
		
				}
					if($info_error['error']){
						break;
					}

				}
			}





		}


			if($info_error['error']){
				return $info_error;
			}else{
				return array("error"=>false, "campos"=>$campos,"valores"=>$vals,"campo_id"=>$campo_id,"tipo_id"=>$tipo_id,"data_elemento"=>$data_elemento);

			}
		
		}
	}






	function fun_armar_campos_update($elemento,$valores,$archivos){

		$info_error=array("error"=>false);	
		$data_elemento=array();
		$campo_id='';


		foreach($archivos as $campo=>$archivo){

			if($elemento->estructura_update[$campo]['obligatorio'] && $archivo['error'] !== UPLOAD_ERR_OK){

				if($archivo['error']==4){

					$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>'vacio');

				}else{

					$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>'error_subida');

				}
				break;

			}
		}



		if($info_error['error']){

			return $info_error;

		}else{

			$campos='';
			$set='';

		



		foreach ( $elemento->estructura_update as $campo=>$atributos){


				if($atributos['tipo']=='id' ){
					$campo_id=$campo;
					$tipo_id=$atributos['subtipo'];
				}


			if( $atributos['tipo']!='archivo' &&  $atributos['tipo']!='imagen'){
//$atributos['tipo']!='id'  && 
				
				$data_elemento[$campo]=$valores[$campo];
				
				$bandera=false;

				if($atributos['obligatorio']){

					if(is_string($atributos['sesion'])){

						

						$bandera=true;

						//si no es falso, debemos usar la sesion
						$valores[$campo]=$_SESSION[$atributos['sesion']];


					}else{

						if(!fun_esblanco($valores[$campo]) || (($atributos['tipo']=='int' || $atributos['tipo']=='float' || $atributos['tipo']=='bool') && $valores[$campo]==0 ) || ($atributos['tipo']=='date' && $atributos['now']) ){

							$bandera=true;
							
						}else{
							//si no admite vacio y ademas esta en blanco, entonces debemos avisar que hay error	
											
							$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>'vacio');

						}


					}

				}else{

					if(!fun_esblanco($valores[$campo]) || (($atributos['tipo']=='int' || $atributos['tipo']=='float') && $valores[$campo]==0 ) || ($atributos['tipo']=='date' && $atributos['now']) ){

						$bandera=true;
					
					}
				}




				if($info_error['error']){
					break;
				}else{

				if($bandera){
					

					switch($atributos['tipo']){

						case 'id': 
							if($atributos['editable']){

								switch($atributos['subtipo']){
									case 'auto': 
									break;
									case 'str': 

										if(is_string($valores[$campo])){
											if($set==''){
												$set.=$campo.'="'.$valores[$campo].'"';
											}else{
												$set.=','.$campo.'="'.$valores[$campo].'"';
											}
										}else{
											
											
											$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
										}

									break;
									case 'int':

											
										if(is_numeric($valores[$campo])){
											$valores[$campo]=(int)$valores[$campo];
											if($set==''){
												$set.=$campo.'='.$valores[$campo];
											}else{
												$set.=','.$campo.'='.$valores[$campo];
											}	
										}else{
											
											$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
										}

								 	break;

								}

							}
							
						break;



						case 'str': 

							if(is_string($valores[$campo])){
								if($set==''){
									$set.=$campo.'="'.$valores[$campo].'"';
								}else{
									$set.=','.$campo.'="'.$valores[$campo].'"';
								}
							}else{
								
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;

						case 'blob': 

							if(is_string($valores[$campo])){
								if($set==''){
									$set.=$campo.'=aes_encrypt("'.$valores[$campo].'","'.$atributos['key_encrypt'].'")';
								}else{
									$set.=','.$campo.'=aes_encrypt("'.$valores[$campo].'","'.$atributos['key_encrypt'].'")';
								}
							}else{
								
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;

						case 'bool': 



							if(strtolower($valores[$campo])=='true' || strtolower($valores[$campo])=='false'|| strtolower($valores[$campo])=='1' || strtolower($valores[$campo])=='0'){
							
							
								if($set==''){
									$set.=$campo.'='.$valores[$campo];
								}else{
									$set.=','.$campo.'='.$valores[$campo];
								}	
							}else{
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;

						case 'int': 

							if(is_numeric($valores[$campo])){
								$valores[$campo]=(int)$valores[$campo];
								if($set==''){
									$set.=$campo.'='.$valores[$campo];
								}else{
									$set.=','.$campo.'='.$valores[$campo];
								}	
							}else{
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						break;


						case 'float': 
						
							if(is_numeric($valores[$campo])){
								$valores[$campo]=(float)$valores[$campo];
								if($set==''){
									$set.=$campo.'='.$valores[$campo];
								}else{
									$set.=','.$campo.'='.$valores[$campo];
								}
							}else{
								
								$info_error=array("error"=>true,"campo"=>$campo,"detalle"=>$atributos['tipo']);
							}
						
						break;

						case 'date':
						
							if($valores[$campo]=='now' || $atributos['now']){
								if($set==''){
									$set.=$campo.'=now()';
								}else{
									$set.=','.$campo.'=now()';
								}
							}else{
								if(valida_string_tipo_fecha_hora($valores[$campo])){
									if($set==''){
										$set.=$campo.'="'.$valores[$campo].'"';
									}else{
										$set.=','.$campo.'="'.$valores[$campo].'"';
									}
								}else{
									
									$info_error=array("error"=>true, "campo"=>$campo,"detalle"=>$atributos['tipo']);	
								}
							}
						break;
					}
		
				}
					if($info_error['error']){
						break;
					}

				}
			}





		}

			if($info_error['error']){
				return $info_error;
			}else{
				return array("error"=>false,"set"=>$set,"campo_id"=>$campo_id,"tipo_id"=>$tipo_id,"data_elemento"=>$data_elemento);

			}	
		}
	}
	



	function fun_armar_campos_select($elemento){

		
		$campos='';
		
		$info_error=array("error"=>false);	

		$campo_id='';
		foreach ( $elemento->estructura_select as $campo=>$atributos){

			switch($atributos['tipo']){
				case 'id':
					$campo_id=$campo;
				break;

			}

			if($atributos['tipo']=='datetime'){

				if($atributos['subtipo']=='fecha'){


					if($campos==''){
						$campos.='date('.$campo.') as '.$campo;
					}else{
						$campos.=',date('.$campo.') as '.$campo;
					}

				}else{

					if($atributos['subtipo']=='hora'){

						if($campos==''){
							$campos.='hour('.$campo.') as '.$campo;
						}else{
							$campos.=',hour('.$campo.') as '.$campo;
						}

					}else{
						

						if($campos==''){
							$campos.=$campo;
						}else{
							$campos.=','.$campo;
						}

					}

				}

			}else{

				if($campos==''){
					$campos.=$campo;
				}else{
					$campos.=','.$campo;
				}
			}

			
		}
		return array("error"=>false, "campos"=>$campos, "campo_id"=>$campo_id);
	}


	
?>