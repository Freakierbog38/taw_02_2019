<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE ALUMNO
	#-------------------------------------
	public function registroAlumnoModel($datosModel, $tabla){

		$c = new Conexion();
		$co = $c->conectar();

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = $co->prepare("INSERT INTO $tabla (matricula, nombre, apellidos, email, carrera) VALUES (:matricula,:nombre,:apellidos,:email,:carrera)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE MAESTRO
	#-------------------------------------
	public function registroMaestroModel($datosModel, $tabla){

		$c = new Conexion();
		$co = $c->conectar();

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = $co->prepare("INSERT INTO $tabla (numero,nombre,apellidos,email,carrera) VALUES (:numero,:nombre,:apellidos,:email,:carrera)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":numero", $datosModel["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre = :nombre");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA DE UNA TABLA
	#-------------------------------------
	public function vistaTablaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#UN REGISTRO DE UN TABLA
	#Regresa un resgistro de cualquier tabla siempre y cuando la llave primaria sea id
	public function unRegistroModel($tabla, $id){
		// Hace la conexión y envia la solicitud
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $id, PDO::PARAM_INT);
		// Y la ejecuta
		$stmt->execute();
		// Obtiene el registro y lo envia
		return $stmt->fetch();
		// Cierra la conexión
		$stmt->close();

	}

	#ACTUALIZAR ALUMNO
	#-------------------------------------
	public function actualizarAlumnoModel($datosModel, $tabla){
		// Se hace la conexión y se prepara la sentencia sql
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula = :matricula, nombre = :nombre, apellidos = :apellidos, email = :email, carrera = :carrera WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		// Se ejecuta
		if($stmt->execute()){
			// Si es exitoso manda mensaje de exito
			return "success";

		} else{
			// en caso contrario manda mensaje de error
			return "error";

		}
		// Se cierra la conexion
		$stmt->close();

	}

	#ACTUALIZAR MAESTRO
	#-------------------------------------
	public function actualizarMaestroModel($datosModel, $tabla){
		// Se hace la conexión y se prepara la sentencia sql
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero = :numero, nombre = :nombre, apellidos = :apellidos, carrera = :carrera, email = :email WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":numero", $datosModel["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		// Se ejecuta
		if($stmt->execute()){
			// Si es exitoso manda mensaje de exito
			return "success";

		} else{
			// en caso contrario manda mensaje de error
			return "error";

		}
		// Se cierra la conexion
		$stmt->close();

	}

	#BORRAR ID
	#Borra un registro de una tabla siempre y cuando la llave primaria se llame id
	public function borrarIDModel($datosModel, $tabla){
		// Prepara la sentecia
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		// Reemplaza con el verdadero dato :id
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		// Y se ejecuto
		if($stmt->execute()){
			// Regresa mensaje de extio en caso de serlo
			return "success";

		}
		else{
			// O de error en caso de que surja
			return "error";

		}
		// Se cierra la conexión
		$stmt->close();

	}

}

?>