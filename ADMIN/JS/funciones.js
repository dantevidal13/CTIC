
$(window).resize(function(){
		fun_resize(true);
	
});

var GL_RESIZE_CELULAR=false;
var GL_CONT_RESIZE_CELULAR=0;

function fun_resize(resize){


/*DESARROLLADO POR DANTE VIDAL TUEROS*/
	if($(window).width()<600){

		if(GL_CONT_RESIZE_CELULAR<2){

			if(resize){
				GL_CONT_RESIZE_CELULAR++;
			}
			$('#content_home section').css('height',$(window).height()+'px');
	
		}
	}else{

		$('#content_home section').each(function(){


				altura_menu='100%' ;
		

			$(this).css('height',altura_menu);


		});
			GL_CONT_RESIZE_CELULAR=0;
	}




}


function fun_resize_obj_slide_full(id_dom){
	fun_resize();
	fun_resize_fontsize('#inicio');
}


/*DESARROLLADO POR DANTE VIDAL TUEROS*/
function fun_resize_fontsize(id_dom){

		$(id_dom+' .responsive-fontsize').each(function(){

			var proporcion=$(this).data('propfontsize');


			if($(this).data('referfontsize')){

				if($(this).data('referfontsize')=='window'){
					ancho_referencia=$(window).width();
				}else{
					try{

						ancho_referencia=parseInt($($(this).data('referfontsize')).css('width').replace('px',''));
					}catch(e){

					}
				}
			}else{
				ancho_referencia=parseInt($(this).css('width').replace('px',''));
				
			}

			
			font_size=ancho_referencia*parseFloat(proporcion)/100;
			
			if(font_size<parseInt($(this).data('minfontsize'))){
				font_size=parseInt($(this).data('minfontsize'));
			}

			$(this).css('font-size',font_size+'px');
			
		});



}

/*DESARROLLADO POR DANTE VIDAL TUEROS*/


function fun_inicia_cargando(){
	var delay=setInterval(function(){
		clearInterval(delay);
		$('body').removeClass('sin_scroll');

	$('.comp-cargando #imagen').addClass('mostrado');
	$('.comp-cargando #comp-cargando-barra').addClass('mostrado');

	},100);
}