<?php
session_start();

require 'clases/config.php';
require 'clases/db.php';
require 'clases/grupo.php';
require 'clases/permiso.php';

use Clases\Config;
use Clases\Db;
use Clases\Grupo;
use Clases\Permiso;

$objP = new Permiso();

$obj = new Grupo();
$datos = $obj->getListadoGrupos();
$listado = count($datos);
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
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
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
          <p>CLASES</p>
        </li>
        <li><a href="#" class="active">Horarios de Clases</a> </li>
      </ul>

      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Generación de Horarios por Grupo <span class="semi-bold"></span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">   
                <table class="table table-hover table-condensed" id="example">
                  <thead>
                    <tr>
                      <th class="hidden"></th>
                      <th class="text-center" style="width:5%">NP</th>
                      <th class="text-center" style="width:5%">ID</th>
                      <th class="text-center" style="width:10%">Ciclo</th>
                      <th class="text-center" style="width:10%">CVE</th>
                      <th class="text-center" style="width:20%">Modalidad</th>
                      <th class="text-center" style="width:20%">Nombre</th>
                      <th class="text-center" style="width:20%">Turno</th>
                      <th class="text-center" style="width:10%">Cupo</th>
                      <th class="text-center" style="width:10%">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php		
                    for($i=0; $i<$listado; $i++){						
                        $np = $i + 1;
						$np=sprintf("%02d",$np);
						$k = $datos[$i]['k'];
						echo "<tr>";
                        echo "<td class='hidden'></td>";
						echo "<td><span>".$np."</span></td>";
                        echo "<td align='center'><span>".$datos[$i]['idgrupo']."</span></td>";
                        echo "<td align='center'><span>".$datos[$i]['ciclo']."</span></td>";
                        echo "<td align='center'><span>".$datos[$i]['cvegrupo']."</span></td>";
						echo "<td align='center'><span>".$datos[$i]['modalidad']."</span></td>";
						echo "<td align='center'><span>".$datos[$i]['nombre']."</span></td>";
						echo "<td align='center'><span>".$datos[$i]['turno']."</span></td>";
                        echo "<td align='center'><span>".$datos[$i]['cupo']."</span></td>";
                        echo "<td align='center'>
							<a href='horarioxr.php?k=$k' title='Generar Horario'><i class='fa fa-list-alt'></i></a>
							</td>";
                        echo "</tr>";
                        }
                    ?>
                  </tbody>
                </table>
        
            </div>
          </div>
        </div>
      </div>
      
      <div class="addNewRow"></div>
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
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/js/datatables.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->
</body>
</html>