<?php 

require_once('UTIL/variables_globales.php');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="author" content=""> 
  <meta property="og:type" content="website"> 
  
  <base href="<?php echo $GL_DNS;?>/"></base>

  <meta property="og:type" content="website"> 
  <meta property="og:site_name" content="www.acmtechnology.com.pe">
  <meta property="og:url" content="www.acmtechnology.com.">
  <meta property="og:title" content="ACM Technology">
  <meta property="og:description" content="ACM Technology">  
  <meta property="og:image" content="IMG/logo.png">  

  
  <meta name="description" content="ACM Technology">
  <link rel="shortcut icon" href="IMG/icon.png">
  <script type="text/javascript" src="JS/LIBRERIAS/jquery-2.1.1.min.js"></script>  
  <script  type="text/javascript"  src="JS/LIBRERIAS/socket.io.js"></script>  

  <script type="text/javascript" src="JS/pattern.js"></script>  
  <script type="text/javascript" src="JS/funciones_generales.js"></script>   



  <link rel="stylesheet" type="text/css" href="CSS/estilo_general.css" media="screen"/>

  <script type="text/javascript" src="JS/funciones_componentes.js"></script>   
  <link rel="stylesheet" type="text/css" href="CSS/estilo_componentes.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="CSS/estilo_responsive.css" media="screen"/>



  <script type="text/javascript" src="JS/chat_contacto.js"></script>
  <script type="text/javascript" src="MOD/PRESENTACION/JS/mision_vision.js"></script>
  <script type="text/javascript" src="MOD/CONTACTO/JS/contacto.js"></script>
  <script type="text/javascript" src="MOD/CHAT_CONTACTO/JS/funciones_comunes_chat_contacto.js"></script>
  <link rel="stylesheet" type="text/css" href="MOD/CHAT_CONTACTO/CSS/estilo_chat_contacto.css" media="screen"/>




  <script type="text/javascript" src="COMPONENTES/ini.js"></script>   

  <title>ACM Technology</title>
</head>

<body class="inicio">






<section>
  <div id="cargando" class="comp-cargando" data-srclogo="">

    <div data-elemento="imagen" data-src="IMG/logo.png" data-expandido="false"></div>
    <div data-elemento="barra"></div>
  </div>
</section>


  
<header id="menu" >

      <div class="comp-menu-fijo comp-animacion-ini trans_bezier_05"   data-tipo="menu-superior" data-animaciondelay="0.5" data-srclogo="IMG/logo.png">
        

        <ClassExtra DOMdestino="img-logo" class="trans_bezier_05 trans_delay_05 anim-desplaza-arriba anim-oculto-opacity">
        </ClassExtra>

        <ClassExtra DOMdestino="comp-menu-fijo-content" class="trans_bezier_05 anim-desplaza-arriba anim-oculto-opacity">
        </ClassExtra>
        <ClassExtra DOMdestino="comp-menu-celda" class="trans_bezier_05">
        </ClassExtra>

        <HtmlExtra DOMdestino="comp-menu-fijo-content" posicion="final">
          <div class="btns_sociales">
            <a href="https://www.facebook.com/actechnologysac" target="_blank">
              <div class="btn facebook trans_bezier_05 trans_delay_2_03 anim-escala_0">
                <div class="fondo_rojo">
                  <div class="fondo_blanco trans_bezier_04">
                  </div>
                  <div class="icono trans_bezier_04">
                  </div> 
                </div> 
              </div>
            </a>
          </div>
        </HtmlExtra>

        <opcion area="inicio" columna="inicio" texto="Inicio" >
         
          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1 anim-desplaza-arriba anim-oculto-opacity">
          </ClassExtra>

        </opcion>

        <opcion area="productos" columna="productos" texto="Productos" >
          
          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_03 anim-desplaza-arriba anim-oculto-opacity">
          </ClassExtra>
        </opcion>

        <opcion area="servicios" columna="servicios" texto="Servicios" >
         
          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_06 anim-desplaza-arriba anim-oculto-opacity">
          </ClassExtra>
        </opcion>

        <opcion area="contacto" texto="Contacto" >
         
          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_09 anim-desplaza-arriba anim-oculto-opacity">
          </ClassExtra>
        </opcion>


        <RemoverClass DOMdestino=".comp-menu-opcion" class="trans_delay_1 trans_delay_1_03 trans_delay_1_06 trans_delay_1_09" tiempodelay="2.5">
        </RemoverClass>
        <RemoverClass DOMdestino=".comp-menu-responsive .comp-menu-opcion .comp-menu-celda" class="trans_bezier_05" tiempodelay="2.5">
        </RemoverClass>
      </div>

</header>






<div id="content_pagina">

  <div id="inicio" class="columna-pagina mostrado" data-columna="inicio">

    <section  class="area-pagina scroll_uniforme" data-area="inicio" >

        <div class="comp-slider-full comp-animacion-ini" data-tipocarga="manual" data-botones="true" data-tipobotones="multiple" data-autoanimado="true" data-tiemposlide="10">

          <slide data-src="IMG/INICIO/slide1.jpg" data-msrc="IMG/INICIO/slide1.jpg" data-tipotexto="texto_dividido" data-subtexto="casas inteligentes" data-texto="">
          </slide>
       
          <slide data-src="IMG/INICIO/slide2.jpg" data-msrc="IMG/INICIO/slide2.jpg" data-tipotexto="texto_dividido" data-subtexto="casas automatizadas" data-texto="">
          </slide>
      
          <slide data-src="IMG/INICIO/slide3.jpg" data-msrc="IMG/INICIO/slide3.jpg" data-tipotexto="texto_dividido" data-subtexto="texto" data-texto="">
          </slide>   

          <slide data-src="IMG/INICIO/slide4.jpg" data-msrc="IMG/INICIO/slide4.jpg" data-tipotexto="texto_dividido" data-subtexto="texto 2" data-texto="">
          </slide>   

        </div>

    </section>



  <section id="marcas" class=" estilo_info "  >
    

        <div class="comp-slider-full comp-animacion-ini" data-tipocarga="manual" data-botones="false" data-tipobotones="multiple" data-autoanimado="true" data-tiemposlide="10">

          <slide data-src="IMG/INICIO/slide1.jpg" data-msrc="IMG/INICIO/slide1.jpg" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>
       
          <slide data-src="IMG/INICIO/slide2.jpg" data-msrc="IMG/INICIO/slide2.jpg" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>
      
          <slide data-src="IMG/INICIO/slide3.jpg" data-msrc="IMG/INICIO/slide3.jpg" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>   

          <slide data-src="IMG/INICIO/slide4.jpg" data-msrc="IMG/INICIO/slide4.jpg" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>   

        </div>



      <div class="comp-informacion scroll_uniforme comp-animacion-ini">

          <bloque>
            <div class="titulo trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10">Nosotros</div>
            <div class="descripcion trans_bezier_05 trans_delay_03 anim-oculto-opacity anim-desplaza-derecha-10">&#8226; <span id="div_quienes_somos"></span></div>
          </bloque>
          <bloque>
            <div class="titulo trans_bezier_05 trans_delay_06 anim-oculto-opacity anim-desplaza-derecha-10">Misi&oacute;n &#38; Visi&oacute;n</div>
            <div  class="descripcion trans_bezier_05 trans_delay_09 anim-oculto-opacity anim-desplaza-derecha-10">&#8226; <span id="div_mision"></span><br>
            &#8226; <span id="div_vision"></span></div>
          </bloque>

      </div> 




      <div class="comp-informacion scroll_uniforme comp-animacion-ini">

          <bloque>
            <div class="imagenes">                
              <div id="img1" class="img trans_bezier_05 trans_delay_05 anim-rotar_y90">              
                <img data-src="IMG/ILUMINACION/img1.jpg" data-msrc="IMG/ILUMINACION/img1.jpg" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#marcas #img1">
              </div>
              <div id="img2" class="img trans_bezier_05 trans_delay_07 anim-rotar_y90">
                <img data-src="IMG/ILUMINACION/img2.jpg" data-msrc="IMG/ILUMINACION/img2.jpg" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#marcas #img2">
              </div>
              <div id="img3" class="img trans_bezier_05 trans_delay_09 anim-rotar_y90">
                <img data-src="IMG/ILUMINACION/img3.jpg" data-msrc="IMG/ILUMINACION/img3.jpg" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#marcas #img3">
              </div>
            </div>
          </bloque>

          <bloque data-iddom="info">
            <div class="titulo trans_bezier_05 trans_delay_1_02 anim-oculto-opacity anim-desplaza-derecha-10">Estamos preparados en diferentes &aacute;mbitos</div>
            <div class="descripcion trans_bezier_05 trans_delay_1_05 anim-oculto-opacity anim-desplaza-derecha-10">AC TECHNOLOGY cuenta con experiencia para la realización de Estudios de factibilidad, Proyectos, Suministros, Montajes y Mantenimiento de Instalaciones Electromecánicas en el ámbito Industrial, Comercial y Residencial, tanto a niveles de Baja y Media tensión. 
            <br>
            Realizamos proyectos para diferentes aplicaciones:
             
            <br>
             <ul>
               <li class="trans_bezier_05 trans_delay_1_06 anim-oculto-opacity anim-desplaza-derecha-10">Aulas de colegios y universidades</li>
               <li class="trans_bezier_05 trans_delay_1_07 anim-oculto-opacity anim-desplaza-derecha-10">Aéreas de esparcimiento</li>
               <li class="trans_bezier_05 trans_delay_1_08 anim-oculto-opacity anim-desplaza-derecha-10">Centros comerciales</li>
               <li class="trans_bezier_05 trans_delay_1_09 anim-oculto-opacity anim-desplaza-derecha-10">Aéreas de deporte amateur y profesional</li>
               <li class="trans_bezier_05 trans_delay_2 anim-oculto-opacity anim-desplaza-derecha-10">Fabricas de producción </li>
               <li class="trans_bezier_05 trans_delay_2_01 anim-oculto-opacity anim-desplaza-derecha-10">Hospitales- Hoteles</li>
               <li class="trans_bezier_05 trans_delay_2_02 anim-oculto-opacity anim-desplaza-derecha-10">Helipuerto</li>
               <li class="trans_bezier_05 trans_delay_2_03 anim-oculto-opacity anim-desplaza-derecha-10">Minería</li>
               <li class="trans_bezier_05 trans_delay_2_04 anim-oculto-opacity anim-desplaza-derecha-10">Oficinas</li>
               <li class="trans_bezier_05 trans_delay_2_05 anim-oculto-opacity anim-desplaza-derecha-10">Tiendas por departamentos</li>
             </ul>

             </div>

            <ClassExtra DOMdestino="comp-info-bloque" class="trans_bezier_05 anim-oculto-opacity anim-desplaza-abajo-10">
            </ClassExtra>

          </bloque>


      </div> 

<div class="seccion_marcas">
  
      <div class="comp-informacion comp-animacion-ini">

          <bloque data-iddom="definicion">
            <div class="titulo trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10">Marcas</div>
            <div class="descripcion trans_bezier_05 trans_delay_03 anim-oculto-opacity anim-desplaza-derecha-10">Todos los productos que proveemos son compatibles con las marcas más reconocidas del mercado, pensando siempre en una segura operación, y con facilidad para realizar ampliaciones.

            </div>
          </bloque>

      </div> 


      <div class="comp-nosotros  " data-tipocarga="manual" data-autoanimado="true" data-tiemposlide="0" data-delay_animacion="0" data-mouse_events="false" data-animacion_pantalla="false">
        
        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Líder mundial en sistemas avanzados de control y automatización, innovando tecnología y reinventado la manera de cómo la gente vive y trabaja. Ofrece integrar soluciones de audio, video, iluminación, HVAC, teatro en casa y más, mejorando la calidad de vida en corporativos, escuelas y universidades, residencias, cuartos de control, auditorios y más. " data-img="IMG/MARCAS/crestron.png">            
          <ClassExtra DOMdestino="elem-img" class="trans_delay_08 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_1_01 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_1_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>

        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Luminarias para residencias, industrias, comercios Juno Iighting Group uno de los más grandes fabricantes y abastecedor de artefactos de Iluminación en USA y CANADA. Con certificación UL CSA." data-img="IMG/MARCAS/juno.png">

          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>

        </seccion>
        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Best Quality Lighting es una de las fabricas de iluminación que produce productos a base de bronce para iluminación de exteriores cuyos productos son duraderos en el tiempo y resistentes a la intemperie.<br>Todos los productos son fabricados para trabajar con lámparas de bajo voltaje (12v) con el objetivo de minimizar el riesgo en las zonas húmedas o aéreas de regadío." data-img="IMG/MARCAS/bestquality.jpg">

          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>
        

        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Compa&ntilde;&iacute;a norteamericana especializada en audio electr&oacute;nico fundada en 1946.<br>
        Sus productos comprenden una amplia gama dirigida tanto para el consumidor com&uacute;n como para el empresarial." data-img="IMG/MARCAS/jbl.png">

          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>
        
        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Soundcraft es una compa&ntilde;&iacute;a diseñadora británica e importadora (antes fabricante ) de mesas de mezclas y otros equipos de audio profesional.<br>
        Es una subsidiaria de Harman International Industries fundada en 1973." data-img="IMG/MARCAS/soundcraft.png">
          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>

        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Shure Incorporated es un fabricante de electrónica de audio profesional. Shure Incorporated produce generalmente micrófonos y otros componentes de audio, pero también produce auriculares para una variedad de aplicaciones de audio, incluyendo el uso en el escenario y reproductores de MP3." data-img="IMG/MARCAS/shure.png">


          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>

        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Compa&ntilde;&iacute;a japonesa que ofrece a sus clientes software, hardware y otros servicios relacionados, diseñan y proporcionan sistemas de conexión de banda ancha, telefonía móvil y sistemas de conexión inalámbricos.<br>
        Y entre su gama de dispositivos electrónicos incluye semiconductores, pantallas y otros componentes electrónicos." data-img="IMG/MARCAS/nec.png">

          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>
<!--
        <seccion data-fondosrc="vacio" data-fondomsrc="vacio" data-tipo="normal" data-titulo="" data-descripcion="Kramer Electronics es una empresa que diseña , fabrica y distribuye productos de gestión de señal para señales analógicas y digitales de vídeo , las señales de audio , gráficos señales de vídeo de ordenador y señales de control que se utilizan en la AV profesional, broadcast y de producción y mercados AV residenciales en todo el mundo." data-img="IMG/MARCAS/kramer.png">

          <ClassExtra DOMdestino="elem-img" class="trans_delay_01 trans_bezier_05 anim-escala_0">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-titulo" class="trans_delay_04 trans_bezier_05 anim-oculto-opacity anim-desplaza-izquierda-10">
          </ClassExtra>
          <ClassExtra DOMdestino="elem-info" class="trans_delay_07 trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10 anim-escala_x0">
          </ClassExtra>
        </seccion>
-->

        <ClassExtra DOMdestino="seccion-hito" class="comp-animacion-ini scroll_uniforme">
        </ClassExtra>

        <RemoverClass DOMdestino=".seccion-hito .elem-info" class="oculto" tiempodelay="0">
        </RemoverClass>

      </div>
</div>



  </section>


  <section id="clientes" class="scroll_uniforme comp-animacion-ini"  >
    
    <div class="seccion_clientes">

        <div class="comp-informacion comp-animacion-ini">

            <bloque data-iddom="definicion">
              <div class="titulo trans_bezier_05 anim-oculto-opacity anim-desplaza-derecha-10">Crecimiento</div>
              <div class="descripcion trans_bezier_05 trans_delay_03 anim-oculto-opacity anim-desplaza-derecha-10">Hemos ido creciendo po co a poco bla bla bla bla bla bla

              </div>
              <div class="estadisticas">
                <div class="titulo_grafico">
                  Aumento de nuestra<br>Cartera de Clientes
                </div>
                <div class="barras">
                  <div class="barra">
                    <div class="altura">
                      <div class="numero">3 clientes</div>
                      <div class="relleno"></div>
                    </div>
                  </div>
                  <div class="barra">
                    <div class="altura">
                      <div class="numero">32 clientes</div>
                      <div class="relleno"></div>
                    </div>
                  </div>
                  <div class="barra">
                    <div class="altura">
                      <div class="numero">71 clientes</div>
                      <div class="relleno"></div>
                    </div>
                  </div>
                  <div class="barra">
                    <div class="altura">
                      <div class="numero">142 clientes</div>
                      <div class="relleno"></div>
                    </div>
                  </div>

                </div>
                <div class="textos">
                  <div class="texto">1994</div>
                  <div class="texto">2001</div>
                  <div class="texto">2008</div>
                  <div class="texto">2015</div>
                </div>

              </div>
            </bloque>

        </div> 


        <div class="content_clientes scroll_uniforme">
          <div class="contenedor-tabla">
            <div class="contenedor-celda">
              
               <div class="titulo trans_bezier_05 anim-oculto-opacity anim-desplaza-abajo-10">Nuestros clientes m&aacute;s importantes<br>nos avalan</div>

                <div class="comp-consultor-elemento" data-elemento="cliente" data-conteo="100" data-dir_imagenes="IMG/CLIENTES/LOGOS">
                  
                  <estructura>
                    <div id="" class="img" style="background-image:url(IMG/CLIENTES/LOGOS/{foto})">                    
                    </div>

                  </estructura>
                </div>

            

            </div>
          </div>

        </div>



  </div>
     

  </div>



<div class="visor_pantalla_completa trans_bezier_05 oculto" data-item="producto">

    <div class="info_producto">
      <div class="btn_atras">
        Volver
      </div>
      <div class="img" style=""></div>
      <div class="titulo"> 
        <div class="contenedor-tabla">
          <div class="contenedor-celda">
            <div class="texto">Titulo producto</div>
          </div>
        </div>                  
      </div>
      <div class="content_info_extra">
        <div class="descripcion ">Esto es una descripcion del producto asd fasd fasdfad fasd fasdf asdf asf Esto es una descripcion del producto asd fasd fasdfad fasd fasdf asdf asf Esto es una descripcion del producto asd fasd fasdfad fasd fasdf asdf asf Esto es una descripcion del producto asd fasd fasdfad fasd fasdf asdf asf Esto es una descripcion del producto asd fasd fasdfad fasd fasdf asdf asf Esto es una descripcion del producto asd fasd fasdfad fasd fasdf asdf asf </div>
        <div class="postdata ">Postdata informaci&oacute;n adicional</div>
        <div class="pdf "><a>Descargar PDF</a> </div>
      </div>      
    </div>
</div>


<div class="visor_pantalla_completa trans_bezier_05 oculto" data-item="servicio">
  

  <div class="mostrador_servicio">
    <div class="content_info_servicio">
      <div class="info_servicio">

      <div class="btn_atras">
        Volver
      </div>
        <div class="img" style=""></div>
        <div class="titulo"> 
          <div class="contenedor-tabla">
            <div class="contenedor-celda">
              <div class="texto"></div>
            </div>
          </div>                  
        </div>
        <div class="content_info_extra">
          <div class="descripcion "> </div> 
        </div> 
        <div class="trabajos_realizados">
          Trabajos realizados
        </div>     
      </div>
          
      <div id="consulta_galeria" display="none">
          
          <div class="comp-consultor-elemento" data-elemento="trabajo_servicio" data-conteo="100" data-dir_imagenes="IMG/SERVICIOS/FOTOS/WEB">
            <dato data-id="id_servicio" data-valor="">
            </dato>
            <estructura>
              
              <foto data-src="IMG/SERVICIOS/FOTOS/WEB/{foto}" data-minisrc="IMG/SERVICIOS/FOTOS/MINI/{foto}" data-msrc="IMG/SERVICIOS/FOTOS/MOVIL/{foto}" data-url_youtube="{url_video}" data-tipotexto="texto_dividido" data-titulo="{titulo}" data-descripcion="{descripcion}"></foto>


            </estructura>
          </div>

      </div>

      <div class="fotos_servicio">       
        
      </div>

    </div>
  </div>


</div>


  <div id="productos" class=" columna-pagina none oculto" data-columna="productos">
   

    <section id="productos" class="area-pagina scroll_uniforme  comp-animacion-ini" data-area="productos"  >

      <div class="comp-informacion marcas ">

          <bloque>
            <div class="titulo trans_bezier_05 anim-oculto-opacity anim-desplaza-abajo">
              Mira los productos de las marcas con las que trabajamos<br>desde sus propias webs
            </div>
            <div class="imagenes">        
              <a href="http://www.crestron.com/" target="_blank"> 
                <div class="img_content trans_bezier_05 trans_delay_03 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img1" class="img trans_bezier_05">              
                    <img data-src="IMG/MARCAS/crestron.png" data-msrc="IMG/MARCAS/crestron.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img1">
                  </div>
                </div>   
              </a>  

              <a href="http://www.junolightinggroup.com/Brands/Juno" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_06 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img2" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/juno.png" data-msrc="IMG/MARCAS/juno.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img2">
                  </div>
                </div>   
              </a> 

              <a href="http://www.bestqualitylighting.com/" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_09 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img3" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/bestquality.jpg" data-msrc="IMG/MARCAS/bestquality.jpg" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img3">
                  </div>
                </div>
              </a>  

              <a href="http://es.shure.com/americas/products" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_1_02 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img4" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/shure.png" data-msrc="IMG/MARCAS/shure.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img4">
                  </div>
                </div>
              </a>  

              <a href="http://uk.jbl.com/jbl-homepage-uk.html" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_1_05 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img5" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/jbl.png" data-msrc="IMG/MARCAS/jbl.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img5">
                  </div>
                </div>
              </a>  

              <a href="http://www.soundcraft.com/products" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_1_08 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img6" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/soundcraft.png" data-msrc="IMG/MARCAS/soundcraft.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img6">
                  </div>
                </div>
              </a>  
<!--
              <a href="http://www.kramerelectronics.com/products" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_2_01 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img7" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/kramer.png" data-msrc="IMG/MARCAS/kramer.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img7">
                  </div>
                </div>
              </a>  -->

              <a href="http://www.nec.com/" target="_blank">
                <div class="img_content trans_bezier_05 trans_delay_2_01 anim-oculto-opacity anim-desplaza-abajo-10">    
                  <div id="img8" class="img trans_bezier_05">
                    <img data-src="IMG/MARCAS/nec.png" data-msrc="IMG/MARCAS/nec.png" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#productos .marcas #img8">
                  </div>
                </div>
              </a>               
            </div>
          </bloque>


      </div> 


      <div class="stock scroll_uniforme comp-animacion-ini">

            <div class="titulo_stock">
              Ofertas especiales en Stock
            </div>
           

          <div class="comp-consultor-elemento" data-elemento="producto" data-conteo="10" data-recarga="true" data-dir_imagenes="IMG/PRODUCTOS/WEB">
            

            <estructura>
              <div class="producto" data-id="{id}">
                <div class="img" style="background-image:url(IMG/PRODUCTOS/WEB/{foto});"></div>
                <div class="titulo"> 
                  <div class="contenedor-tabla">
                    <div class="contenedor-celda">
                      <div class="texto">{titulo}</div>
                    </div>
                  </div>                  
                </div>
              </div>
            </estructura>
          </div>

      </div> 




    </section>


  </div>




  <div  class=" columna-pagina none oculto" data-columna="servicios">
   

    <section id="servicios" class="area-pagina scroll_uniforme comp-animacion-ini" data-area="servicios"  >




      <div class="stock  ">

      <div class="titulo_stock trans_bezier_05 anim-oculto-opacity anim-desplaza-abajo">
       Servicios que proveemos
      </div>


          <div class="comp-consultor-elemento" data-elemento="servicio" data-conteo="10" data-recarga="true" data-dir_imagenes="IMG/SERVICIOS/WEB">
            <estructura>
              
                    <div class="servicio"  data-id="{id}">
                      <div class="img" style="background-image:url(IMG/SERVICIOS/WEB/{foto});"></div>
                      
                      <div class="titulo"> 
                        <div class="contenedor-tabla">
                          <div class="contenedor-celda">
                            <div class="texto">{titulo}</div>
                          </div>
                        </div>                  
                      </div>


                    </div>

            </estructura>
          </div>


      </div> 




    </section>


  </div>







  <section id="contactenos" class="area-pagina comp-animacion-ini scroll_uniforme" data-area="contacto">


        <img data-src="IMG/CONTACTENOS/fondo.jpg" data-msrc="IMG/CONTACTENOS/fondo.jpg" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#contactenos">

    <div class="comp-contactenos" data-tipocarga="manual" data-altura_extra="100" data-alturawindow="true">

      <div data-elemento="infoextra" data-titulo="" data-telefono="<div class='img_content'> <img data-src='IMG/CONTACTENOS/icono1.png'></div>Ll&aacute;manos <span id='telefono_info'>123456789</span> " data-email="<div class='img_content'> <img data-src='IMG/CONTACTENOS/icono2.png'></div><span>Env&iacute;anos un correo a</span><br><span id='email_info'>ventas@acmtechnology.com.pe</span>" data-direccion="<div class='img_content'> <img data-src='IMG/CONTACTENOS/icono3.png'></div><span>Estamos en: </span><span id='direccion_info'></span>"></div>
    
      <div data-elemento="ubicanos" data-alturaboton="70" data-latitud="-11.892347" data-longitud="-77.033181"></div>

      <div data-elemento="pie" data-altura="40" data-texto="<span>Copyright © AC Technology S.A.C. - Desarrollado por Dante Vidal"></div>


        <dato campo="nombre" nombre="Nombre:" tipo="input" src="IMG/CONTACTENOS/form_icono1.png">
        </dato>
        <dato campo="correo" nombre="Correo electr&oacute;nico:" tipo="input" src="IMG/CONTACTENOS/form_icono2.png">
        </dato>
        <dato campo="telefono" nombre="Tel&eacute;fono o celular:" tipo="input" src="IMG/CONTACTENOS/form_icono3.png">
        </dato>
        </dato>
        <dato campo="mensaje" nombre="Mensaje:" tipo="textarea" src="IMG/CONTACTENOS/form_icono4.png">
        </dato>

      


        <ClassExtra DOMdestino="comp-contactenos-alineador" class="trans_bezier_05 anim-oculto-opacity anim-desplaza-arriba">
        </ClassExtra>
        <ClassExtra DOMdestino="comp-contactenos-cuerpo" class="trans_bezier_05 trans_delay_05 anim-oculto-opacity anim-escala_x0">
        </ClassExtra>
        <ClassExtra DOMdestino="info_extra" class="trans_bezier_05 trans_delay_1 anim-oculto-opacity anim-desplaza-izquierda">
        </ClassExtra>        
        <ClassExtra DOMdestino="infoextra-titulo" class="responsive-fontsize">
        </ClassExtra>
        <ClassExtra DOMdestino="infoextra-telefono" class="responsive-fontsize">
        </ClassExtra>
        <ClassExtra DOMdestino="infoextra-email" class="responsive-fontsize">
        </ClassExtra>
        <ClassExtra DOMdestino="infoextra-direccion" class="responsive-fontsize">
        </ClassExtra>


        <AttrExtra DOMdestino="infoextra-titulo" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        <AttrExtra DOMdestino="infoextra-telefono" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        <AttrExtra DOMdestino="infoextra-email" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        <AttrExtra DOMdestino="infoextra-direccion" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        

        <HtmlExtra DOMdestino="comp-contactenos" posicion="final">
          <div class="banner_enviar_cv">
              
              <div class="texto2">¿Eres Ing. Electr&oacute;nico o Ing. El&eacute;ctrico?</div>
              <div class="texto">Env&iacute;anos tu curr&iacute;culum</div>
            
          </div>
        </HtmlExtra>


    </div>
  
  </section>



  <div class="contenedor_enviar_cv trans_bezier_05 oculto">
    <div class="mensaje_cv_enviado trans_bezier_05 oculto">
      Tu CV fue enviado con &eacute;xito
    </div>
    <div class="interfaz_enviar_cv trans_bezier_05 oculto">
      <div class="btn_atras">
        Volver
      </div>
      <div class="cuerpo">
        <div class="form_enviar_cv">

          <div class="contenedor_btn_adjuntar trans_bezier_05">

            <div class="btn_subir_cv trans_bezier_05">
              <div class="simbolo trans_bezier_05"></div>
              <div class="texto">Adjuntar<br>Curr&iacute;culum Vitae</div>
            </div>
            <div class="mensaje_error oculto">
              No hay archivo cargado
            </div>
          </div>
          <div class="vista_previa_pdf trans_bezier_05 oculto">
            <div class="imagen"></div>
            <div class="texto"></div>
          </div>
          <div class="separador"></div>
          <div class="texto">Solo se admiten PDF</div>
          <div class="texto">No olvides incluir tus datos de contacto en tu CV</div>
          <div class="btn_enviar_cv">
            <div class="texto">Enviar</div>
          </div>
        </div>
        <form method="post"  style="display:none;" enctype="multipart/form-data">
          <input id="form_subir_cv" accept=".pdf" onchange="fun_mostrar_pdf_adjunto(this);" type="file" name="cv">
        </form>
      </div>              
    </div>

  </div>
<!--




  <section id="contactenos" class="area-pagina comp-animacion-ini scroll_uniforme" data-area="contacto">


      <img data-src="IMG/fondo_pasteles.jpg" data-msrc="IMG/fondo_pasteles.jpg" class="comp-cargando-img-redirect" data-redirect="true" data-destino="#contactenos">

    <div class="comp-contactenos" data-tipocarga="manual"  data-alturawindow="true">

      <div data-elemento="infoextra" data-titulo="" data-telefono="<div class='img_content'> <img data-src='IMG/CONTACTENOS/icono1.png'></div><span id='telefono_info'>Ll&aacute;manos 990 - 467 - 371</span> " data-email="<div class='img_content'> <img data-src='IMG/CONTACTENOS/icono2.png'></div><span id='email_info'>Env&iacute;anos un correo a<br>ventas@pasteleriaminsus.pe</span>" data-direccion=""></div>

      <div data-elemento="pie" data-altura="50" data-texto="<span>Copyright © 2015 Minsus S.A.C. - Desarrollado por Dante Vidal"></div>


        <dato campo="nombre" nombre="Nombre:" tipo="input" src="IMG/CONTACTENOS/form_icono1.png">
        </dato>
        <dato campo="correo" nombre="Correo electr&oacute;nico:" tipo="input" src="IMG/CONTACTENOS/form_icono2.png">
        </dato>
        <dato campo="telefono" nombre="Tel&eacute;fono o celular:" tipo="input" src="IMG/CONTACTENOS/form_icono3.png">
        </dato>
        </dato>
        <dato campo="mensaje" nombre="Mensaje:" tipo="textarea" src="IMG/CONTACTENOS/form_icono4.png">
        </dato>
      


        <ClassExtra DOMdestino="comp-contactenos-alineador" class="trans_bezier_05 anim-oculto-opacity anim-desplaza-arriba">
        </ClassExtra>
        <ClassExtra DOMdestino="comp-contactenos-cuerpo" class="trans_bezier_05 trans_delay_05 anim-oculto-opacity anim-escala_x0">
        </ClassExtra>
        <ClassExtra DOMdestino="info_extra" class="trans_bezier_05 trans_delay_1 anim-oculto-opacity anim-desplaza-izquierda">
        </ClassExtra>        
        <ClassExtra DOMdestino="infoextra-titulo" class="responsive-fontsize">
        </ClassExtra>
        <ClassExtra DOMdestino="infoextra-telefono" class="responsive-fontsize">
        </ClassExtra>
        <ClassExtra DOMdestino="infoextra-email" class="responsive-fontsize">
        </ClassExtra>
        <ClassExtra DOMdestino="infoextra-direccion" class="responsive-fontsize">
        </ClassExtra>


        <AttrExtra DOMdestino="infoextra-titulo" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        <AttrExtra DOMdestino="infoextra-telefono" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        <AttrExtra DOMdestino="infoextra-email" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>
        <AttrExtra DOMdestino="infoextra-direccion" atributos="data-propfontsize='8' data-minfontsize='20'">
        </AttrExtra>

    </div>
  
  </section>
-->


</div>





<div id="btn_abrir_chat" >
  Chat de atención
</div>


<div id="chat_contacto" class="caja_chat">

   <div class="titulo_caja_chat" >
    Atención al cliente
   </div>

  <div id="div_conectado">
  <div id="caja_geochat-admin" class="caja_geochat_admin">
    <div class="container_conversacion"> 
      
      <div class="conversacion">
        <div class="user_expresion ">       
          <div class="content_cab_mensajes">
            <div class="tiempo_mensaje"></div>
          </div>
          <div class="mensajes">
            <div class="user_mensaje">Hola <br>
            Bienvenido a AC Technology.<br>
            ¿En qu&eacute; podemos ayudarte?<br>
            </div>
          </div>
        </div>
      </div> 
      <div class="div_aviso_visto_escribiendo" style="visibility: hidden;"></div>
    </div>


    <div class="caja_nuevo_mensaje">
      <textarea class="geo_chat_nuevo_msj" data-alias="admin" onkeydown="fun_enviar_mensaje_geochat(event,$(this));fun_cancela_keyup(event,$(this));"></textarea>   
    </div>
    <input class="caja_geo_chat-de_quien_primer_msj" type="hidden" value=""/>
    <input class="caja_geo_chat-de_quien_ultimo_msj" type="hidden" value=""/>

  </div>

  </div>

  <div id="div_conectar">
    <div class="text campo1">
      Escribe un nombre para conectarte
    </div>
    <div class="text campo2">
      <input type="text" id="chat_contacto_username" placeholder="Nombre"/>
      <span id="aviso_nombre_chat">Debes escribir un nombre</span>
    </div>
    <div class="text">
      <input type="button" value="Conectar al chat" id="btn_conectar_chat">
      <div class="loading40" id="cargando_conectar_chat"></div> 
    </div>    
  </div>

  <div id="no_conectar_chat">   
    <div class="text">
      Lo sentimos, por ahora no hay personal que pueda atenderlo.<br><br>
      <a id="mostrar_email_contacto">Haga click aquí</a> para enviarnos un e-mail de contacto.
    </div>  
  </div>    
</div>






<!--<div id="debug" style="position:fixed; bottom:0; left:0; width:300px; height: 200px; background: white; z-index:5000;"></div>-->

<input type="hidden" id="mi_propio_username" value=""/>


</body></html>