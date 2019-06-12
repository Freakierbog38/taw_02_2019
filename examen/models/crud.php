<?php
  // Se carga el archivo que contiene la conexion a la base de datos
  require_once 'conexion.php';
  // Se utiliza para crear una clase hija de la clase que incluye dicha conexion
  
  class BaseDatos extends Conexion{
    // Método para agregar un grupo a la base de datos
    public function crearGrupoModel($datos){
      // Mediante la conexion se prepara la peticion de insercion
      $stmt = Conexion::conectar()->prepare("INSERT INTO grupos (nombre, cuatrimestre) VALUES (:nombre,:cuatri)");
      // Y se reemplazan los caracteres con : por la informacion real
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":cuatri", $datos["cuatri"], PDO::PARAM_INT);
      // Se prueba que se ejecute bien
      if($stmt->execute()){
        // Si lo hace manda mensaje de exito
        return "exito";
      }
      else{
        // Si no manda error
        return "error";
      }
      // Y cierra la conexion
      $stmt->close();
    }
    
    // Método para agregar un alumno a la base de datos
    public function crearAlumnoModel($datos){
      // Mediante la conexion se prepara la peticion de insercion
      $stmt = Conexion::conectar()->prepare("INSERT INTO alumnos (matricula, nombre, apellidos, carrera, anio_ingreso, grupo) VALUES (:matricula, :nombre, :apellidos, :carrera, :anio_ingreso, :grupo)");
      // Y se reemplazan los caracteres con : por la informacion real
      $stmt->bindParam(":matricula", $datos["matricula"], PDO::PARAM_STR);
      $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
      $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_INT);
      $stmt->bindParam(":anio_ingreso", $datos["anio_ingreso"], PDO::PARAM_INT);
      $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_INT);
      // Se prueba que se ejecute bien
      if($stmt->execute()){
        // Si lo hace manda mensaje de exito
        return "exito";
      }
      else{
        // Si no manda error
        return "error";
      }
      // Y cierra la conexion
      $stmt->close();
    }
    
    // Regresa toda la información de una tabla
    public function todaTabla($tabla){
      // Prepara la petición de seleccion
      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
      // Y la ejecuta
      $stmt->execute();
      // Regresa todo los registros de la tabla
      return $stmt->fetchAll();
      // Cierra conexión
      $stmt->close();
    }
  }
?>