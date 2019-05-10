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
    <script language="JavaScript">
        function pregunta(){
            if (confirm('¿Está seguro de eliminar este registro?')){
                document.tuformulario.submit()
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Clientes</b></h2></div>
                </div>
            </div>    
            <?php
                include ("database.php");
                // Se crea una instancia
                $clientes = new Database();
                // Llama al método que trae todos los registros
                $cli = $clientes->read();
            ?>
            <div class="col-sm-offset-9 col-sm-3">
                <a href="create.php" class="btn btn-success add-new"><i class="fa fa-plus"></i> Agregar registro</a>
            </div>
            <div class="row">
                <table class="table">
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo electrónico</th>
                        <th>Acciones</th>
                    </tr>
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
                                    <a href="update.php?id=<?php echo $c['id']; ?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <a href="delete.php?id=<?php echo $c['id']; ?>" class="delete" title="Eliminar" data-toggle="tooltip" onclick="pregunta()"><i class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>