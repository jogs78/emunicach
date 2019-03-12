<?php
require 'clases/config.php';
require 'clases/db.php';
require 'clases/permiso.php';
require 'clases/grupo.php';

use Clases\Config;
use Clases\Db;
use Clases\Permiso;
use Clases\Grupo;

session_start();

// EVITAMOS SUPLANTACION DE SESSIONES
if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['nav'] != $_SERVER['HTTP_USER_AGENT']){
    header("Location: index.php");	
	}

// VALIDAMOS SESION DE SISTEMA
if($_SESSION['nsesion'] != "UNICACH20160801"){
    header("Location: index.php");	
	}

// VERIFICA SESSION ACTIVA
if(!isset($_SESSION['idu'])){
	header("Location: index.php");
	}

$objP = new Permiso();
// VERIFICA PERMISO DE MODULO
if($objP->validar(1,$_SESSION['idu']) == NULL)
	header("Location: index.php");
else{
	
	$objG = new Grupo();
	$datosG = $objG->getListadoGrupoActivosInscripcion();
	$listadoG = count($datosG);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Escuela de Música Unicach</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
	<?php include('_header.php'); ?>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
	<?php include('_sidebarxl.php'); ?>
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <p>INICIO</p>
        </li>
        <li><a href="#" class="active">Bienvenido</a></li>
      </ul>
      
		<div class="page-title">		
		</div>
        
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple ">
            <div class="grid-title no-border">
              <h4>Noticias <span class="semi-bold"></span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body no-border">
              <div class="row-fluid">

				<?php		
                for($i=0; $i<$listadoG; $i++){						
                    $np = $i + 1;
                    $np=sprintf("%02d",$np);
					$k = $datosG[$i]['k'];
					
echo "<div class='alert alert-info'>";
echo "<button class='close' data-dismiss='alert'></button>";
echo "Próximo a aperturarse <a href='inscripcion.php?k=$k' class='link'>".$datosG[$i]['modalidad']." ".$datosG[$i]['nombre']."</a> ".$datosG[$i]['turno'];
echo "<a href='inscripcion.php?k=$k'><button class='btn btn-info btn-sm btn-small pull-right' type='button'>Inscribirme</button></a>";
echo "</div>";
                    }
                ?>              
            </div>
          </div>
        </div>
      </div>
        
    </div>
  </div>
 </div>
<!-- END CONTAINER --> 
<!-- BEGIN CHAT --> 
	<?php include('_sidebarxr.php'); ?>
<!-- END CHAT --> 
<!-- END CONTAINER -->

<!-- BEGIN CORE JS FRAMEWORK--> 
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<!-- END CORE JS FRAMEWORK --> 
<!-- BEGIN PAGE LEVEL JS --> 	
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script> 	
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS --> 	

<!-- BEGIN CORE TEMPLATE JS --> 
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS --> 
</body>
</html>
<?php } ?>