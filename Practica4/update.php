<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    // Inicia sesión
    session_start();
    // Si en la sesión no están iniciadas las variables
    if(!isset($_SESSION['nombre'])){
        // Se redirecciona a login
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP usando POO</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Actualizar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
            </div>    
            <?php
                include ("database.php");
                if(isset($_GET) && !empty($_GET)){
                    $id = $_GET['id'];
                }
                $clientes = new Database();
                if(isset($_POST) && !empty($_POST)){
                    $id = $clientes->sanitize($_POST['id']);
                    $nombres = $clientes->sanitize($_POST['nombres']);
                    $apellidos = $clientes->sanitize($_POST['apellidos']);
                    $telefono = $clientes->sanitize($_POST['telefono']);
                    $direccion = $clientes->sanitize($_POST['direccion']);
                    $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);

                    $res = $clientes->update($nombres, $apellidos, $telefono, $direccion, $correo_electronico, $id);
                    if($res){
                        $message = "Datos modificados con éxito";
                        $class = "alert alert-success";
                    } else{
                        $message = "No se pudieron modificar los datos";
                        $class = "alert alert-danger";
                    }
            ?>
            <div class="<?php echo $class; ?>">
                    <?php echo $message; ?>
            </div>
                <?php } ?>
            <div class="row">
                <form method="POST">
                    <?php $c = $clientes->single_record($id); ?>
                    <div class="col-md-6">
                        <label>Nombre:</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" maxlength="100" value="<?php echo $c->nombres; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label>Apellidos:</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="100" value="<?php echo $c->apellidos; ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label>Dirección:</label>
                        <textarea type="text" name="direccion" id="direccion" class="form-control" maxlength="255" required><?php echo $c->direccion; ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Teléfono:</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" maxlength="15" value="<?php echo $c->telefono; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label>Correo electrónico:</label>
                        <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" maxlength="64" value="<?php echo $c->correo_electronico; ?>" required>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo $c->id; ?>">
                    <div class="col-md-12 pull-right">
                        <hr>
                        <button type="submit" class="btn btn-success">Actualizar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>