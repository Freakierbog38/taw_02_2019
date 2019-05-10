<?php
    // Permite mostrar los errores
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
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
            <?php
                include ("database.php");
                // Revisa si hay datos mediante GET
                if(isset($_GET) && !empty($_GET)){
                    // Captura el dato
                    $id = $_GET['id'];
                    // Se crea la instancia
                    $clientes = new Database();
                    // Y llama al método para eliminar
                    $res = $clientes->delete($id);
                    // Revisa si fue exitoso
                    if($res){
                        // Si lo fue, lo notifica
                        $message = "Eliminación exitosa";
                        $class = "alert alert-success";
                    } else{
                        // Si no lo fue, muestra mensaje de error
                        $message = "Error al eliminar";
                        $class = "alert alert-danger";
                    }
                }
            ?>
            <div class="<?php echo $class; ?>">
                <?php echo $message; ?>
            </div>
            <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i>Regresar</a>
        </div>
    </div>
</body>
</html>
