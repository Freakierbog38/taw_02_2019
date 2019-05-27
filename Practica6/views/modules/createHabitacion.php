<?php
$t = new Datos();
$tipo = $t->vistaTablaModel('tipo_habitacion');
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Agregar Habitación</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
							<div class="form-group">
								<label for="numero" class="col-sm-3 control-label">No. Habitación</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
								</div>
							</div>
                            <div class="form-group">
                                <label for="tipo" class="col-sm-3 control-label">Tipo de habitación</label>
                                <div class="col-sm-5">
									<select class="form-control" id="tipo" name="tipo">
                                        <option value="">Seleccione...</option>
										<?php foreach($tipo as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>"><?php echo $item["nombre"] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
							<div class="form-group">
								<label for="precio" class="col-sm-3 control-label">Precio</label>
								<div class="col-sm-5">
									<input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
								</div>
							</div>
							<div class="form-group">
								<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
								<div class="col-sm-5">
									<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
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
						$registro -> registroHabitacionesController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>