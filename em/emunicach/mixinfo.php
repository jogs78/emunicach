<?php
session_start();

$idusuario = $_SESSION['idu'];

require 'clases/config.php';
require 'clases/db.php';
require 'clases/usuario.php';
require 'clases/permiso.php';

use Clases\Config;
use Clases\Db;
use Clases\Usuario;
use Clases\Permiso;

$objP = new Permiso();

$obj = new Usuario();
$datos = $obj->getUsuarioDetalle($idusuario);
if(count($datos) >= 1){
	$fnc = $datos[0]['fnacimiento'];
	$sex = $datos[0]['sexo'];
	$dir = $datos[0]['direccion'];
	$ciu = $datos[0]['ciudad'];
	$est = $datos[0]['estado'];
	$cp  = $datos[0]['cp'];
	$tel = $datos[0]['telefono'];
	}
else{
	$fnc = "";
	$sex = "";
	$dir = "";
	$ciu = "";
	$est = "";
	$cp  = "";
	$tel = "";
	}
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

<!-- BEGIN PLUGIN CSS -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->
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
<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
	<?php include('_header.php'); ?>
<!-- END HEADER --> 
<!-- BEGIN CONTAINER -->
<div class="page-container row"> 
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
          <p>MI CUENTA</p>
        </li>
        <li><a href="#" class="active">Información</a> </li>
      </ul>

       <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Información General <span class="semi-bold"></span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border">
				<form id="form" action="mixinfoxg.php" method="post">

                      <div class="form-group">
                        <label class="form-label">Fecha de Nacimiento *</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input class="span6" type="date" name="fnacimiento" id="fnacimiento" value="<?php echo $fnc; ?>" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Sexo *</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
                            <select class="form-control" name="sexo" id="sexo" style="width:30%" required>
                                <option value=""  <?php if($fnc = ''){ echo 'selected';} ?>>Elegir...</option>
                                <option value="F" <?php if($fnc = 'F'){ echo 'selected';} ?>>Femenino</option>
                                <option value="M" <?php if($fnc = 'M'){ echo 'selected';} ?>>Masculino</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Dirección</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<textarea class="form-control" rows="3" name="direccion"><?php echo $dir; ?></textarea>
						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Ciudad</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input style="width:50%" type="text" name="ciudad" id="ciudad" value="<?php echo $ciu; ?>" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Estado *</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input style="width:50%" type="text" name="estado" id="estado" value="<?php echo $est; ?>" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">CP *</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input class="span6" type="number" name="cp" id="cp" value="<?php echo $cp; ?>" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Telefono *</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input class="span6" type="text" name="tel" id="tel" value="<?php echo $tel; ?>" class="form-control" required>
                        </div>
                      </div>

				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Guardar Información</button>
					  <button type="button" class="btn btn-white btn-cons">Regresar</button>
					</div>
					</div>
				</form>
                </div>
              </div>
            </div>		
            
          </div>	  
      
    </div>
  </div>
</div>
<!-- END PAGE -->
<!-- BEGIN CHAT --> 
	<?php include('_sidebarxr.php'); ?>
<!-- END CHAT --> 
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/js/form_validations.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->
</body>
</html>