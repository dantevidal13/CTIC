

$(document).ready(function(){

//FUNCION PARA EL BOTOND DE LOGUEAR ALUMNO

	$(".div_cerrar_sesion").click(function(){
		
		fun_cerrar_sesion();
	});
});


/*DESARROLLADO POR DANTE VIDAL TUEROS*/

function fun_cerrar_sesion(){


	$.ajax({
        url: GL_DNS+"/ADMIN/POST/close.php",	
        type: "POST",							//Y EN DATA SE ALOJARAN EN NUEVAS VARIABLES
        data:{},
        async:true,
        beforeSend: 
		function(objeto){
        		
        },
	        
		success: function(data){
			parent.document.location='';
	}
	        
	});		
}


