<?php
$t = new Datos();
$alumnos = $t->vistaTablaModel('alumnos');
$datosController = $_GET["id"];
$r = Datos::unRegistroModel("materias", $datosController);
$m = Datos::unRegistroModel("materias_catalogo", $r["id_materia"]);
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Agregar Alumno a la materia <strong><?= $m["nombre"] ?></strong></h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
							<input type="hidden" name="materia" value="<?= $r["id"] ?>">
							<div class="form-group">
                                <label for="alumno" class="col-sm-3 control-label">Alumno</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="alumno" name="alumno">
                                        <option value="">Seleccione...</option>
										<?php foreach($alumnos as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>"><?php echo ($item["nombre"]." ".$item["apellidos"]); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
                            <div class="form-grup">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Agregar</button>
                                </div>
                            </div>
						</form>
						<?php
						$registro = new MvcController();
						$registro -> registroAlumnoMateriaController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>