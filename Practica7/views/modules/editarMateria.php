<?php
$t = new Datos();
$materias = $t->vistaTablaModel('materias_catalogo');
$maestros = $t->vistaTablaModel('maestros');
$grupos = $t->vistaTablaModel('grupos');
$datosController = $_GET["id"];
$r = Datos::unRegistroModel("materias", $datosController);
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Materia</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
                            <input type="hidden" id="id" name="id" value="<?= $r["id"] ?>">
                            <div class="form-group">
                                <label for="materia" class="col-sm-3 control-label">Materia</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="materia" name="materia">
                                        <option value="">Seleccione...</option>
										<?php foreach($materias as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>" <?php if($r["id_materia"]==$item["id"]) echo "selected"; ?>><?= $item["nombre"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
                            <div class="form-group">
                                <label for="grupo" class="col-sm-3 control-label">Grupo</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="grupo" name="grupo">
                                        <option value="">Seleccione...</option>
										<?php foreach($grupos as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>" <?php if($r["id_grupo"]==$item["id"]) echo "selected"; ?>><?php echo $item["nombre"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
		    				</div>
                            <div class="form-group">
                                <label for="maestro" class="col-sm-3 control-label">Maestro</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="maestro" name="maestro">
                                        <option value="">Seleccione...</option>
										<?php foreach($maestros as $i => $item){ ?>
                                        <option value="<?php echo $item["id"]; ?>" <?php if($r["id_maestro"]==$item["id"]) echo "selected"; ?>><?= $item["nombre"]." ".$item["apellidos"]; ?></option>
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
						$editar -> editarMateriaController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>