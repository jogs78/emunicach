  <div class="page-sidebar" id="main-menu"> 
  <!-- BEGIN MINI-PROFILE -->
   <div class="user-info-wrapper">	
	<div class="profile-wrapper">
		<img src="<?php echo $path?>"  alt="" width="69" height="69" />
	</div>
    <div class="user-info">
      <div class="greeting">Hola</div>
      <div class="username"><?php echo $_SESSION['nombre']; ?> <span class="semi-bold"></span></div>
      <div class="status">Status<a href="#"><div class="status-icon green"></div>Online</a></div>
    </div>
   </div>
  <!-- END MINI-PROFILE -->
   
   <!-- BEGIN SIDEBAR MENU -->	
	<p class="menu-title">ACTUALIZAR <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
    <ul>
    
<?php if($objP->validar(1,$_SESSION['idu'])){ ?>	
      <li class="start active "> <a href="principal.php"> <i class="icon-custom-home"></i> <span class="title">Dashboard</span> <span class="selected"></span> <span class="badge badge-important pull-right">5</span></a> </li>      
<?php } ?>

<?php if($objP->validar(2,$_SESSION['idu'])){ ?>
      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Mi Cuenta</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
		<?php if($objP->validar(2,$_SESSION['idu'])){ ?>
		  <li > <a href="mixinfo.php"> Información </a> </li>
		<?php } ?>
        </ul>
      </li>
<?php } ?>

<?php if($objP->validar(5,$_SESSION['idu']) || $objP->validar(6,$_SESSION['idu'])){ ?>
      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Ciclo Escolar</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
		<?php if($objP->validar(5,$_SESSION['idu'])){ ?>
		  <li > <a href="#"> Registrar </a> </li>
		<?php } ?>
		<?php if($objP->validar(6,$_SESSION['idu'])){ ?>
		  <li > <a href="cescolarxlistado.php"> Listado de Ciclos Escolares</a> </li>
		<?php } ?>
        </ul>
      </li>
<?php } ?>


      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Docentes</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
		  <li > <a href="#"> Listado de Docentes</a> </li>
        </ul>
      </li>


<?php if($objP->validar(3,$_SESSION['idu']) || $objP->validar(4,$_SESSION['idu'])){ ?>
      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Grupos</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
		<?php if($objP->validar(3,$_SESSION['idu'])){ ?>
		  <li > <a href="#"> Registrar </a> </li>
		<?php } ?>
		<?php if($objP->validar(4,$_SESSION['idu'])){ ?>
		  <li > <a href="#"> Listado de Grupos</a> </li>
		<?php } ?>
        </ul>
      </li>
<?php } ?>

      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Materias</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">

		  <li > <a href="#"> Registrar </a> </li>

		  <li > <a href="#"> Listado de Materias</a> </li>

        </ul>
      </li>

<?php if($objP->validar(7,$_SESSION['idu']) || $objP->validar(8,$_SESSION['idu'])){ ?>
      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Salones</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
		<?php if($objP->validar(7,$_SESSION['idu'])){ ?>
		  <li > <a href="salonesxr.php"> Registrar </a> </li>
		<?php } ?>
    	<?php if($objP->validar(8,$_SESSION['idu'])){ ?>
		  <li > <a href="salonesxlistado.php"> Listado de Salones </a> </li>
		<?php } ?>
        </ul>
      </li>
<?php } ?>

<?php if($objP->validar(9,$_SESSION['idu'])){ ?>
      <li class=""> <a href="javascript:;"> <i class="icon-custom-ui"></i> <span class="title">Usuarios</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
    	<?php if($objP->validar(9,$_SESSION['idu'])){ ?>
		  <li > <a href="usuariosxnuevos.php"> Usuarios Nuevos </a> </li>
		<?php } ?>
        </ul>
      </li>
<?php } ?>
	  
	  <li class="hidden-lg hidden-md hidden-xs" id="more-widgets" > <a href="javascript:;"> <i class="fa fa-plus"></i></a> 
		  <ul class="sub-menu">
		  	<li class="side-bar-widgets">
			<p class="menu-title">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="icon-plus"></i></a></span></p>
			<ul class="folders" >
				  <li><a href="#"><div class="status-icon green"></div> Notas </a> </li>
				  <li><a href="#"><div class="status-icon red"></div> Pendientes </a> </li>
				  <li><a href="#"><div class="status-icon blue"></div> Proyectos </a> </li>
				  <li class="folder-input" style="display:none"><input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" id="folder-name"></li>
			</ul>
			<p class="menu-title">PROYECTOS </p>
				<div class="status-widget">
					<div class="status-widget-wrapper">
						<div class="title">Freelancer<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
						<p>Redesign home page</p>
					</div>
				</div>
				<div class="status-widget">
					<div class="status-widget-wrapper">
						<div class="title">envato<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
						<p>Statistical report</p>
					</div>
				</div>
			</li>
		</ul>
	  </li>    
    </ul>
	
	<a href="#" class="scrollup">Scroll</a>
	<div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
  </div>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>		
	</div>
	<div class="pull-right">
		<div class="details-status">
		<span class="animate-number" data-value="86" data-animation-duration="560">86</span>%
	</div>	
	<a href="lockscreen.html"><i class="fa fa-power-off"></i></a></div>
  </div>