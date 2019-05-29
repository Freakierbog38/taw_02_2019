<?php
$t = new Datos();
$carreras = $t->vistaTablaModel('carrera');
$datosController = $_GET["id"];
$r = Datos::unRegistroModel("maestros", $datosController);
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Agregar Maestro</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
                            <input type="hidden" name="id" value="<?php echo $r["id"]; ?>">
							<div class="form-group">
								<label for="numero" class="col-sm-3 control-label">No. de Empleado</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="numero" name="numero" placeholder="No. de Empleado" value="<?= $r["numero"] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="nombre" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $r["nombre"] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?= $r["apellidos"] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-3 control-label">Correo Electrónico</label>
								<div class="col-sm-5">
									<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="<?= $r["email"] ?>">
								</div>
							</div>
                            <div class="form-group">
                                <label for="carrera" class="col-sm-3 control-label">Carrera</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="carrera" name="carrera">
                                        <option value="">Seleccione...</option>
										<?php foreach($carreras as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>" <?php if($r["carrera"]==$item["id"]) echo "selected"; ?>><?php echo $item["nombre"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
                            <div class="form-grup">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Actualizar</button>
                                </div>
                            </div>
						</form>
						<?php
						$editar = new MvcController();
						$editar -> editarMaestroController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>