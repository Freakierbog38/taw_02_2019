<?php
	// Permite mostrar los errores
    error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	// Inicia la sesión, necesario para usar las utilidades de SESSION
	session_start();
	// Se incluye el archivo con la clase Database
	include ("database.php");
	// Se crea una instancia de Database
	$log = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form method="POST" class="frm-single">
		<div class="inside">
			<div class="title"><strong>Ninja</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<?php
				// Se revisa que se enviaron datos mediante el método POST
				if(isset($_POST) && !empty($_POST)){
					// Se guardan en variables los valores del metodo post
					$nombre = $log->sanitize($_POST['nombre']);
					$pass = $log->sanitize($_POST['pass']);
					// Llama al metodo que da funcionamiento al login
					$res = $log->login($nombre);
					if($res){
						// Si es exitoso
						// Comapra si la contraseña es correcta
						if(strcmp ($res->password , $pass ) == 0){
							// Se guardan los valores enviados en variables de SESSION
							$_SESSION['nombre'] = $nombre;
							$_SESSION['pass'] = $pass;
							// Y redirecciona a index
							header('Location: index.php');
						}
					} else{
						// Si no lo es, muestra mensaje de error
						$message = "Usuario o contraseña incorrecta";
						$class = "alert alert-danger";
					
			?>
						<div class="<?php echo $class; ?>">
							<?php echo $message; ?>
						</div>
			<?php 
					}
				}
			?>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" placeholder="Username" class="frm-inp" id="nombre" name="nombre"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Password" class="frm-inp" id="pass" name="pass"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
			<!-- /.row -->
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>