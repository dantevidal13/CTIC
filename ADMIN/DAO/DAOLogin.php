<?php

class DAOLogin extends Conexion{
		
/*DESARROLLADO POR DANTE VIDAL TUEROS*/
	function logear($username,$password){  //AKI FALTA DEFINIR Q ES LO Q SE NECESITA DEL ALUMNO
  
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
				
				$sql='select * from tb_usuarios where username="'.$username.'" and password=AES_ENCRYPT("'.$password.'","123ctic123")';
	
				$rs=$cn->query($sql);


		        if(mysqli_num_rows($rs)>0){
			      	$respuesta=array('data'=>mysqli_fetch_object($rs), 'respuesta'=>"ok");
			      			       	 
		        }else{

		        	$respuesta =array('respuesta'=>"no_user");

		        }

				$cn->query('COMMIT');
		        mysqli_close($cn);
				return $respuesta;
				
			}catch(Exception $ex){
				       	
				$cn->query('ROLLBACK'); 
				mysqli_close($cn);
				
				return array('respuesta'=>"mysql_no");
				
			}	
		
		}else{
			return array('respuesta'=>"mysql_no");
		}
    }
    
    function es_usuario($username){

/*DESARROLLADO POR DANTE VIDAL TUEROS*/
        $cn = $this->conexion();
        
        if($cn!="no_conexion"){
	        
			
			$cn->query('BEGIN');
			
			try{
									
				$sql='select username from users where username="'.$username.'"';
				
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
/*DESARROLLADO POR DANTE VIDAL TUEROS*/
		
		}else{
		return "mysql_no";
		}
    }
    
}

?>