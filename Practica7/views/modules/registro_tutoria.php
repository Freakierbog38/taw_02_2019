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
            <!-- /.col-xs-12 -->
            <div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h1 class="box-title">REGISTRO DE TUTORIA</h1>
					<div class="card-content">
						<form id="tutoriaForm" method="post" class="form-horizontal">
							<?php
								$registro = new MvcController();
								$registro -> registroBaseTutoriaController();
								$registro -> registroTutoriaController();
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

<?php


if(isset($_GET["action"])){
	if($_GET["action"] == "ok_tutoria"){
		echo "Registro Exitoso";
	}
}

?>
