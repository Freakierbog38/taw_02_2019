<?php
$datosController = $_GET["id"];
$r = Datos::unRegistroModel("materias", $datosController);
$m = Datos::unRegistroModel("materias_catalogo", $r["id_materia"]);
?>
<script language="JavaScript">
	function pregunta(e){
        if (!confirm('¿Está seguro de eliminar este registro?')){
            e.preventDefault();
        }
    }
</script>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Listado de alumnos en <strong><?= $m["nombre"] ?></strong></h4>
					<!-- /.box-title -->
                    <a href="index.php?action=createAlumnoMateria&id=<?= $datosController ?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Alumno</a>
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Materia</th>
								<th>Alumno</th>
								<th>Grupo</th>
								<th>Borrar</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Materia</th>
								<th>Alumno</th>
								<th>Grupo</th>
								<th>Borrar</th>
							</tr>
						</tfoot>
						<tbody>
                        <?php

                        $vistaAlumno = new MvcController();
                        $vistaAlumno -> vistaAlumnoMateriaController($datosController);
                        $vistaAlumno -> borrarAlumnoMateriaController();

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>