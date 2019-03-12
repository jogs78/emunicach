<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/permiso.php';
require 'clases/pestudio.php';
require 'clases/materia.php';

use Clases\Config;
use Clases\Db;
use Clases\Permiso;
use Clases\Pestudio;
use Clases\Materia;

$objP = new Permiso();

$objPE = new Pestudio();
$pestudios = $objPE->getListadoPestudio();
$longitudPE = count($pestudios);

$objM = new Materia();
$materias = $objM->getListadoMateria();
$longitudM = count($materias);

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
          <p>REGISTRO</p>
        </li>
        <li><a href="#" class="active">Registro de Materias</a> </li>
      </ul>

       <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Registrar Materia<span class="semi-bold"></span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border">
				<form id="form" action="materiasxrxg.php" method="post">

                      <div class="form-group">
                        <label class="form-label">Plan de estudio</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
                            <select style="width:100%" name="fkplan" required>
                                <option value="" selected>Elegir...</option>                                        
                                <?php                        
                                for($i=0; $i<$longitudPE; $i++){						
                                    echo "<option value='".$pestudios[$i]['idplandeestudio']."'>".
                                    $pestudios[$i]['nombre']." - ".$pestudios[$i]['anio']."</option>";
                                    }
                                ?>
                            </select>
						</div>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label">Materia Anterior</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
                            <select style="width:100%" name="fkmateriaant" required>
                                <option value="" selected>Elegir...</option> 
                                <option value="0">No aplica</option>                                        
                                <?php                        
                                for($i=0; $i<$longitudM; $i++){						
                                    echo "<option value='".$materias[$i]['idmateria']."'>".
                                    $materias[$i]['materia']."</option>";
                                    }
                                ?>
                            </select>                                  

						</div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Nombre de la Materia</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input type="text" name="materia" id="materia" value="" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Materia Siguiente</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
                            <select style="width:100%" name="fkmateriasig" required>
                                <option value="" selected>Elegir...</option> 
                                <option value="0">No aplica</option>                                        
                                <?php                        
                                for($i=0; $i<$longitudM; $i++){						
                                    echo "<option value='".$materias[$i]['idmateria']."'>".
                                    $materias[$i]['materia']."</option>";
                                    }
                                ?>
                            </select>
						</div>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-label">Creditos</label>
						<div class="input-with-icon  right">                                       
							<i class=""></i>
							<input class="span6" type="number" name="creditos" id="creditos" value="" class="form-control" required>
                        </div>
                      </div>

				  <div class="form-actions">  
					<div class="pull-right">
					  <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i> Registrar</button>
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