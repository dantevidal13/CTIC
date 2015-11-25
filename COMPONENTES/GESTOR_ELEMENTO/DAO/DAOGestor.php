<?php

class DAOGestor extends Conexion{
	
	function fun_insert_elemento($nombre_tabla,$campos,$valores){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{
		        $sql='insert into '.$nombre_tabla.' ('.$campos.') values ('.$valores.')';


		      
				$cn->query($sql);



        	    $msj_error=mysqli_error($cn);
        	    if(strpos(mysqli_error($cn), 'Duplicate entry')=== false){

		      	    $id_insert= $cn->insert_id;

					$cn->query('COMMIT');


					mysqli_close($cn);
					
					return array("error"=>false, "id_insert"=>$id_insert);


        	    }else{

        	    	$sql = 'SHOW COLUMNS FROM '.$nombre_tabla;
					$rs=$cn->query($sql);
		                $columns = array();
		                while($result = mysqli_fetch_assoc($rs)):
		                    $columns[] = $result['Field'];
		                endwhile;

		            $indice=explode('for key ',$msj_error);
		            $indice=$indice[1];

					return array("error"=>true,'detalle'=>'duplicado','campo'=>$columns[$indice-1]);		

        	    }
				
				


				
			}catch(Exception $ex){
		      	             
				$cn->query('ROLLBACK');
				mysqli_close($cn);
				
				return array("error"=>true,'detalle'=>'mysql');				
			}			
		
		}else{
			return array("error"=>true,'detalle'=>'mysql');	
		}
	}		




	function fun_update_elemento($nombre_tabla,$cambios,$condicion){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{
		        $sql='update '.$nombre_tabla.' set '.$cambios.' where '.$condicion;
	
	
	
				$cn->query($sql);	
        	         
	      	    $numero_registros= $cn->affected_rows;

				$cn->query('COMMIT');
		       	

				mysqli_close($cn);


				return array("error"=>false, "numero_registros"=>$numero_registros);
			
			}catch(Exception $ex){
		      	             
				$cn->query('ROLLBACK');	
				mysqli_close($cn);
				
				return array("error"=>true,'detalle'=>'mysql');					
			}			
		
		}else{
			return array("error"=>true,'detalle'=>'mysql');	
		}
	}	


	function fun_delete_elemento($nombre_tabla,$condicion){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{
		        $sql='delete from '.$nombre_tabla.' where '.$condicion;
		     	
		     	$cn->query($sql);
        	         
	      	    $numero_registros= $cn->affected_rows;

				$cn->query('COMMIT');
		       	
				mysqli_close($cn);
				return array("error"=>false, "numero_registros"=>$numero_registros);
			
			}catch(Exception $ex){
		      	             
				$cn->query('ROLLBACK');	
				mysqli_close($cn);
				
				return array("error"=>true,'detalle'=>'mysql');				
			}			
		
		}else{
			return array("error"=>true,'detalle'=>'mysql');	
		}
	}	


	function fun_select_elemento($nombre_tabla,$campos_get,$condicion,$orderby,$inicio,$numero){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{

				$limitacion='';
				if($numero>0){
					$limitacion=' limit '.$inicio.','.$numero;
				}

		        $sql='select '.$campos_get.' from '.$nombre_tabla.' where '.$condicion.$orderby.$limitacion;		     	

		     	$rs=$cn->query($sql);

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
			return "mysql_no";
		}
	}	


	
}

?>