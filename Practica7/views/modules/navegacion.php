<div class="main-menu">
	<header class="header">
		<a href="index.php" class="logo">TAW</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="http://placehold.it/80x80" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="#">Admin</a></h5>
			<h5 class="position">Administrator</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="index.php?action=logout"><i class="fa fa-sign-out"></i> Log out</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Navegación</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-flag"></i><span>Alumnos</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="index.php?action=createAlumno">Agregar Alumno</a></li>
						<li><a href="index.php?action=listaAlumno">Lista de alumnos</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
                <li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-flag"></i><span>Maestros</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="index.php?action=createMaestro">Agregar Maestro</a></li>
						<li><a href="index.php?action=listaMaestro">Lista de Maestro</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
			</ul>
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item fa fa-power-off js__logout"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->