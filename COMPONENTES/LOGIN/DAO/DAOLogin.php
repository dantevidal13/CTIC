<?php

class DAOLogin extends Conexion{
	
	function logear_con_id_fb($id_fb){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{
		        $sql="select * from grl_tbl_users where id='$id_fb'";
		     
				$rs = $cn->query($sql);
        		if(mysqli_num_rows($rs)>0){
        			$respuesta=mysqli_fetch_object($rs);
        		}else{
        			$respuesta='no user';
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
	
	function registrar_usuario_fb($id_fb,$nombre,$correo){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{
	        	
		        $sql='insert into grl_tbl_users (id_fb,nombre,correo,usuario_activo) values ("'.$id_fb.'","'.$nombre.'","'.$correo.'",true)';
		       	
				$cn->query($sql);
	      	             
				$cn->query('COMMIT');
		       	
				mysqli_close($cn);
				return 'mysql_si';
			
			}catch(Exception $ex){
		      	             
				$cn->query('ROLLBACK');	
				mysqli_close($cn);
				
				return 'mysql_no';				
			}			
		
		}else{
			return "mysql_no";
		}
	}	

	
	function logear($correo,$password){  //AKI FALTA DEFINIR Q ES LO Q SE NECESITA DEL ALUMNO
  
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
									
				$sql='select * from grl_tbl_users where correo="'.$correo.'"';
				

				$rs=$cn->query($sql);
		        		        
		        if(mysqli_num_rows($rs)>0){
		        			        		
		        	$sql='select * from grl_tbl_users where correo="'.$correo.'" and password=AES_ENCRYPT("'.$password.'","123") and id_fb is NULL';
				
					$rs=$cn->query($sql);


			        if(mysqli_num_rows($rs)>0){
			        	$fila=mysqli_fetch_object($rs);

						$respuesta=array();
						$respuesta['error']=false;
						$respuesta['id']=$fila->id;
						$respuesta['id_fb']=$fila->id_fb;
						$respuesta['nombre']=$fila->nombre;
						$respuesta['correo']=$fila->correo;
						$respuesta['id_img']=$fila->id_img;
						$respuesta['ext_img']=$fila->ext_img;
						$respuesta['usuario_activo']=$fila->usuario_activo;
						$respuesta['presentacion']=$fila->presentacion;
						$respuesta['detalle']='ok_sesion';

				      			       		
			        }else{
			        	
						$respuesta['error']=true;
						$respuesta['detalle']='no_pass';
			        }
				      			       		
		        }else{
		        	
					$respuesta['error']=true;
					$respuesta['detalle']='no_user';
		        }
		        		        		       	
				$cn->query('COMMIT');
		        mysqli_close($cn);
				return $respuesta;
				
			}catch(Exception $ex){
				       	
				$cn->query('ROLLBACK'); 
				mysqli_close($cn);
				
				$respuesta['error']=true;
				$respuesta['detalle']='mysql';
					
				return $respuesta;
				
			}	
		
		}else{
			$respuesta['error']=true;
			$respuesta['detalle']='mysql';
			
			return $respuesta;
		}
    }


	function registrar_usuario($correo,$password,$cod_activacion,$activar_usuario){ //INGRESA UN NUEVO PADRE 
		
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        	        
			$cn->query('BEGIN');
			try{
	        	
	        	if($activar_usuario){  //si se debe activar al usuario, entonces el estado es falso
	        		$estado=0;
	        	}else{
	        		//si no es necesario entonces está activo el usuario
	        		$estado=1;
	        	}
	        	
		        $sql='insert into grl_tbl_users (nombre,correo,password,cod_activacion,usuario_activo) values ("Nuevo Usuario","'.$correo.'",AES_ENCRYPT("'.$password.'","123"),"'.$cod_activacion.'",'.$estado.')';
		       	
				$cn->query($sql);
	      	             
	      	    $id= $cn->insert_id;

				$cn->query('COMMIT');
		       	
				mysqli_close($cn);
				return $id;
			
			}catch(Exception $ex){
		      	             
				$cn->query('ROLLBACK');	
				mysqli_close($cn);
				
				return 'mysql_no';				
			}			
		
		}else{
			return "mysql_no";
		}
	}	


    function es_usuario($correo){

        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
									
				$sql='select correo from grl_tbl_users where correo="'.$correo.'"';
				
				$rs=$cn->query($sql);
		        		        
		        if(mysqli_num_rows($rs)>0){
		        			        	
			      	$respuesta="si";
			      			       		
		        }else{
		        	
		        	$respuesta ='no';
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
    

    function activar_cuenta($id_usuario,$codigo_activacion){

        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
									
				$sql='update grl_tbl_users set usuario_activo=1 where id='.$id_usuario.' and cod_activacion="'.$codigo_activacion.'"';
				$rs=$cn->query($sql);
		        		
		        if($cn->affected_rows>0){
		        	$respuesta='activado';

		        	$sql='select * from grl_tbl_users where id='.$id_usuario;
					$rs=$cn->query($sql);

					$row=mysqli_fetch_object($rs);

		        	$fila=array();
		        	
					$fila['id']=$row->id;
					$fila['id_fb']=$row->id_fb;
					$fila['nombre']=$row->nombre;
					$fila['correo']=$row->correo;
					$fila['id_img']=$row->id_img;
					$fila['ext_img']=$row->ext_img;
					$fila['usuario_activo']=$row->usuario_activo;
					$fila['presentacion']=$row->presentacion;

					$fila['respuesta']='activado';




		        }else{
		        	$fila=array();
					$fila['respuesta']='no activado';
		        }

				$cn->query('COMMIT');
		        mysqli_close($cn);


				return $fila;
				
			}catch(Exception $ex){
				       	
				$cn->query('ROLLBACK'); 
				mysqli_close($cn);
				
				return 'mysql_no';
				
			}	
		
		}else{
		return "mysql_no";
		}
    }


    function solicitar_codigo_activacion($correo){

        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
									
				$sql='select id,cod_activacion from grl_tbl_users where correo="'.$correo.'"';
				
				$rs=$cn->query($sql);
		        $fila=mysqli_fetch_object($rs);
		        		        		       	
				$cn->query('COMMIT');
		        mysqli_close($cn);
				return $fila;
				
			}catch(Exception $ex){
				       	
				$cn->query('ROLLBACK'); 
				mysqli_close($cn);
				
				return 'mysql_no';
				
			}	
		
		}else{
		return "mysql_no";
		}
    }


    function solicitar_password($correo){

        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
									
				$sql='select aes_decrypt(password,"123") password from grl_tbl_users where correo="'.$correo.'"';
				
				$rs=$cn->query($sql);
		        $fila=mysqli_fetch_object($rs);
		        		        		       	
				$cn->query('COMMIT');
		        mysqli_close($cn);
				return $fila;
				
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