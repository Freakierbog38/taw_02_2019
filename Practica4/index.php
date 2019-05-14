<?php
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
    <link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=8ffc0b31bc8d9ff82fbb94689dd1d7ff">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=994321fabf3873df746bb8bbccd1886a"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fstyling%2Fbootstrap4.html" async></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" class="init">
    <script language="JavaScript">
        function pregunta(){
            if (confirm('¿Está seguro de eliminar este registro?')){
                document.tuformulario.submit()
            }
        }
    </script>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6"><h2>Listado de  <b>Clientes</b></h2></div>
                    <div class="col-sm-6"><?php echo $_SESSION['nombre']; ?> | <a href="off.php">Cerrar sesión</a></div>
                </div>
            </div>    
            <?php
                include ("database.php");
                // Se crea una instancia
                $clientes = new Database();
                // Llama al método que trae todos los registros
                $cli = $clientes->read();
            ?>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8">
                    <a href="create.php" class="btn btn-success add-new"><i class="fa fa-plus"></i> Agregar registro</a>
                </div>
            </div>
            <div class="row">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Correo electrónico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Se guarda cada registro y despliega su información en una tabla
                            while($c = $cli->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?php echo $c['nombres']; ?></td>
                                    <td><?php echo $c['apellidos']; ?></td>
                                    <td><?php echo $c['telefono']; ?></td>
                                    <td><?php echo $c['direccion']; ?></td>
                                    <td><?php echo $c['correo_electronico']; ?></td>
                                    <td>
                                        <a href="update.php?id=<?php echo $c['id']; ?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons" style="color: #FFC107;">&#xE254;</i></a>
                                        <a href="delete.php?id=<?php echo $c['id']; ?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="pregunta()" style="color: #E34724;"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>