<?php
session_start();


require_once("../../UTIL_PHP/variables_globales.php");
require_once("../../UTIL_PHP/armador_sql.php");

require_once("../../CONEXION/Conexion.php");
require_once("../DAO/DAOGestor.php");
require_once("config.php");



$elemento=$_POST['elemento'];
$imagen=$_POST['hay_imagen'];
unset($_POST['hay_imagen']);
unset($_POST['elemento']);




$partes_sql=fun_armar_campos_insert($GL_ELEMENTOS[$elemento],$_POST,$_FILES);



if($partes_sql['error']){
	echo json_encode($partes_sql);
}else{


	$data_elemento = new ArrayObject($partes_sql['data_elemento']);

	$DAOGestor=new DAOGestor();

	$resultado=$DAOGestor->fun_insert_elemento($GL_ELEMENTOS[$elemento]->nombre_tabla,$partes_sql['campos'],$partes_sql['valores']);

	

	if(!isset($resultado['id_insert']) || $resultado['id_insert']==0){

		$resultado['id_insert']=$_POST[$partes_sql['campo_id']];
	}



	if(!$resultado['error']){

			foreach($GL_ELEMENTOS[$elemento]->estructura_insert as $nombre_campo=>$atributos){

				switch ($atributos['tipo']) {
					case 'imagen':
						
						if($_FILES[$nombre_campo]['error'][0]==UPLOAD_ERR_OK){
						
										
							$archivo = new ArrayObject($_FILES[$nombre_campo]);
							$tipo_archivo = $archivo['type']; 

							$partes=explode("/",$tipo_archivo);

							$extension_original=$partes[1];
							$extension=$partes[1];

					   		if($extension=='gif'){
					   			$ext='jpeg';
					   		}else{		   			
					   			$ext=$extension;
					   		}
														
							$uploaddir = $atributos['dir'];						
							$nombre_img=$resultado['id_insert'].'_'.mt_rand(10000,20000);


							$valores_tam=array();

							foreach($atributos['detalles'] as $tipo=>$detalle){

								$valores_tam[$tipo]=array();
								$valores_tam[$tipo]['tam_ancho']=$detalle['ancho'];
								$valores_tam[$tipo]['tam_alto']=$detalle['alto'];
								$valores_tam[$tipo]['directorio']=$uploaddir.$detalle['dir'].'/';
								$valores_tam[$tipo]['nombre_final']=$nombre_img.".".$ext;
								$valores_tam[$tipo]['nombre_inicial']=$nombre_img.".".$extension;
							}


	/*
							$valores_tam['movil']=array();
							$valores_tam['movil']['tam_ancho']=300;
							$valores_tam['movil']['tam_alto']=300;
							$valores_tam['movil']['directorio']=$uploaddir.'/VISTA_PREVIA/MOVIL/';
							$valores_tam['movil']['nombre_final']=$nombre_img.".".$ext;
							$valores_tam['movil']['nombre_inicial']=$nombre_img.".".$extension;

							$valores_tam['mini']=array();
							$valores_tam['mini']['tam_ancho']=150;
							$valores_tam['mini']['tam_alto']=150;
							$valores_tam['mini']['directorio']=$uploaddir.'/VISTA_PREVIA/MINI/';
							$valores_tam['mini']['nombre_final']=$nombre_img.".".$ext;
							$valores_tam['mini']['nombre_inicial']=$nombre_img.".".$extension;*/

							$respuesta_img='error_archivo';


							include("subir_img_temp.php");

							$data_elemento[$nombre_campo]=$nombre_img.'.'.$ext;

							if($respuesta_img!='error_archivo'){
								$DAOGestor->fun_update_elemento($GL_ELEMENTOS[$elemento]->nombre_tabla,$nombre_campo.'="'.$nombre_img.'.'.$ext.'"',$partes_sql['campo_id'].'='.$resultado['id_insert']);
							}


						}else{

						}

				
						break;
					case 'archivo':

						//$nombre_campo='id_pdf';

						if($_FILES[$nombre_campo]['error'] == UPLOAD_ERR_OK){
															
							$archivo = new ArrayObject($_FILES[$nombre_campo]);
								
							$uploaddir = $atributos['dir'];	
							$nombre_archivo=$resultado['id_insert'].'_'.mt_rand(10000,50000);
													
							$respuesta_archivo='error_archivo';

							include("subir_archivo.php");

							$data_elemento['nombre_pdf']=$archivo['name'];

							$data_elemento['id_pdf']=$nombre_archivo.'.pdf';

							if($respuesta_archivo!='error_archivo'){
								$respuesta_archivo=$DAOGestor->fun_update_elemento($GL_ELEMENTOS[$elemento]->nombre_tabla,$atributos['campo_nombre'].'="'.$archivo['name'].'", '.$nombre_campo.'="'.$nombre_archivo.'.pdf"',$partes_sql['campo_id'].'='.$resultado['id_insert']);
							}

						}else{

							$data_elemento['nombre_pdf']='';
							$data_elemento['id_pdf']='';
						}



						break;
					

				}




			}

	
	}

	$resultado['campo_id']=$partes_sql['campo_id'];
	$data_elemento[$partes_sql['campo_id']]=$resultado['id_insert'];
	$resultado['elemento']=$data_elemento;

	
	echo json_encode($resultado);

}




?>

