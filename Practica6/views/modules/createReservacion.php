<?php
// Permite mostrar los errores
error_reporting(E_ALL);
ini_set('display_errors', '1');

$d = new Datos();
$h = $d->vistaTablaModel('habitaciones');
$c = $d->vistaTablaModel('clientes');
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Hacer Reservación</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="habitacion" class="col-sm-3 control-label">Habitación</label>
                                <div class="col-sm-5">
									<select class="form-control" id="habitacion" name="habitacion">
                                        <option value="">Seleccione...</option>
										<?php foreach($h as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>"><?php echo $item["numero"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
                            <div class="form-group">
                                <label for="cliente" class="col-sm-3 control-label">Cliente</label>
                                <div class="col-sm-5">
									<select class="form-control" id="cliente" name="cliente">
                                        <option value="">Seleccione...</option>
										<?php foreach($c as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>"><?php echo $item["nombre"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
							<div class="form-group">
								<label for="dias" class="col-sm-3 control-label">Noches de estancia</label>
								<div class="col-sm-5">
                                    <input type="number" class="form-control" id="dias" name="dias" placeholder="Noches">
								</div>
							</div>
                            <div class="form-grup">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Registrar</button>
                                </div>
                            </div>
						</form>
						<?php
						$registro = new MvcController();
						$registro -> registroReservacionesController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>