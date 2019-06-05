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
				<div class="box-content card white">
					<h1 class="box-title">EDITAR TUTORIA</h1>
					<div class="card-content">
						<form method="post">
							<?php

							$editarMaestro = new MvcController();
							$editarMaestro -> editarTutoriaController();
							$editarMaestro -> actualizarTutoriaController();

							?>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>
        </div>
    </div>
</div>



