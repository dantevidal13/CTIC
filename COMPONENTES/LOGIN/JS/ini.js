




function fun_accion_login(user,password,accion,url_login){

	switch(accion){
		case 'iniciar': 
			dir_post="COMPONENTES/LOGIN/POST/logear.php";
		break;
		case 'olvide_pass':
			dir_post="COMPONENTES/LOGIN/POST/solicitar_password.php";
		break;
		case 'registrar':
			dir_post="COMPONENTES/LOGIN/POST/registrar_usuario.php";
		break;
	}

  $('.comp-login .comp-login-campo .campo-vacio').addClass('oculto');
  $('.comp-login .comp-login-campo .campo-error').addClass('oculto');
  $('.comp-login .comp-login-campo .campo-aux').addClass('oculto');

  $('#comp-login-correo').parent().removeClass('comp-login-alerta');
  $('#comp-login-password').parent().removeClass('comp-login-alerta');
  

  correo=((typeof $('#comp-login-correo').val() =='string')? $('#comp-login-correo').val() : 'no definido' );
  password=((typeof $('#comp-login-password').val()=='string')? $('#comp-login-password').val() : 'no definido' );

  	if(!fun_esblanco(correo) && (!fun_esblanco(password) || accion=='olvide_pass') ){
    
		$.ajax({
	        url: dir_post,	
	        type: "POST",							//Y EN DATA SE ALOJARAN EN NUEVAS VARIABLES
	        data:{correo:correo,password:password},
	        async:true,
	        beforeSend: 
			function(objeto){        	
	        	$('.comp-login').css('pointer-events','none');
				$("#cargando_login").show();			
	        },
	        
			success: function(data){
		
				data=$.parseJSON(data);

				$('.comp-login').css('pointer-events','initial');
		   
		   		if(data.error){
		   			switch(data.detalle){
		   				case 'mysql':
							FMSG_ERROR_CONEXION();	
		   				break;
		   				case 'sin_user':
		   					$('#comp-login-campo_correo').addClass('comp-login-alerta');
	          				$('#comp-login-campo_correo .campo-vacio').removeClass('oculto');
		   				break;
		   				case 'sin_password':
		   					$('#comp-login-campo_password').addClass('comp-login-alerta');
	          				$('#comp-login-campo_password .campo-vacio').removeClass('oculto');
		   				break;
		   				case 'no_user':
		   					$('#comp-login-campo_correo').addClass('comp-login-alerta');
		          				$('#comp-login-campo_correo .campo-error').removeClass('oculto');
		   				break;
		   				case 'no_pass':

								$('#comp-login-campo_password').addClass('comp-login-alerta');
		          				$('#comp-login-campo_password .campo-error').removeClass('oculto');
		   				break;
		   				case 'existe_user':
								
								$('#comp-login-campo_correo').addClass('comp-login-alerta');
		          				$('#comp-login-campo_correo .campo-aux').html('Ya existe este usuario');
		          				$('#comp-login-campo_correo .campo-aux').removeClass('oculto');
		   				break;
		   			}
		   		}else{

					switch(data.detalle){

						case 'ok_sesion': parent.document.location=url_login;
						break;
						case 'ok_registro': parent.document.location=url_login;
						break;

					}

		   		}

			
			}
			        
		});		

	}else{

	    if(fun_esblanco(correo)){
	      $('#comp-login-campo_correo').addClass('comp-login-alerta');
	      $('#comp-login-campo_correo .campo-vacio').removeClass('oculto');
	    }
	    if(fun_esblanco(password) && accion!='olvide_pass'){
	      $('#comp-login-campo_password').addClass('comp-login-alerta');
	      $('#comp-login-campo_password .campo-vacio').removeClass('oculto');
	    }
	}
}




function fun_cerrar_sesion(){

	$.ajax({
        url: "COMPONENTES/LOGIN/POST/close.php",	
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


function fun_activar_cuenta(id,cod){


	$.ajax({
        url: "COMPONENTES/LOGIN/POST/activar_cuenta.php",	
        type: "POST",							//Y EN DATA SE ALOJARAN EN NUEVAS VARIABLES
        data:{id_user:id,codigo_activacion:cod},
        async:true,
        beforeSend: 
		function(objeto){        	
        			
        },
        
		success: function(data){



			parent.document.location='USUARIO'; 
				
			
				
			
		}
		        
	});		

}




function fun_solicitar_codigo_activacion(){

	$.ajax({
        url: "COMPONENTES/LOGIN/POST/solicitar_codigo.php",	
        type: "POST",							//Y EN DATA SE ALOJARAN EN NUEVAS VARIABLES
        data:{},
        async:true,
        beforeSend: 
		function(objeto){        	
        			
        },
        
		success: function(data){
		
			if(data=="mysql_no"){
				FMSG_ERROR_CONEXION();						
			}else{
				if(data=='enviado'){
					try{
						fun_accion_despues_solicitar_codigo();
					}catch(e){

					}
				}
			}
		}
		        
	});		

}











$(window).resize(function(){
	
	for(var index in GL_COMPONENTE_LOGIN.ARRAY_LOGINS){
		GL_COMPONENTE_LOGIN.ARRAY_LOGINS[index].resize();
	}
	
});

function OBJ_INICIALIZA_LOGIN(){


	this.CONT_LOGINS=0;
	this.ARRAY_LOGINS=new Array();


	this.ini=function(){
		var obj_login=this;



		$('.comp-login').each(function(){
			

			//recogemos todas las imágenes que hay pero debemos verificar si es manual o no


/*
				$(this).find('div').each(function(){
					switch($(this).data('elemento')){
						case 'formulario':
							if($(this).data('correo')){
								html_formulario+='<div class="comp-login-campo comp-login-campo_input"><input id="comp-login-correo" type="text" value="" placeholder="correo:"/> <span class="campo-vacio oculto">Este campo es obligatorio</span></div>';
							}

							if($(this).data('apellidos')){
								html_formulario+='<div class="comp-login-campo comp-login-campo_input"><input id="comp-login-apellidos" type="text" value="" placeholder="Apellidos:"/><span class="campo-vacio oculto">Este campo es obligatorio</span></div>';								
							}

							if($(this).data('correo')){
								html_formulario+='<div class="comp-login-campo comp-login-campo_input"><input id="comp-login-correo" type="text" value="" placeholder="Correo:"/><span class="campo-vacio oculto">Este campo es obligatorio</span></div>';								
							}

							if($(this).data('telefono')){
								html_formulario+='<div class="comp-login-campo comp-login-campo_input"><input id="comp-login-telefono" type="text" value="" placeholder="Teléfono:"/><span class="campo-vacio oculto">Este campo es obligatorio</span></div>';								
							}

							if($(this).data('mensaje')){
								html_formulario+='<div class="comp-login-campo comp-login-campo_input"><textarea id="comp-login-mensaje" placeholder="Mensaje:"></textarea><span class="campo-vacio oculto">Este campo es obligatorio</span></div>';								
							}
						break;
						
					}
				});*/
				
				
/*
				var html_login='<div id="comp-login-'+obj_login.CONT_LOGINS+'">'+
					'<div class="comp-login-content">'+
						'<div class="comp-login-celda">'+
							'<div class="comp-login-alineador">'+
								html_titulo+
								'<div class="comp-login-cuerpo">'+		
									html_formulario+
									'<div class="comp-login-campo comp-login-campo-enviar"><div id="comp-login-enviar">'+
										'<div class="comp-content-enviar">Enviar</div>'+
									'</div></div>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+

					html_ubicanos+
					html_pie+
				'</div>';*/
/*var html_titulo='';
				
				if($(this).data('titulo')){					
					html_titulo='<div class="comp-login-titulo">'+
									$(this).data('titulo')+				      
								'</div>';
				}*/

				html_login_fb='';
				btn_atras_seleccion='';
				ocultar_formulario='';
				if($(this).data('facebook')){

				html_login_fb=
				  '<div class="seleccionar_forma trans_bezier_05">'+
                    '<div class="contenedor-tabla">'+
                      '<div class="contenedor-celda">'+
                        '<div class="titulo">'+
                          'Iniciar sesión con'+
                        '</div>'+
                        '<div id="btn-inicio-face" class="opcion">'+
                          '<div class="bloque trans_bezier_03">'+
                            '<img class="trans_bezier_03" src="IMG/f.png">'+
                          '</div>'+
                          '<div class="texto">Facebook</div>'+
                        '</div>'+
                        '<div id="btn-inicio-correo" class="opcion">'+
                          '<div class="bloque trans_bezier_03">'+
                            '<img class="trans_bezier_03" src="IMG/arroba.png">'+
                          '</div>'+
                          '<div class="texto">Correo</div>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>';

                  btn_atras_seleccion='<div class="btn_volver trans_bezier_03" data-destino="seleccion">'+
                          '&#60;&#60;Volver'+
                        '</div>';
                  ocultar_formulario='oculto_derecha';
				}


                html_registro='';
                btn_crear_cuenta='';
				if($(this).data('nuevousuario')){
				

                  btn_crear_cuenta='<div id="comp-login-crear_nueva_cuenta">'+
                          '<input type="checkbox" class="comp-login-selec_funcion" id="comp-login-check-registrar"/> Crear cuenta nueva'+
                        '</div>';
				}


				html_login_form='<div id="div_form_iniciar_sesion" class="div_form '+ocultar_formulario+' trans_bezier_05">'+    

                    '<div class="contenedor-tabla">'+
                      '<div class="contenedor-celda">'  +        
                         btn_atras_seleccion+

                        '<div class="comp-login-content-titulo">'+
	                        '<div class="comp-login-titulos">'+
		                        '<div class="titulo">'+
		                          'Iniciar Sesión'+
		                        '</div>'+
		                        '<div class="titulo">'+
		                          'Recuperar Contraseña'+
		                        '</div>'+
		                        '<div class="titulo">'+
		                          'Registrarme'+
		                        '</div>'+
	                        '</div>'+
                        '</div>'+
                        '<div class="comp-login-content-campos">'+
                          /*'<div class="seccion">'+
                            '<input id="comp-login-campo-user" type="text" placeholder="Correo">'+
                          '</div>'+*/
                          '<div id="comp-login-campo_correo" class="comp-login-campo comp-login-campo_input">'+
                          	'<input id="comp-login-correo" type="text" value="" placeholder="Correo:"/>'+
                          	'<span class="campo-vacio oculto">Este campo es obligatorio</span>'+
                          	'<span class="campo-error oculto">Usuario no registrado</span>'+
                          	'<span class="campo-aux oculto"></span>'+
                          '</div>'+

                          '<div id="comp-login-campo_password" class="comp-login-campo comp-login-campo_input">'+
                          	'<input id="comp-login-password" type="password" value="" placeholder="Password:"/>'+
                          	'<span class="campo-vacio oculto">Este campo es obligatorio</span>'+
                          	'<span class="campo-error oculto">Contraseña incorrecta</span>'+
                          	'<span class="campo-aux oculto"></span>'+
                          '</div>'+

                          '<div id="comp-login-btn-accion" data-accion="iniciar" data-id="'+obj_login.CONT_LOGINS+'">'+
                            '<div class="content-botones">'+
                            	'<div class="boton">'+
		                          'Entrar'+
		                        '</div>'+
		                        '<div class="boton">'+
		                          'Solicitar'+
		                        '</div>'+
		                        '<div class="boton">'+
		                          'Crear usuario'+
		                        '</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+

                        '<div id="comp-login-olvide_pass" >'+
                          '<input type="checkbox" class="comp-login-selec_funcion" id="comp-login-check-olvide_pass"/> Olvidé mi contraseña'+
                        '</div>'+

                        btn_crear_cuenta+
                      '</div>'+
                    '</div>'+
                  '</div> ';  



				html_login='<div id="comp-login-'+obj_login.CONT_LOGINS+'">'+
						html_login_fb+
						html_login_form+
		                '</div>'+
		              '</div>';

       
    

				$(this).html(html_login);


				obj_login.ARRAY_LOGINS[obj_login.CONT_LOGINS]=new OBJ_LOGIN('#comp-login-'+obj_login.CONT_LOGINS);



				obj_login.ARRAY_LOGINS[obj_login.CONT_LOGINS].url_login=$(this).data('urllogin');
		

			
			
			obj_login.CONT_LOGINS++;
		});

			
		for(var i=0;i<obj_login.CONT_LOGINS;i++){	
			obj_login.ARRAY_LOGINS[i].inicia();	
		}

				
		//inicializa imagenes
		//inicializa imagenes
		//inicializa imagenes
		if(GL_COMPONENTE_CARGANDO){

			GL_COMPONENTE_CARGANDO.carga_imagenes('login',this);
			GL_COMPONENTE_CARGANDO.asignar_fondos_css_img();
		}
	};


	this.domready=function(){

		if(GL_URL_PARAMS['id'] && GL_URL_PARAMS['cod']){
			fun_activar_cuenta(GL_URL_PARAMS['id'],GL_URL_PARAMS['cod']);
		}

		$('body').on('click','.comp-login #btn-inicio-face',function(){
			fun_logear_con_fb();
		});

		$('body').on('click','.comp-login #btn-inicio-correo',function(){
			$('#div_form_iniciar_sesion').removeClass('oculto_derecha');
			$('.seleccionar_forma').addClass('oculto_fondo');
		});



		$('body').on('click','.comp-login .btn_volver',function(){
			switch($(this).data('destino')){
				case 'seleccion':
					$('.seleccionar_forma').removeClass('oculto_fondo');
					$('#div_form_iniciar_sesion').addClass('oculto_derecha');
				break;
				case 'iniciar_sesion':
					$('#div_form_iniciar_sesion').removeClass('oculto_fondo');
					$('#div_form_registro').addClass('oculto_derecha');
				break;
			}
		});

	/*	$('body').on('click','.comp-login #div_form_iniciar_sesion .crear_nueva_cuenta',function(){

			$('#div_form_registro').removeClass('oculto_derecha');
			$('#div_form_iniciar_sesion').addClass('oculto_fondo');

		});
	*/





		$('body').on('click','.comp-login #comp-login-crear_nueva_cuenta',function(){		
			$('.comp-login #comp-login-check-registrar').click();
		});
		$('body').on('click','.comp-login #comp-login-check-registrar',function(event){
			fun_cancel_buble_event(event);
			  $('.comp-login .comp-login-campo .campo-vacio').addClass('oculto');
			  $('.comp-login .comp-login-campo .campo-error').addClass('oculto');
			  $('.comp-login .comp-login-campo .campo-aux').addClass('oculto');

			$('.comp-login #comp-login-check-olvide_pass').attr('checked',false);	
			
			if($(this).is(':checked')){

	  
				$('.comp-login .div_form #comp-login-crear_nueva_cuenta').addClass('select'); 

				$('.comp-login .div_form .comp-login-titulos').addClass('titulo_registrar'); 
				$('.comp-login .div_form .content-botones').addClass('btn_registrar'); 
				$('#comp-login-campo_password').removeClass('oculto');
				$('.comp-login .div_form #comp-login-btn-accion').data('accion','registrar');
			}else{
				$('.comp-login .div_form #comp-login-crear_nueva_cuenta').removeClass('select'); 

				$('.comp-login .div_form .comp-login-titulos').removeClass('titulo_registrar'); 
				$('.comp-login .div_form .content-botones').removeClass('btn_registrar'); 
				$('#comp-login-campo_password').removeClass('oculto');
				$('.comp-login .div_form #comp-login-btn-accion').data('accion','iniciar');
			}

			$('.comp-login .div_form .comp-login-titulos').removeClass('titulo_olvide_pass');
			$('.comp-login .div_form .content-botones').removeClass('btn_olvide_pass');
			$('.comp-login .div_form #comp-login-olvide_pass').removeClass('select'); 
		});


		$('body').on('click','.comp-login #comp-login-olvide_pass',function(){		
			$('.comp-login #comp-login-check-olvide_pass').click();
		});
		$('body').on('click','.comp-login #comp-login-check-olvide_pass',function(event){
			fun_cancel_buble_event(event);
			  $('.comp-login .comp-login-campo .campo-vacio').addClass('oculto');
			  $('.comp-login .comp-login-campo .campo-error').addClass('oculto');
			  $('.comp-login .comp-login-campo .campo-aux').addClass('oculto');


			$('.comp-login #comp-login-check-registrar').attr('checked',false);		

			if($(this).is(':checked')){

				$('.comp-login .div_form #comp-login-olvide_pass').addClass('select');

				$('.comp-login .div_form .comp-login-titulos').addClass('titulo_olvide_pass'); 
				$('.comp-login .div_form .content-botones').addClass('btn_olvide_pass'); 
				$('#comp-login-campo_password').addClass('oculto');
				$('.comp-login .div_form #comp-login-btn-accion').data('accion','olvide_pass');
			}else{
				$('.comp-login .div_form #comp-login-olvide_pass').removeClass('select');

				$('.comp-login .div_form .comp-login-titulos').removeClass('titulo_olvide_pass'); 
				$('.comp-login .div_form .content-botones').removeClass('btn_olvide_pass'); 
				$('#comp-login-campo_password').removeClass('oculto');

				$('.comp-login .div_form #comp-login-btn-accion').data('accion','iniciar');
			}

			$('.comp-login .div_form .comp-login-titulos').removeClass('titulo_registrar'); 
			$('.comp-login .div_form .content-botones').removeClass('btn_registrar');
			$('.comp-login .div_form #comp-login-crear_nueva_cuenta').removeClass('select'); 
		});



		$('body').on('click','#comp-login-btn-accion',function(){

			fun_accion_login($("#comp-login-campo-user").val(),$("#comp-login-campo-password").val(),$(this).data('accion'), GL_COMPONENTE_LOGIN.ARRAY_LOGINS[parseInt($(this).data('id'))].url_login);
					
		});

		$('body').on('keyup','#comp-login-campo-password',function(event){

			tecla=(document.all) ? event.keyCode : event.which;	
			
			if(tecla == 13 ){
				$('#comp-login-btn-accion').click();
			}
		});

		$('body').on('keyup','#comp-login-campo-user',function(event){

			tecla=(document.all) ? event.keyCode : event.which;	
			
			if(tecla == 13 ){
				$('#comp-login-btn-accion').click();
			}
		});

		$('body').on('click','.comp-login-cerrar_sesion',function(){

		});
	};

}



function OBJ_LOGIN(id){

	this.ID_DOM=id;
	this.url_login='';


	this.inicia=function(){

			this.resize();			

	};

	



	this.resize=function(){
		
/*		var obj=this;
		//$(this.ID_DOM+' .comp-login-content').css('width',$(window).width()+'px');
		

		if($(window).width()<500){
			$(this.ID_DOM+' .comp-login-alineador').addClass('responsive');

		}else{
			$(this.ID_DOM+' .comp-login-alineador').removeClass('responsive');			
		}
*/


	};


	
}






 // This is called with the results from from FB.getLoginStatus().
 /* function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
    //  testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';

    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }*/

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
 
      
  function fun_logear_con_fb(){ 
    
    FB.getLoginStatus(function(response) {
    
      if (response.status === 'connected') {     
      
            fun_setSession();
      } 
      else if (response.status === 'not_authorized') {
        callMetodoFbLogin(); 
      } 
      else {
        callMetodoFbLogin(); 
      }     
     });  
  } 

  function callMetodoFbLogin(){
    FB.login(function(response) {   
      if (response.authResponse) {
          //callMetodoFbAPI();
         
          fun_setSession();
          //$('#ajax-modal').modal('show');
       } else {
         //User cancelled login or did not fully authorize.
       }
     }, {scope:'email'}); 
  } 


  window.fbAsyncInit = function() {
  FB.init({
    appId      : '447552835413456',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1

  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  };








  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function fun_setSession() {
  //  console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
     /* console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';*/

          $.ajax({
              url: "POST/iniciar_sesion_fb.php",
              type: "POST",
              data:{user:response.id,correo:response.name,correo:response.email},
              
              async:true,
              beforeSend: function(objeto){
                
              },
              
        success: function(data){
            
            parent.document.location=''; 
      
        }
      });


    });
  }

