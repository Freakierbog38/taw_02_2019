<?php

// session_start();

// if(!$_SESSION["validar"]){
// 	header("location:index.php?action=ingresar");
// 	exit();
// }

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h1 class="box-title">ALUMNOS</h1>
					<table id="table_alumnos" border="0" class="table table-striped table-bordered display">
						<thead>
							<tr>
								<th>Matricula</th>
								<th>Nombre</th>
								<th>Carrera</th>
								<th>Tutor</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$vistaAlumno = new MvcController();
							$vistaAlumno -> vistaReporteAlumnosController();

							?>

						</tbody>
					</table>
					<hr>
					<h1>MAESTROS</h1>
					<table id="table_maestros" border="0" class="table table-striped table-bordered display">
						<thead>
							<tr>
								<th>Num. Empleado</th>
								<th>Nombre</th>
								<th>Email</th>
								<th>Carrera</th>
								<th>Nivel</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$vistaMaestro = new MvcController();
							$vistaMaestro -> vistaReporteMaestrosController();

							?>

						</tbody>
					</table>
					<h1>TUTORIAS</h1>
					<table id="table_tutorias" border="0" class="table table-striped table-bordered display">
						<thead>
							<tr>
								<th>Id</th>
								<th>Hora</th>
								<th>Fecha</th>
								<th>Tema</th>
								<th>Tipo</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$vistaTutorias = new MvcController();
							$vistaTutorias -> vistaReporteTutoriasController();

							?>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
<?php

?>


