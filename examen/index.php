<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  // Se llaman a los archivos (controlador y modelos), que serán necesarios para el funcionamiento de la página así como su navegación
  require_once 'controllers/controller.php';
  require_once 'models/crud.php';
  require_once 'models/enlaces.php';
//Se invoca un método de la clase del controlador que llevará el control de la navegación
  $index = new MVCcontroller();
  $index->mostrar();
?>