<?php

class DAOContacto extends Conexion{

	function get(){
				$cn = $this->conexion();
				 if($cn!='no_conexion'){
		 				$rs = $cn->query('BEGIN');
			try{
				$sql='SELECT * from PA';
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

				$sql='INSERT INTO pa (`codigo`, `nombre`, `fecha`, `resolucion`, `estado`) values ("qweqw","'.$id->name.'","'.$id->fecha.'","'.$id->numero.'","activo")';
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
