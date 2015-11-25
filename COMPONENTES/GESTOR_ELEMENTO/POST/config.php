<?php
		

		
class COMP_TABLA{

	var $nombre_tabla='';
	var $estructura;
	
	function COMP_TABLA($nombre_tabla,$estructura_insert,$estructura_update){
		$this->nombre_tabla=$nombre_tabla;

		$this->estructura_insert=$estructura_insert;
		$this->estructura_update=$estructura_update;
	}
}


$GL_ELEMENTOS=array();




$GL_ELEMENTOS['institucion']=new COMP_TABLA('info_institucion',array(   //nombre campo tipo elemento update
		    "id" => array('tipo'=>"id",'subtipo'=>'auto','sesion'=>false,'obligatorio'=>false),

		    "nombre" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),
		    "direccion" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	
		    "telefono" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   
		    "web" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   
		    "mail" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   
		    "logo" => array('tipo'=>"imagen",'dir'=>'../../../IMG/INSTITUCION',  
		    	'detalles'=>array(
		    		'web'=>array('ancho'=>'original','alto'=>'original','dir'=>'/WEB'),
		    		'mini'=>array('ancho'=>100,'alto'=>100,'dir'=>'/MINI')
		    		),
		    	'sesion'=>false,'obligatorio'=>true),

		    "notas" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true))
		,array(   //nombre campo tipo elemento update
		    "id" => array('tipo'=>"id",'subtipo'=>'auto','sesion'=>false,'obligatorio'=>false),

		    "nombre" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),
		    "direccion" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	
		    "telefono" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   
		    "web" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   
		    "mail" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   
		    "logo" => array('tipo'=>"imagen",'dir'=>'../../../IMG/INSTITUCION',  
		    	'detalles'=>array(
		    		'web'=>array('ancho'=>'original','alto'=>'original','dir'=>'/WEB'),
		    		'mini'=>array('ancho'=>100,'alto'=>100,'dir'=>'/MINI')
		    		),
		    	'sesion'=>false,'obligatorio'=>false),

		    "notas" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>false))
		);






$GL_ELEMENTOS['programa']=new COMP_TABLA('tb_programa_academico',array(   //nombre campo tipo elemento update
		    "codigo" => array('tipo'=>"id",'subtipo'=>'str','sesion'=>false,'obligatorio'=>true),

		    "id_tipo_programa" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),

		    "nombre_programa" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),  

		    "id_unidad" => array('tipo'=>"str",'sesion'=>'cod_unidad','obligatorio'=>true),

		    "fecha_aprobacion" => array('tipo'=>"date",'sesion'=>false,'obligatorio'=>true),

		    "nro_resolucion" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "id_pdf_resolucion" => array('tipo'=>"archivo",'campo_nombre'=>'nombre_pdf_resolucion','dir'=>'../../../ARCHIVOS/PROGRAMAS/RESOLUCIONES/','sesion'=>false,'obligatorio'=>true),  

		    "estado_programa" => array('tipo'=>"bool",'sesion'=>false,'obligatorio'=>true),

		    "created_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true),
		    "updated_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true)
)
		,array(   //nombre campo tipo elemento update
		    
		    "codigo" => array('tipo'=>"id",'subtipo'=>'str','editable'=>false,'sesion'=>false,'obligatorio'=>false),

		    "id_tipo_programa" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),

		    "nombre_programa" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),  


		    "fecha_aprobacion" => array('tipo'=>"date",'sesion'=>false,'obligatorio'=>true),

		    "nro_resolucion" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "id_pdf_resolucion" => array('tipo'=>"archivo",'campo_nombre'=>'nombre_pdf_resolucion','dir'=>'../../../ARCHIVOS/PROGRAMAS/RESOLUCIONES/','sesion'=>false,'obligatorio'=>false),  

		    "estado_programa" => array('tipo'=>"bool",'sesion'=>false,'obligatorio'=>true),
		    "updated_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true))
		);







$GL_ELEMENTOS['plan_estudio']=new COMP_TABLA('tb_plan_estudio',array(   //nombre campo tipo elemento update
		    "codigo_plan" => array('tipo'=>"id",'subtipo'=>'str','sesion'=>false,'obligatorio'=>true),


		    "nombre_plan_estudio" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),  

		    "id_programa" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "fecha_aprobacion" => array('tipo'=>"date",'sesion'=>false,'obligatorio'=>true),

		    "nro_resolucion" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "id_pdf_resolucion" => array('tipo'=>"archivo",'campo_nombre'=>'nombre_pdf_resolucion','dir'=>'../../../ARCHIVOS/PLAN_ESTUDIOS/RESOLUCIONES/','sesion'=>false,'obligatorio'=>true),  

		    "estado" => array('tipo'=>"bool",'sesion'=>false,'obligatorio'=>true),

		    "metodologia" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "nro_ciclos" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),
		    "nro_creditos_obligatorios" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),
		    "nro_creditos_electivos" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),

		    "created_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true),
		    "updated_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true)
)
		,array(   //nombre campo tipo elemento update
		    "codigo_plan" => array('tipo'=>"id",'subtipo'=>'str','editable'=>false,'sesion'=>false,'obligatorio'=>true),


		    "nombre_plan_estudio" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),  

		    "id_programa" => array('tipo'=>"str",'editable'=>false,'sesion'=>false,'obligatorio'=>false),

		    "fecha_aprobacion" => array('tipo'=>"date",'sesion'=>false,'obligatorio'=>true),

		    "nro_resolucion" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "id_pdf_resolucion" => array('tipo'=>"archivo",'campo_nombre'=>'nombre_pdf_resolucion','dir'=>'../../../ARCHIVOS/PLAN_ESTUDIOS/RESOLUCIONES/','sesion'=>false,'obligatorio'=>false),  

		    "estado" => array('tipo'=>"bool",'sesion'=>false,'obligatorio'=>true),

		    "metodologia" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),
		    "nro_ciclos" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),
		    "nro_creditos_obligatorios" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),
		    "nro_creditos_electivos" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),


		    "updated_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true))
		);


$GL_ELEMENTOS['curso']=new COMP_TABLA('tb_cursos',array(   //nombre campo tipo elemento update
		    "codigo_curso" => array('tipo'=>"id",'subtipo'=>'str','sesion'=>false,'obligatorio'=>true),


		    "nombre_curso" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),  

		    "metodologia" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),
		    "modalidad" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "nro_creditos" => array('tipo'=>"float",'sesion'=>false,'obligatorio'=>true),



		    "created_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true),
		    "updated_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true)
)
		,array(   //nombre campo tipo elemento update
		    "codigo_curso" => array('tipo'=>"id",'subtipo'=>'str','editable'=>false,'sesion'=>false,'obligatorio'=>true),

		    "nombre_curso" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),  

		    "metodologia" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),
		    "modalidad" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),

		    "nro_creditos" => array('tipo'=>"float",'sesion'=>false,'obligatorio'=>true),

		    "updated_at" => array('tipo'=>"date",'now'=>true,'sesion'=>false,'obligatorio'=>true))
		);










/*
		    "foto" => array('tipo'=>"imagen",'dir'=>'../../../IMG',  
		    	'detalles'=>array(
		    		'web'=>array('ancho'=>'original','alto'=>'original','dir'=>'/FOTO')
		    		),
		    	'sesion'=>false,'obligatorio'=>true)
		    	*/

/*
$GL_ELEMENTOS['prueba']=new COMP_TABLA('prueba',array(   //nombre campo tipo elemento update
		    "id" => array('tipo'=>"id",'sesion'=>false,'obligatorio'=>false),

		    "radio" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),
		    "numero_select" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	
		    "texto" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   

		    "img_1" => array('tipo'=>"imagen",'dir'=>'../../../IMG',  
		    	'detalles'=>array(
		    		'web'=>array('ancho'=>500,'alto'=>500,'dir'=>'/WEB')
		    		),
		    	'sesion'=>false,'obligatorio'=>true),
		    "img_2" => array('tipo'=>"imagen",'dir'=>'../../../IMG',  
		    	'detalles'=>array(
		    		'web'=>array('ancho'=>300,'alto'=>300,'dir'=>'/WEB2')
		    		),
		    	'sesion'=>false,'obligatorio'=>true),
		    "img_3" => array('tipo'=>"imagen",'dir'=>'../../../IMG',  
		    	'detalles'=>array(
		    		'web'=>array('ancho'=>100,'alto'=>100,'dir'=>'/WEB3')
		    		),
		    	'sesion'=>false,'obligatorio'=>true),

		    "checar" => array('tipo'=>"bool",'sesion'=>false,'obligatorio'=>true))
		,array(   //nombre campo tipo elemento update
		    "id" => array('tipo'=>"id",'sesion'=>false,'obligatorio'=>false),

		    "radio" => array('tipo'=>"int",'sesion'=>false,'obligatorio'=>true),
		    "numero_select" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	
		    "texto" => array('tipo'=>"str",'sesion'=>false,'obligatorio'=>true),	   

		    "img_1" => array('tipo'=>"imagen",'sesion'=>false,'obligatorio'=>false),
		    "img_2" => array('tipo'=>"imagen",'sesion'=>false,'obligatorio'=>false),
		    "img_3" => array('tipo'=>"imagen",'sesion'=>false,'obligatorio'=>false),

		    "checar" => array('tipo'=>"bool",'sesion'=>false,'obligatorio'=>true))
		);
*/


//,		    "id_pdf" => array('tipo'=>"file",'sesion'=>false,'obligatorio'=>false)




?>