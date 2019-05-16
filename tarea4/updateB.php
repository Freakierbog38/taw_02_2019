<?php
include_once('db/database_utilities.php');

$id = isset( $_GET['id'] ) ? $_GET['id'] : '';  //Se revisa que el id del usuario se encuentre mediante el metodo get.
$r = search($id); //Se realiza una busqueda en la base de datos donde se obtienen los atributos del registro con el id ingresado.

// REvisa que este activo el metodo post
if(isset($_POST) && !empty($_POST)){
  update($_POST['id'],$_POST['nombre'],$_POST['posicion'],$_POST['carrera'],$_POST['email'], 2,$_POST['idB']);//Llamada al metodo para la acción en base de datos
  // Si regresa verdadero
  if($r){
    // Muestra mensaje de exito
    $message = "Datos modificados con éxito";
    $class = "alert alert-success";
  }
  else{
    // En caso contrario muestra mensaje de error
    $message = "No se pudieron modificar los datos";
    $class = "alert alert-danger";
  }
}
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Modificar Basquetbolista</h3>
        <br>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                <?php
                  if(isset($_POST) && !empty($_POST)){
                ?>
                  <div class="<?php echo $class; ?>">
                      <?php echo $message; ?>
                  </div>
                <?php } ?>
                <form method="POST">
                  <!-- Se usa el registro buscando anteriormente para rellenar los campos con los valores
                      existentes, así el usuario no tiene que recordarlos y volverlos a llenar-->
                  <label for="id">ID:</label>
                  <input type="text" name="id" value="<?php echo($r['id'])?>" required><br>
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" value="<?php echo($r['nombre'])?>" required><br>
                  <label for="posicion">Posición:</label>
                  <input type="text" name="posicion" value="<?php echo($r['posicion'])?>" required><br>
                  <label for="carrera">Carrera:</label>
                  <input type="text" name="carrera" value="<?php echo($r['carrera'])?>" required><br>
                  <label for="email">Email:</label>
                  <input type="email" name="email" value="<?php echo($r['correo'])?>" required><br>
                  <input type="hidden" name="idB" value="<?php echo($id)?>">
                  <button type="submit" class="success">Actualizar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>