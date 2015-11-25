<?php

class DAOContacto extends Conexion{

	function get(){
				$cn = $this->conexion();
				 if($cn!='no_conexion'){
		 				$rs = $cn->query('BEGIN');
			try{
				$sql='select * from PA';
				$rs = $cn->query($sql);

			$respuesta=array();
			while($fila=mysqli_fetch_object($rs)){
					$respuesta[]=$fila;
				}

				$cn->query('COMMIT');
				mysqli_close($cn);
 			 return $respuesta;

			}catch(Exception $ex){

				$cn->query('ROLLBACK');
				mysqli_close($cn);

				return 'mysql_no';
			}
		}else{
			return 'mysql_no';
		}
	}

	function eliminar_PA($id){
		
		$cn = $this->conexion();
		
		 if($cn!='no_conexion'){
			$rs = $cn->query('BEGIN');
			
			try{


				$sql='DELETE FROM pa WHERE codigo = "'.$id.'"';

				$rs = $cn->query($sql);
							
				$cn->query('COMMIT');
				mysqli_close($cn);
				
				return 'mysql_si'.$sql;
				
	
			}catch(Exception $ex){
				
				$cn->query('ROLLBACK');
				mysqli_close($cn);
				
				return 'mysql_no';
				
			}
		}else{
		return 'mysql_no';
		}
	}	

	function add_PA($id){
		//falta modificar la base de datos y el codigo falta asignarle unico
		
			$cn = $this->conexion();
		
		 if($cn!='no_conexion'){
			$rs = $cn->query('BEGIN');
			
			try{

				//obtener la facultad via ususario a agregar...
				//

				//$id->tipo=="maestria"
				$codigo= substr($id->tipo, 0, 2)."-".substr($id->facultad, -3)."-".rand(1000,9999);  

				// definir si esl programa esta activo!!
				if ( $id->inactivo == "inactivo" ){
					 $actividad="inactivo";
				}else{ $actividad="activo";}

				//guardar archivo pdf en el servidor
				$rr=move_uploaded_file($id->pdf, "oli.pdf");
				var_dump($rr);


				$sql='INSERT INTO pa (`codigo`, `tipo`, `nombre`, `facultad`, `fecha`, `resolucion`, `estado`) values ("'.$codigo.'","'.$id->tipo.'","'.$id->name.'","'.$id->facultad.'","'.$id->fecha.'","'.$id->numero.'","'.$actividad.'")';
				$rs = $cn->query($sql);
		
				$cn->query('COMMIT');
				mysqli_close($cn);
			return "todo OK";
				
	
			}catch(Exception $ex){
				
				$cn->query('ROLLBACK');
				mysqli_close($cn);
				
				return 'mysql_no';
				
			}
		}else{
			return 'mysql_no';
		}
	}	


}
?>
