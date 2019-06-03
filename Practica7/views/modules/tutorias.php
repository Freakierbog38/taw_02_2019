<?php

// session_start();

// if(!$_SESSION["validar"]){
// 	header("location:index.php?action=ingresar");
// 	exit();
// }

?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h1 class="box-title">TUTORIAS</h1>
					<td><a href="index.php?action=registro_tutoria"><button class="btn btn-success">Agregar Nueva Tutoria</button></a></td>
					<table id="table" border="0" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Hora</th>
								<th>Fecha</th>
								<th>Tema</th>
								<th>Tipo</th>
								<th>¿Detalles?</th>
								<th>¿Eliminar?</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$vistaAlumno = new MvcController();
							$vistaAlumno -> vistaTutoriasController();
							$vistaAlumno -> borrarTutoriaController();

							?>

						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		echo "Cambio Exitoso";
	}
}

?>


