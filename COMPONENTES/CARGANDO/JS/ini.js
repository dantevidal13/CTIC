
$(window).resize(function(){
	
});


function OBJ_INICIALIZA_CARGANDO(num_componentes_usados){
	
	this.num_componentes_iniciados=0;
	this.num_componentes_usados=num_componentes_usados;

	this.array_componentes=new Array();

	this.num_imagenes_prioridad=0;
	this.num_imagenes_prioridad_cargadas=0;
	this.carga_prioridad_terminada=false;

	this.num_imagenes=0;
	this.num_imagenes_cargadas=0;
	this.carga_terminada=false;

	this.animacion_retirar='fadeOut';

	this.INICIADO=false;


	this.ini=function(){
		
		var obj_aux=this;

		$('body').addClass('comp-carga');

		$('.comp-cargando').each(function(){

			//recogemos todas las imágenes que hay pero debemos verificar si es manual o no
			
			var html_porcentaje='';
			var html_img='';
			var html_barra='';
			var html_fondo='';
			$(this).find('div').each(function(){
				
				switch($(this).data('elemento')){
					case 'porcentaje':
						html_porcentaje+='<div id="comp-porcentaje">'+      
						      '<div class="texto" data-carga="0">'+
						      '0%'+
						      '</div>'+
						   '</div>';
					break;
					case 'barra':
						html_barra+='<div id="comp-cargando-barra" >'+      
						      ' <div class="barra_llenado"></div> '+
						   '</div>';
					break;
					case 'imagen':
						html_img+='<div id="imagen">'+      
						      '<img src="'+$(this).data('src')+'">'+
						   '</div>';
					break;
					case 'fondo':
					
						if(!$(this).data('expandido') && typeof($(this).data('src'))=='string' && $(this).data('src')!=''){
							html_fondo+='<div id="fondo">'+      
						      '<img src="'+$(this).data('src')+'">'+
						   '</div>';
						}						
					break;
				}				

			});
			
			var html_menu='<div class="contenedor-tabla"><div class="contenedor-celda">'+
							html_fondo+
							html_img+
							html_barra+
							html_porcentaje+
							'<input id="comp-porcentaje-llenado" value="0" type="hidden">'+
						'</div></div>';

			$(this).html(html_menu);

			if(typeof $(this).data('animacionretirar')=='string' ){
				obj_aux.animacion_retirar=	$(this).data('animacionretirar');
			}

			obj_aux.inicia();					
			
		});

	};


	this.inicia=function(){
		if(!this.INICIADO){
			this.INICIADO=true;
			try{
				fun_inicia_cargando();
			}catch(e){
			}
		}
	};

	this.carga_imagenes=function(componente,obj_componente){
		obj=this;

		this.num_componentes_iniciados++;

			if(this.num_componentes_iniciados==1){

				var intervalo_barra_cargando=setInterval(function(){
					if(obj.carga_terminada){
						clearInterval(intervalo_barra_cargando);
						$('.comp-cargando  #comp-porcentaje-llenado').val(100);
						$('.comp-cargando #comp-porcentaje .texto').html('100%');
						$('.comp-cargando #comp-cargando-barra .barra_llenado').css( 'width', '100%');
						var intervalo_carga_final=setInterval(function(){
							clearInterval(intervalo_carga_final);
							obj.quitar_cargando();
						},1000);
					}else{

						porcentaje_cargado=parseInt($('.comp-cargando #comp-porcentaje-llenado').val());

						if(porcentaje_cargado<96){

							if(porcentaje_cargado<80){

							
								porcentaje_sube=Math.ceil((Math.random()*5));
								porcentaje_cargado=parseInt(porcentaje_cargado)+porcentaje_sube;
							
							}else{


								porcentaje_sube=Math.ceil((Math.random()*1));
								porcentaje_cargado=parseInt(porcentaje_cargado)+porcentaje_sube;

							}

							$('.comp-cargando #comp-porcentaje-llenado').val(porcentaje_cargado);
							$('.comp-cargando #comp-porcentaje .texto').html((porcentaje_cargado)+'%');
							$('.comp-cargando #comp-cargando-barra .barra_llenado').css( 'width', (porcentaje_cargado)+'%');

						}
					}
				},1000);
			}

		this.array_componentes[componente]=obj_componente;

		if(this.num_componentes_usados==this.num_componentes_iniciados){
			$('img').each(function(){
				if(!$(this).attr('src') || $(this).attr('src')==''){					
					if($(window).width()<500){
						if($(this).data('msrc')!='' && $(this).data('msrc')){
							src=$(this).data('msrc');	
						}else{
							src=$(this).data('src');	
						}					
					}else{
						src=$(this).data('src');	
					}
					if(src){
						if($(this).data('prioridad')=="1"){
							obj.num_imagenes_prioridad++;
						}else{
							obj.num_imagenes++;
						}
					}
				}
			});




			if(obj.num_imagenes_prioridad==0){
				obj.carga_imagenes_sin_prioridad();
			}else{
				$('img').each(function(){
					var dom_img=$(this);
					if((!$(this).attr('src') || $(this).attr('src')=='') && $(this).data('prioridad')=='1' ){
						var src;
						if($(window).width()<500){
							if($(this).data('msrc')!='' && $(this).data('msrc')){
								src=$(this).data('msrc');	
							}else{
								src=$(this).data('src');	
							}					
						}else{
							src=$(this).data('src');		
						}
						$(this).attr('onload','GL_COMPONENTE_CARGANDO.fun_comp_img_prioridad_load();');
					    $(dom_img).attr('src',src);
					}
				});	
			}
		}	
	};

	this.fun_comp_img_prioridad_load=function(){	 
		var obj=this;
		obj.num_imagenes_prioridad_cargadas++;
		if(obj.num_imagenes_prioridad_cargadas>=obj.num_imagenes_prioridad){			
			obj.carga_imagenes_sin_prioridad();
		}
	}

	this.carga_imagenes_sin_prioridad=function(){
		var obj=this;
		if(obj.num_imagenes>0){
			
			$('img').each(function(){
				var dom_img=$(this);
				if((!$(this).attr('src') || $(this).attr('src')=='') && $(this).data('prioridad')!='1'   ){
					
					var src;
					if($(window).width()<500){

						if($(this).data('msrc')!='' && $(this).data('msrc')){
							src=$(this).data('msrc');
						}else{
							src=$(this).data('src');	
						}					
					}else{
						src=$(this).data('src');	
					}

					$(this).attr('onload','GL_COMPONENTE_CARGANDO.fun_comp_img_load_final();');
				    $(dom_img).attr('src',src);
						
				}
			});

		}else{

			GL_COMPONENTE_CARGANDO.carga_terminada=true;

		}
	};

	this.fun_comp_img_load_final=function(){	 
		var obj=this;
		
		obj.num_imagenes_cargadas++; 
		if(obj.num_imagenes_cargadas>=obj.num_imagenes){ 
			GL_COMPONENTE_CARGANDO.carga_terminada=true;
		}
	}

	this.cargar_msrc=function(){
		obj=this;
		$('img').each(function(){
			if(!$(this).attr('src') || $(this).attr('src')==''){				
				if($(window).width()<500){
					if($(this).data('msrc')!='' && $(this).data('msrc')){
						$(this).attr('src',$(this).data('msrc'));		
					}else{
						$(this).attr('src',$(this).data('src'));		
					}					
				}else{
					$(this).attr('src',$(this).data('src'));		
				}
			}
		});
	};

	this.quitar_cargando=function(){
		switch(this.animacion_retirar){
			case 'fadeOut': 
				$('.comp-cargando').fadeOut(300);
			break;
			case 'desplazar_arriba':
				$('.comp-cargando').addClass('cargando_desplazar_arriba'); 
			break; 
		}

		$('body').removeClass('comp-carga');		
		$('body').addClass('pagina-cargada');

		this.asignar_fondos_css_img();

		try{
			fun_comp_cargando_retirado();			
		}catch(e){}

		try{
			GL_COMPONENTE_ANIMACION=new OBJ_INICIALIZA_ANIMACION();
			GL_COMPONENTE_ANIMACION.ini();
		}catch(e){}
		
		for (var ind in this.array_componentes){
			this.array_componentes[ind].domready();		
		}		
	};

	this.asignar_fondos_css_img=function(){
		$('.comp-cargando-img-redirect').each(function(){
			destino=$(this).data('destino');

			if($(window).width()<500){

				if($(this).data('msrc')!='' && $(this).data('msrc')){
					src=$(this).data('msrc');
				}else{
					src=$(this).data('src');
				}
				
			}else{
				src=$(this).data('src');
			}
			
			$(destino).css('background-image','url('+src+')');
		});  
	};
}
