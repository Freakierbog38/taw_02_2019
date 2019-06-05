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

		$stmt = $co->prepare("INSERT INTO $tabla (matricula, nombre, apellidos, carrera,tutor) VALUES (:matricula,:nombre,:apellidos,:carrera,:tutor)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_INT);

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

		$stmt = $co->prepare("INSERT INTO $tabla (numero,nombre,apellidos,email,password,carrera,nivel) VALUES (:numero,:nombre,:apellidos,:email,:password,:carrera,:nivel)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":numero", $datosModel["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":nivel", $datosModel["nivel"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE CARRERA
	#-------------------------------------
	public function registroCarreraModel($datosModel, $tabla){

		$c = new Conexion();
		$co = $c->conectar();

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = $co->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE GRUPO
	#-------------------------------------
	public function registroGrupoModel($datosModel, $tabla){

		$c = new Conexion();
		$co = $c->conectar();

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = $co->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE MATERIA
	#-------------------------------------
	public function registroMateriaModel($datosModel, $tabla){

		$c = new Conexion();
		$co = $c->conectar();

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = $co->prepare("INSERT INTO $tabla (id_materia, id_grupo, id_maestro) VALUES (:materia,:grupo,:maestro)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":materia", $datosModel["materia"], PDO::PARAM_INT);
		$stmt->bindParam(":grupo", $datosModel["grupo"], PDO::PARAM_INT);
		$stmt->bindParam(":maestro", $datosModel["maestro"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE ALUMNO-MATERIA
	#-------------------------------------
	public function registroAlumnoMateriaModel($datosModel, $tabla){

		$c = new Conexion();
		$co = $c->conectar();

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = $co->prepare("INSERT INTO $tabla (id_materia, id_alumno) VALUES (:materia,:alumno)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":materia", $datosModel["materia"], PDO::PARAM_INT);
		$stmt->bindParam(":alumno", $datosModel["alumno"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

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

	#VISTA ALUMNO-MATERIA
	#Regresa todos los registros de una materia en especifico
	public function vistaAlumnoMateriaModel($tabla, $materia){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_materia = :materia");
		$stmt->bindParam(":materia", $materia, PDO::PARAM_INT);
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
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula = :matricula, nombre = :nombre, apellidos = :apellidos, carrera = :carrera, tutor = :tutor  WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":tutor", $datosModel["tutor"], PDO::PARAM_INT);
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
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero = :numero, nombre = :nombre, apellidos = :apellidos, carrera = :carrera, email = :email, password = :password, nivel = :nivel WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":numero", $datosModel["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":nivel", $datosModel["nivel"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
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

	#ACTUALIZAR CARRERA
	#-------------------------------------
	public function actualizarCarreraModel($datosModel, $tabla){
		// Se hace la conexión y se prepara la sentencia sql
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
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

	#ACTUALIZAR GRUPO
	#-------------------------------------
	public function actualizarGrupoModel($datosModel, $tabla){
		// Se hace la conexión y se prepara la sentencia sql
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
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

	#ACTUALIZAR MATERIA
	#-------------------------------------
	public function actualizarMateriaModel($datosModel, $tabla){
		// Se hace la conexión y se prepara la sentencia sql
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_materia = :materia, id_maestro = :maestro, id_grupo = :grupo WHERE id = :id");
		// Se reemplazan los valores reales
		$stmt->bindParam(":materia", $datosModel["materia"], PDO::PARAM_INT);
		$stmt->bindParam(":maestro", $datosModel["maestro"], PDO::PARAM_INT);
		$stmt->bindParam(":grupo", $datosModel["grupo"], PDO::PARAM_INT);
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





	#PERMITE REALIZAR UNA VISTA PARA TUTORIAS
	#-------------------------------------
	public function vistaTutoriasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
	
	#VISTA DE LAS TUTORIAS POR NIVEL 
	#-------------------------------------
	#Muestra solo las tutorias que ha hecho el empleado, con el numero de maestro ingresado
	public function vistaTutoriasNivelModel($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where maestro=:num_maestro");	
		$stmt->bindParam(":num_maestro", $id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#BORRAR DE LAS TUTORIAS 
	#-------------------------------------
	public function borrarTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#BORRAR ALUMNOS TUTORIAS 
	#-------------------------------------
	public function borrarAlumnosTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sesion = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}


	#REGISTRO DE TUTORIAS
	#-------------------------------------
	public function registroTutoriaModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha, hora, tipo, tema, maestro) VALUES (:fecha,:hora,:tipo,:tema,:num_maestro)");	
		
		$stmt1->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt1->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt1->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt1->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
		$stmt1->bindParam(":num_maestro", $datosModel["num_maestro"], PDO::PARAM_INT);
		
		var_dump($datosModel);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#OBTENER ULTIMA TUTORIA
	#-------------------------------------
	public function ObtenerLastTutoria($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT max(id) FROM $tabla");
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#REGISTRO DE LOS ALUMNOS
	#-------------------------------------
	public function registroAlumnosTutoriaModel($datosModel, $id_sesion, $tabla){
		$datosModel_array =  explode(",",$datosModel);
		
		for($i=0;$i<sizeof($datosModel_array);$i++){
			$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (alumno, id_sesion) VALUES (:matricula_alumno,:id_sesion)");	
			$stmt1->bindParam(":matricula_alumno", $datosModel_array[$i], PDO::PARAM_STR);
			$stmt1->bindParam(":id_sesion", $id_sesion, PDO::PARAM_INT);

			if(!$stmt1->execute())
				return "error";

		}
		
		return "success";		

		$stmt1->close();

	}

	#EDICION DE LA INTERFAZ
	#-------------------------------------
	public function editarTutoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, hora, fecha, tipo, tema, maestro FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#OBTENER LOS ALUMNOS DE LA TUTORIA
	#-------------------------------------
	public function obtenerAlumnosTutoriaModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT st.alumno, a.nombre FROM $tabla as st INNER JOIN alumnos AS a ON a.id=st.alumno WHERE st.id_sesion=:id_sesion");
		$stmt->bindParam(":id_sesion", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	#ACTUALIZA EL TUTOR MUCHO MAS.
	#-------------------------------------
	public function actualizarTutoriaModel($datosModel, $tabla){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, hora = :hora, tipo = :tipo, tema = :tema WHERE id = :id");

		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#INGRESO MAESTRO
	#-------------------------------------
	#Obtiene el email, contrasena, numero de empleado y nivel de los maestros.
	public function ingresoMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :email");	
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}

	#OBTENER ALUMNOS NIVEL
	#-------------------------------------
	#Obtiene los alumnos que tienen a cierto tutor
	public function obtenerAlumnosNivelModel($tabla, $id){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE tutor=:id_tutor");
		$stmt->bindParam(":id_tutor", $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();
	}

}

?>