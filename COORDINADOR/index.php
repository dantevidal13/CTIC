<?php 
session_start();

require_once('../UTIL/variables_globales.php');

if(!isset($_SESSION['user'])){	

        header('location:../ADMIN');
}else{

	switch($_SESSION['grupo']){
		case 1:
        	header('location:../SUPER');
        break;
        
	}

}
?>


<!DOCTYPE html>
<html ng-app='angularRoutingApp'>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>COORDINADOR</title>
	<base href="<?php echo $GL_DNS;?>/"></base>

	<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="CSS/estilo_general.css"/>
	<link rel="stylesheet" type="text/css" href="COORDINADOR/CSS/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="COORDINADOR/default.css" />
	<script src="vendor/jquery.min.js"></script>
	<script type="text/javascript" src="JS/funciones_generales.js"></script>
	<script type="text/javascript" src="COMPONENTES/ini_coordinador.js"></script>
	<script src="vendor/angular.min.js"></script>
	<script src="vendor/angular-route.js"></script>
	<script src="COORDINADOR/app.js"></script>
	<script src="ADMIN/JS/funciones_close.js"></script>

</head>


<body ng-controller='mainController'>

<section>
  <div id="cargando" class="comp-cargando" data-srclogo="">

    <div data-elemento="imagen" data-src="IMG/logo-uni.png" data-expandido="false"></div>
    <div data-elemento="barra"></div>
  </div>
</section>


	<div id="maincontent">
		<div id="cabecera" >
			<div id="fecha"><span class="centrado">Martes 20 de octubre del 2015</span></div>
			<div class="div_cerrar_sesion"><span class="derecha">Cerrar sesion  </span></div>

			<div id="bienvenida"><span class="derecha">Bienvenido <?php echo $_SESSION['nombre']?>  </span></div>
			
		</div>

		<div id="cuerpo">


			<div id="menu">

			      <div class="comp-menu-fijo comp-animacion-ini trans_bezier_05"   data-tipo="menu-izquierda" data-animaciondelay="0.5" data-srclogo="IMG/logo-uni.png">


			        <ClassExtra DOMdestino="img-logo" class="trans_bezier_05 trans_delay_05 anim-desplaza-arriba anim-oculto-opacity">
			        </ClassExtra>


			        <opcion columna="configuracion" texto="Configuraci&oacute;n" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_03 anim-desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>


			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#configuracion'">
			          </AttrExtra>
			        </opcion>


			        <opcion columna="institucion" texto="Instituci&oacute;n" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_06 anim-desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>


			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#institucion'">
			          </AttrExtra>
			        </opcion>

<!--
			        <opcion columna="modulos" texto="M&oacute;dulos" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_09 anim-desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>

			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#modulos'">
			          </AttrExtra>

			        </opcion>


			        <opcion columna="usuarios" texto="Usuarios" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_02 anim-desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>

			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#usuarios'">
			          </AttrExtra>

			        </opcion>


			        <opcion columna="grupos"  texto="Grupos" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_05 anim-desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>

			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#grupos'">
			          </AttrExtra>
			        </opcion>
-->


			         <opcion columna="programa"  texto="Programas Acad&eacute;micos" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_09 anim-desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>

			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#programa'">
			          </AttrExtra>
			        </opcion>



			         <opcion columna="plan_estudio"  texto="Planes de Estudio" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_02 anim-_desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>

			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#plan_estudio'">
			          </AttrExtra>
			        </opcion>

			         <opcion columna="plan_estudio"  texto="Banco de Cursos" >

			          <ClassExtra DOMdestino="comp-menu-opcion" class="trans_bezier_05 trans_delay_1_05 anim-_desplaza-izquierda anim-oculto-opacity">
			          </ClassExtra>

			          <AttrExtra DOMdestino="comp-menu-opcion" atributos="href='COORDINADOR/#curso'">
			          </AttrExtra>
			        </opcion>



			      </div>
			</div>

			<div id="mainbody"  ng-view>

<!--Angular -->

			</div>
		</div>
	</div>
</body>
</html>
