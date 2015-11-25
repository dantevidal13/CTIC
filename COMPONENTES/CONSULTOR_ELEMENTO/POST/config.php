<?php
		

		
class COMP_TABLA{

	var $nombre_tabla='';
	var $estructura;
	
	function COMP_TABLA($nombre_tabla,$estructura_select,$condicion){
		$this->nombre_tabla=$nombre_tabla;

		$this->estructura_select=$estructura_select;
		$this->condicion=$condicion;

	}
}


$GL_ELEMENTOS=array();






$GL_ELEMENTOS['institucion']=new COMP_TABLA('info_institucion',
		array(   //nombre campo tipo elemento update
		    "id" => array('tipo'=>"id",'permiso'=>0),
		    "nombre" => array('tipo'=>"str",'permiso'=>0),
		    "direccion" => array('tipo'=>"str",'permiso'=>0),
		    "telefono" => array('tipo'=>"str",'permiso'=>0),
		    "web" => array('tipo'=>"str",'permiso'=>0),
		    "mail" => array('tipo'=>"str",'permiso'=>0),
		    "logo" => array('tipo'=>"str",'permiso'=>0),
		    "notas" => array('tipo'=>"str",'permiso'=>0)),""
		);




$GL_ELEMENTOS['programa']=new COMP_TABLA('tb_programa_academico',
		array(   //nombre campo tipo elemento update
		    "codigo" => array('tipo'=>"id",'permiso'=>0),
		    "id_tipo_programa" => array('tipo'=>"int",'permiso'=>0),
		    "nombre_programa" => array('tipo'=>"str",'permiso'=>0),
		    "id_unidad" => array('tipo'=>"str",'permiso'=>0),

		    "fecha_aprobacion" => array('tipo'=>"datetime",'subtipo'=>'fecha','permiso'=>0),
		    "nro_resolucion" => array('tipo'=>"str",'permiso'=>0),
		    "id_pdf_resolucion" => array('tipo'=>"str",'permiso'=>0),
		    "estado_programa" => array('tipo'=>"str",'permiso'=>0),
		    "created_at" => array('tipo'=>"str",'permiso'=>0),
		    "updated_at" => array('tipo'=>"str",'permiso'=>0)),"");
   


$GL_ELEMENTOS['plan_estudio']=new COMP_TABLA('tb_plan_estudio',
		array(   //nombre campo tipo elemento update
		    "codigo_plan" => array('tipo'=>"id",'permiso'=>0),

		    "nombre_plan_estudio" => array('tipo'=>"str",'permiso'=>0),
		    "id_programa" => array('tipo'=>"str",'permiso'=>0),
		    "fecha_aprobacion" => array('tipo'=>"datetime",'subtipo'=>'fecha','permiso'=>0),
		    "nro_resolucion" => array('tipo'=>"str",'permiso'=>0),
		    "id_pdf_resolucion" => array('tipo'=>"str",'permiso'=>0),
		    "estado" => array('tipo'=>"str",'permiso'=>0),
		    "metodologia" => array('tipo'=>"str",'permiso'=>0),
		    "nro_ciclos" => array('tipo'=>"str",'permiso'=>0),
		    "nro_creditos_obligatorios" => array('tipo'=>"str",'permiso'=>0),
		    "nro_creditos_electivos" => array('tipo'=>"str",'permiso'=>0),
		    "created_at" => array('tipo'=>"str",'permiso'=>0),
		    "updated_at" => array('tipo'=>"str",'permiso'=>0)),""
		);


$GL_ELEMENTOS['curso']=new COMP_TABLA('tb_cursos',
		array(   //nombre campo tipo elemento update
		    "codigo_curso" => array('tipo'=>"id",'permiso'=>0),

		    "nombre_curso" => array('tipo'=>"str",'permiso'=>0),
		    "metodologia" => array('tipo'=>"str",'permiso'=>0),

		    "modalidad" => array('tipo'=>"str",'permiso'=>0),

		    "nro_creditos" => array('tipo'=>"str",'permiso'=>0),

		    "created_at" => array('tipo'=>"str",'permiso'=>0),
		    "updated_at" => array('tipo'=>"str",'permiso'=>0)),""
		);
   

?>