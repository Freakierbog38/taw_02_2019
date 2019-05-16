<?php
include_once('db/database_utilities.php');

//Se revisa que las variables nombre y email se esten recibiendo mediante el metodo POST para despues continuar
//con la insercion de los valores ingresados en la base de datos, para finalmente redireccionar al inicio
if(isset($_POST) && !empty($_POST)){
  $r = add($_POST['id'],$_POST['nombre'],$_POST['posicion'],$_POST['carrera'],$_POST['email'],2);//Llamada al metodo que llevará la información a la base de datos
  // Si regresa verdadero
  if($r){
    // Muestra mensaje de exito
    $message = "Datos insertados con éxito";
    $class = "alert alert-success";
  }
  else{
    // En caso contrario muestra mensaje de error
    $message = "No se pudieron insertar los datos";
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
        <h3>Agregar Nuevo Basquetbolista</h3>
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
                  <!-- Se crean el formulario que obtendrá la información para pasarla a la base de datos -->
                  <label for="id">ID:</label>
                  <input type="text" name="id" required><br>
                  <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" required><br>
                  <label for="posicion">Posición:</label>
                  <input type="text" name="posicion" required><br>
                  <label for="carrera">Carrera:</label>
                  <input type="text" name="carrera" required><br>
                  <label for="email">Email:</label>
                  <input type="email" name="email" required><br>
                  <button type="submit" class="success">Guardar</button>
                </form>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>