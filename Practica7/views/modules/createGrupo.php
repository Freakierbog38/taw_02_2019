<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Crear Grupo</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form class="form-horizontal" method="post">
							<div class="form-group">
								<label for="matricula" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
								</div>
							</div>
                            <div class="form-grup">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Crear</button>
                                </div>
                            </div>
						</form>
						<?php
						$registro = new MvcController();
						$registro -> registroGrupoController();
						?>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>