<?php
$t = new Datos();
$tipo = $t->vistaTablaModel('tipo_cliente');
$datosController = $_GET["id"];
$r = Datos::unRegistroModel("clientes", $datosController);
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Cliente</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
                            <input type="hidden" name="id" value="<?php echo $r["id"]; ?>">
							<div class="form-group">
								<label for="nombre" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  value="<?php echo $r["nombre"]; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-3 control-label">Email</label>
								<div class="col-sm-5">
									<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="<?php echo $r["email"]; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="edad" class="col-sm-3 control-label">Edad</label>
								<div class="col-sm-2">
									<input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" value="<?php echo $r["edad"]; ?>">
								</div>
							</div>
                            <div class="form-group">
                                <label for="tipo" class="col-sm-3 control-label">Tipo de cliente</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="">Seleccione...</option>
										<?php foreach($tipo as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>"  <?php if($r["tipo"]==$item["id"]) echo "selected"; ?>><?php echo $item["nombre"] ?></option>
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
						$registro = new MvcController();
						$registro -> editarClienteController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>