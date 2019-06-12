<?php

  class MVCcontroller{
    // Muestra la plantilla, que es la que se encarga de la navegacion, o mas bien de mostrar el resultado de esta
    public function mostrar(){
      include 'views/template.php';
    }
    
    // Se encarga de los enlaces de conectar todo, y lo manda a la plantilla
    public function nav(){
      if(isset($_GET['action'])){
        $enlace = $_GET['action'];
      }
      else{
        $enlace = 'index';
      }
      $r = Enlace::enlaces($enlace);
      
      include $r;
    }
    
    // Resgistra un grupo, con los datos que recibe mediante metodo post
	  public function crearGrupo(){
        // Revisa si efectivamente estan activos
        if(isset($_POST["nombre"])){
          // Lo colecta en un array
          $datos = array( "nombre"=>$_POST["nombre"],
                          "cuatri"=>$_POST["cuatri"]);
          // Y los manda al modelo para su insercion
          $res = BaseDatos::crearGrupoModel($datos);
          // si es exitosa lo refleja
          if($res=="exito"){
            echo 'Registrado';
          }
          // Si no manda error
          else{
            echo 'Error';
          }
        }
    }
    
    // Registra un alumno, con los datos que se mandan por el metodo post
	  public function crearAlumno(){
        // Revisa si efectivamente estan activos
        if(isset($_POST["matricula"])){
          // Lo colecta en un array
          $datos = array( "matricula"=>$_POST["matricula"],
                          "nombre"=>$_POST["nombre"],
                          "apellidos"=>$_POST["apellidos"],
                          "carrera"=>$_POST["carrera"],
                          "anio_ingreso"=>$_POST["anio_ingreso"],
                          "grupo"=>$_POST["grupo"]);
          // Y los manda al modelo para su insercion
          $res = BaseDatos::crearAlumnoModel($datos);
          // si es exitosa lo refleja
          if($res=="exito"){
            echo 'Registrado';
          }
          // Si no manda error
          else{
            echo 'Error';
          }
        }
    }
  }