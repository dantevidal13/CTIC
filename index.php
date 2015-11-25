<?php 
session_start();



if(!isset($_SESSION['user'])){	

        header('location:ADMIN');
}else{

	switch($_SESSION['grupo']){
		case 2:
        	header('location:COORDINADOR');
		break;
		case 1:
        	header('location:SUPER');
        break;
	}

}
?>

