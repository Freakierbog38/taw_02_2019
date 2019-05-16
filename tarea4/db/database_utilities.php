<?php
	require_once('database_credentials.php');

	//Se realiza la conexion a la base de datos, utilizando las constantes definidas en database_credentials.php
	function getPDO(){//Una instancia de PDO necesaria para la conexión con la Base de Datos
        $host = DB_HOST; //El host
        $dbname = DB_DATABASE; //El nombre de la base de datos
        $dbOtp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");// Habilitar el utf8 
        $pdoObj = new PDO("mysql:host={$host};dbname={$dbname};port=3307", DB_USER, DB_PASSWORD, $dbOtp); //Se crea la instancia
		return $pdoObj;// Y se regresa
    }

	//Funcion que permite agregar un nuevo equipo a la base de datos
	function add($id,$nombre,$posicion,$carrera,$correo,$tipo){
		// Se hace la conexión a la bd
		global $db;
		$db = getPDO();
		// SE prepara la solicitud de inserción
		$stmt = $db->prepare("INSERT INTO sport_team (id,nombre,posicion,carrera,correo,id_type) VALUES (:id,:nombre,:posicion,:carrera,:correo,:id_type)");
		// Se reemplazan por los valores que se capturaron parar inserción
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':posicion', $posicion);
		$stmt->bindParam(':carrera', $carrera);
		$stmt->bindParam(':correo', $correo);
		$stmt->bindParam(':id_type', $tipo);
		// Se revisa si es ejecutado
		if($stmt->execute()){
			// Si lo hace correctamente regresa verdadero
			return true;
		}
		else{
			// Si no, regresa falso
			return false;
		}
	}

	//Funcion que permite actualizar los atributos de un equipo existente
	function update($id,$nombre,$posicion,$carrera,$correo,$tipo,$idAc){
		// Hace la conexión a la bd
		global $db;
		$db = getPDO();
		// Prepara la solicitud para actualizar
		$stmt = $db->prepare("UPDATE sport_team SET id=:id,nombre=:nombre,posicion=:posicion,carrera=:carrera,correo=:correo,id_type=:tipo where id=:idAc");
		// Se reemplazan por los valores recibidos para la actualización
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':posicion', $posicion);
		$stmt->bindParam(':carrera', $carrera);
		$stmt->bindParam(':correo', $correo);
		$stmt->bindParam(':tipo', $tipo);
		$stmt->bindParam(':idAc', $idAc);
		// Se revisa si es ejecutado
		if($stmt->execute()){
			// Si lo hace correctamente regresa verdadero
			return true;
		}
		else{
			// Si no, regresa falso
			return false;
		}
	}

	//Funcion que permite eliminar un usuario de la base de datos utilizando su id.
	function delete($id){
		// Conexión a la bd
		global $db;
		$db = getPDO();
		// Prepara solicitud para borrar
		$stmt = $db->prepare("DELETE FROM sport_team where id=:id");
		// Reemplaza por el id solicitado
		$stmt->bindParam(':id', $id);
		// Se ejecuta
		$stmt->execute();
	}

	//Funcion que permite realizar una busqueda de un usuario para obtener todos sus atributos mediante su id.
	function search($id){
		// Conexión a bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM sport_team where id=:id");
		// Reemplaza por el id del equipo solicitado
		$stmt->bindParam(':id', $id);
		// Se ejecuta
		$stmt->execute();
		// Si se encuentra registro
		if($r = $stmt->fetch(PDO::FETCH_ASSOC))
			// Retorna su contenido
			return $r;
		// En caso contrario no regresa nada
		return [];
	}

	//Funcion que permite obtener todos los registros encontrados en la tabla usuarios de la base de datos.
	function getAll($num){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud 
		$stmt = $db->prepare("SELECT * FROM sport_team WHERE id_type=:num");
		// Se reemplaza id de tipo por el valor solicitado para el filtrado
		$stmt->bindParam(':num', $num);
		// Se ejecuta
		$stmt->execute();
		// Y si el conteo es mayor de 0, osea, si se encontró registro alguno
		if($stmt->rowCount())
			// Regresa el contenido
			return $stmt;
		// En caso contrario nada
		return [];
	}

	//Funcion que obtiene la cantidad de registros encontrados en la tabla 'user' de la base de datos.
	function count_users(){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM user");
		// Se ejecuta
		$stmt -> execute();
		// Se cuentan los registros
		$r = $stmt->rowCount();
		// Y el resultado es lo que se regresa, el número de registros
		return $r;
	}

	//Funcion que obtiene la cantidad de registros encontrados en la tabla 'user_type' de la base de datos.
	function count_types(){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM user_type");
		// Se ejecuta
		$stmt -> execute();
		// Se cuentan los registros
		$r = $stmt->rowCount();
		// Y el resultado es lo que se regresa, el número de registros
		return $r;
	}

	//Funcion que obtiene la cantidad de registros encontrados en la tabla 'status' de la base de datos.
	function count_status(){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM estatus");
		// Se ejecuta
		$stmt -> execute();
		// Se cuentan los registros
		$r = $stmt->rowCount();
		// Y el resultado es lo que se regresa, el número de registros
		return $r;
		
	}

	//Funcion que obtiene la cantidad de registros encontrados en la tabla 'user_log' de la base de datos.
	function count_access(){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM User_log");
		// Se ejecuta
		$stmt -> execute();
		// Se cuentan los registros
		$r = $stmt->rowCount();
		// Y el resultado es lo que se regresa, el número de registros
		return $r;
		
	}

	//Funcion que obtiene la cantidad de usuarios activos.
	function count_active(){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM user WHERE estatus_id = 1");
		// Se ejecuta
		$stmt -> execute();
		// Se cuentan los registros
		$r = $stmt->rowCount();
		// Y el resultado es lo que se regresa, el número de registros
		return $r;
	}

	//Funcion que obtiene la cantidad de usuarios inactivos.
	function count_inactive(){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud
		$stmt = $db->prepare("SELECT * FROM user WHERE estatus_id = 2");
		// Se ejecuta
		$stmt -> execute();
		// Se cuentan los registros
		$r = $stmt->rowCount();
		// Y el resultado es lo que se regresa, el número de registros
		return $r;
	}

	//Función que regresa una tabla de la base de datos
	function selectAllFromTable($tabla){
		// Se realiza la conexion a la bd
		global $db;
		$db = getPDO();
		// Se prepara la solicitud, donde el nombre de la tabla varia dependiendo de lo que el usuario haya solicitado
		$stmt = $db->prepare("SELECT * FROM ".$tabla);
		// Se ejecuta
		$stmt->execute();
		// Y regresa el contenido de la tabla
		return $stmt;
	}
?>