<?php 
session_start();

require_once('../UTIL/variables_globales.php');

if(isset($_SESSION['user'])){	

    switch($_SESSION['grupo']){
      case 2: 
        header('location:../COORDINADOR');
      break;
      case 1: 
        header('location:../SUPER');
      break;
    }
}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta charset="utf-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<meta name="author" content="Dante Vidal Tueros, Analista Desarrollador"/>	
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="">
	<meta property="og:title" content="">
	<meta property="og:description" content="">	
	<!--<meta property="og:image" content="<?php echo $og_image;?>">	-->
	<base href="<?php echo $GL_DNS;?>/"></base>
	
	<meta name="description" content="">
  <link rel="shortcut icon" href="IMG/icon.png">

  <script type="text/javascript" src="JS/LIBRERIAS/jquery-2.1.1.min.js"></script>  
  <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> -->
  <script type="text/javascript" src="JS/funciones_generales.js"></script>   

  <script type="text/javascript"  src="ADMIN/JS/funciones_login.js"></script> 
  <script type="text/javascript"  src="ADMIN/JS/funciones.js"></script> 

  <link rel="stylesheet" type="text/css" href="CSS/estilo_general.css" media="screen"/>
  <link rel="stylesheet" type="text/css" href="CSS/estilo_componentes.css" media="screen"/>

  <link rel="stylesheet" type="text/css" href="ADMIN/CSS/estilo.css" media="screen"/>

  <script type="text/javascript" src="COMPONENTES/ini_admin_login.js"></script>   

  <title></title>
</head>

<body>





<section>
  <div id="cargando" class="comp-cargando" data-srclogo="">
    <div data-elemento="imagen" data-src="IMG/logo-uni.png"></div>
    <div data-elemento="barra"></div>
    <div data-elemento="fondo" data-src="" data-expandido="false"></div>
  </div>
</section>





<div id="content_home" class="trans_bezier_1">

    <section id="inicio" class="area-pagina-inicio comp-animacion-ini" data-animaciondelay="1">

        <div class="comp-slider-full" data-tipocarga="manual" data-botones="true" data-tipobotones="multiple" data-autoanimado="true" data-tiemposlide="10">

          <slide data-src="IMG/slide1.jpg" data-msrc="IMG/slide1.jpg" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>
       
          <slide data-src="IMG/slide2.jpg" data-msrc="IMG/slide2.jpg" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>
      
          <slide data-src="IMG/slide3.png" data-msrc="IMG/slide3.png" data-tipotexto="texto_dividido" data-subtexto="" data-texto="">
          </slide>   

        <HtmlExtra DOMdestino="comp-slider-contenedor" posicion="final">
              
          

          <div id="caja_login" class="trans_bezier_05">

            <div id="campo_user" class="campo trans_bezier_05">
              <input type="text" id="username" placeholder="Usuario" autocomplete="off">
              <span class="trans_bezier_05"> Escribe tu Username</span>
            </div>
            <div id="campo_pass" class="campo trans_bezier_05">
              <input type="password" id="password" placeholder="Contraseña" autocomplete="off">
              <span class="trans_bezier_05">Escribe tu Contraseña</span>
            </div>

            <div id="campo_btn" class="campo">
              <input type="button" id="btn_logear" class="trans_bezier_05" value="Ingresar">
              
            </div>

            <span id="aviso_no_login" class="trans_bezier_05">Usuario o Contraseña incorrectos</span>
            
          </div>


        </HtmlExtra>

  


      </div>



    </section>

</div>


</body>
</html>