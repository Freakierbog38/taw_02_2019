<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	public function pagina(){
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

    }

    #Ingreso de maestros
	#------------------------------------
	#Permite controlar el ingreso al sistema ademas generando la variable cookie que almacena el tipo de usuario que es (maestro/superadmin)
	public function ingresoMaestroController(){

		if(isset($_POST["emailIngreso"])){
			$datosController = array( "email"=>$_POST["emailIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoMaestroModel($datosController, "maestros");
			
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["email"] == $_POST["emailIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
				session_start();
				$_SESSION["validar"] = true;
				$_SESSION["num_empleado"] = $respuesta["id"];
				setcookie("nivel",$respuesta["nivel"], time() + (86400 * 30), "/");
				header("location:index.php?action=tutorias");
			}
			else{
				header("location:login.php");
			}
		}
	}

    # REGISTRO DE ALUMNO
	#------------------------------------
	public function registroAlumnoController(){
        if(isset($_POST["matricula"])){

			$datosController = array( "matricula"=>$_POST["matricula"], 
                                      "nombre"=>$_POST["nombre"],
                                      "apellidos"=>$_POST["apellidos"],
                                      "carrera"=>$_POST["carrera"],
                                      "tutor"=>$_POST["tutor"],
                                      "email"=>$_POST["email"]);

            $respuesta = Datos::registroAlumnoModel($datosController, "alumnos");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE MAESTROS
	#------------------------------------
	public function registroMaestroController(){
        if(isset($_POST["numero"])){

			$datosController = array( "numero"=>$_POST["numero"], 
                                      "nombre"=>$_POST["nombre"],
                                      "apellidos"=>$_POST["apellidos"],
                                      "email"=>$_POST["email"],
                                      "password"=>$_POST["pass"],
                                      "nivel"=>$_POST["nivel"],
                                      "carrera"=>$_POST["carrera"]);

            $respuesta = Datos::registroMaestroModel($datosController, "maestros");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE CARRERA
	#------------------------------------
	public function registroCarreraController(){
        if(isset($_POST["nombre"])){

			$datosController = array( "nombre"=>$_POST["nombre"]);

            $respuesta = Datos::registroCarreraModel($datosController, "carrera");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE MATERIA
	#------------------------------------
	public function registroMateriaController(){
        if(isset($_POST["materia"])){

            $datosController = array( "materia"=>$_POST["materia"],
                                      "grupo"=>$_POST["grupo"],
                                      "maestro"=>$_POST["maestro"]);

            $respuesta = Datos::registroMateriaModel($datosController, "materias");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE ALUMNO-MATERIA
	#------------------------------------
	public function registroAlumnoMateriaController(){
        if(isset($_POST["materia"])){

            $datosController = array( "materia"=>$_POST["materia"],
                                      "alumno"=>$_POST["alumno"]);

            $respuesta = Datos::registroAlumnoMateriaModel($datosController, "materia_alumnos");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE GRUPO
	#------------------------------------
	public function registroGrupoController(){
        if(isset($_POST["nombre"])){

			$datosController = array( "nombre"=>$_POST["nombre"]);

            $respuesta = Datos::registroGrupoModel($datosController, "grupos");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    #VISTA DE ALUMNOS
	#------------------------------------
	public function vistaAlumnoController(){

        // Se llama al metodo de Datos para traer los registros de la tabla alumnos
        $respuesta = Datos::vistaTablaModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
            // Se llama a un metodo que trae un registro mediante su id
            $c = Datos::unRegistroModel("carrera", $item["carrera"]);
            // Igualmente para traer el registro del maestro que es tutor
            $m = Datos::unRegistroModel("maestros", $item["tutor"]);

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
			    	<td>'.$item["matricula"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["apellidos"].'</td>
                    <td>'.$c["nombre"].'</td>
                    <td>'.$m["nombre"].' '.$m["apellidos"].'</td>
			    	<td><a href="index.php?action=editarAlumno&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaAlumno&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE MAESTROS
	#------------------------------------
	public function vistaMaestroController(){

        // Se llama al metodo de Datos para traer los registros de la tabla habitaciones
        $respuesta = Datos::vistaTablaModel("maestros");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
            // Se llama a un metodo que trae un registro mediante su id
            $c = Datos::unRegistroModel("carrera", $item["carrera"]);

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
			    	<td>'.$item["numero"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["apellidos"].'</td>
                    <td>'.$item["email"].'</td>
                    <td>'.$c["nombre"].'</td>
			    	<td><a href="index.php?action=editarMaestro&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaMaestro&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE CARRERA
	#------------------------------------
	public function vistaCarreraController(){

        // Se llama al metodo de Datos para traer los registros de la tabla habitaciones
        $respuesta = Datos::vistaTablaModel("carrera");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["nombre"].'</td>
			    	<td><a href="index.php?action=editarCarrera&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaCarrera&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE GRUPOS
	#------------------------------------
	public function vistaGrupoController(){

        // Se llama al metodo de Datos para traer los registros de la tabla habitaciones
        $respuesta = Datos::vistaTablaModel("grupos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
                    <td>'.$item["id"].'</td>
                    <td>'.$item["nombre"].'</td>
			    	<td><a href="index.php?action=editarGrupo&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaGrupo&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE MATERIA
	#------------------------------------
	public function vistaMateriaController(){

        // Se llama al metodo de Datos para traer los registros de la tabla habitaciones
        $respuesta = Datos::vistaTablaModel("materias");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

            // Se llama a un metodo que trae un registro mediante su id
            $mas = Datos::unRegistroModel("maestros", $item["id_maestro"]);
            $mat = Datos::unRegistroModel("materias_catalogo", $item["id_materia"]);
            $gru = Datos::unRegistroModel("grupos", $item["id_grupo"]);

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
                    <td>'.$mat["nombre"].'</td>
                    <td>'.$mas["nombre"].' '.$mas["apellidos"].'</td>
                    <td>'.$gru["nombre"].'</td>
                    <td><a href="index.php?action=listaAlumnoMateria&id='.$item["id"].'" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
			    	<td><a href="index.php?action=editarMateria&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaMateria&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE ALUMNO-MATERIA
	#------------------------------------
	public function vistaAlumnoMateriaController($materia){

        // Se llama al metodo de Datos para traer los registros los alumnos de una materia
        $respuesta = Datos::vistaAlumnoMateriaModel("materia_alumnos", $materia);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

            // Se llama a un metodo que trae un registro mediante su id
            $al = Datos::unRegistroModel("alumnos", $item["id_alumno"]);
            $m = Datos::unRegistroModel("materias", $item["id_materia"]);
            $mat = Datos::unRegistroModel("materias_catalogo", $m["id_materia"]);
            $gru = Datos::unRegistroModel("grupos", $m["id_grupo"]);

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
                    <td>'.$mat["nombre"].'</td>
                    <td>'.$al["nombre"].' '.$al["apellidos"].'</td>
                    <td>'.$gru["nombre"].'</td>
				    <td><a href="index.php?action=listaMateria&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #EDITAR ALUMNO
	#------------------------------------
	public function editarAlumnoController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["matricula"])){
            // Las variables enviadas se guardan en un array asociativo
            $datosController = array( "id"=>$_POST["id"],
                                      "matricula"=>$_POST["matricula"],
                                      "nombre"=>$_POST["nombre"],
                                      "apellidos"=>$_POST["apellidos"],
                                      "carrera"=>$_POST["carrera"],
                                      "tutor"=>$_POST["tutor"],
                                      "email"=>$_POST["email"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");
            // Si la respuesta regresada en "success" significa que se realizó con exito
			if($respuesta == "success"){
                // Y se informa del exito obtenido
				echo '<label class="col-sm-3 control-label">Cambio exitoso</label>';

			}
			else{
                // En caso contrario se informa que hubo un error
				echo '<label class="col-sm-3 control-label">Error</label>';

			}

		}

    }
    
    #EDITAR MAESTRO
	#------------------------------------
	public function editarMaestroController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["numero"])){
            // Las variables enviadas se guardan en un array asociativo
			$datosController = array( "id"=>$_POST["id"],
                                      "numero"=>$_POST["numero"],
                                      "nombre"=>$_POST["nombre"],
							          "apellidos"=>$_POST["apellidos"],
                                      "email"=>$_POST["email"],
                                      "pass"=>$_POST["pass"],
                                      "nivel"=>$_POST["nivel"],
                                      "carrera"=>$_POST["carrera"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarMaestroModel($datosController, "maestros");
            // Si la respuesta regresada en "success" significa que se realizó con exito
			if($respuesta == "success"){
                // Y se informa del exito obtenido
				echo '<label class="col-sm-3 control-label">Cambio exitoso</label>';

			}
			else{
                // En caso contrario se informa que hubo un error
				echo '<label class="col-sm-3 control-label">Error</label>';

			}

		}

    }
    
    #EDITAR CARRERA
	#------------------------------------
	public function editarCarreraController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["id"])){
            // Las variables enviadas se guardan en un array asociativo
			$datosController = array( "id"=>$_POST["id"],
                                      "nombre"=>$_POST["nombre"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarCarreraModel($datosController, "carrera");
            // Si la respuesta regresada en "success" significa que se realizó con exito
			if($respuesta == "success"){
                // Y se informa del exito obtenido
				echo '<label class="col-sm-3 control-label">Cambio exitoso</label>';

			}
			else{
                // En caso contrario se informa que hubo un error
				echo '<label class="col-sm-3 control-label">Error</label>';

			}

		}

    }
    
    #EDITAR GRUPO
	#------------------------------------
	public function editarGrupoController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["id"])){
            // Las variables enviadas se guardan en un array asociativo
			$datosController = array( "id"=>$_POST["id"],
                                      "nombre"=>$_POST["nombre"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarGrupoModel($datosController, "grupos");
            // Si la respuesta regresada en "success" significa que se realizó con exito
			if($respuesta == "success"){
                // Y se informa del exito obtenido
				echo '<label class="col-sm-3 control-label">Cambio exitoso</label>';

			}
			else{
                // En caso contrario se informa que hubo un error
				echo '<label class="col-sm-3 control-label">Error</label>';

			}

		}

    }
    
    #EDITAR MATERIA
	#------------------------------------
	public function editarMateriaController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["id"])){
            // Las variables enviadas se guardan en un array asociativo
            $datosController = array( "id"=>$_POST["id"],
                                      "maestro"=>$_POST["maestro"],
                                      "grupo"=>$_POST["grupo"],
                                      "materia"=>$_POST["materia"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarMateriaModel($datosController, "materias");
            // Si la respuesta regresada en "success" significa que se realizó con exito
			if($respuesta == "success"){
                // Y se informa del exito obtenido
				echo '<label class="col-sm-3 control-label">Cambio exitoso</label>';

			}
			else{
                // En caso contrario se informa que hubo un error
				echo '<label class="col-sm-3 control-label">Error</label>';

			}

		}

	}
    
    #BORRAR ALUMNO
	#------------------------------------
	public function borrarAlumnoController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "alumnos");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaAlumno");
			
			}

		}

    }
    
    #BORRAR MAESTRO
	#------------------------------------
	public function borrarMaestroController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "maestros");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaMaestro");
			
			}

		}

    }

    #BORRAR CARRERA
	#------------------------------------
	public function borrarCarreraController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "carrera");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaCarrera");
			
			}

		}

    }

    #BORRAR GRUPO
	#------------------------------------
	public function borrarGrupoController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "grupos");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaGrupo");
			
			}

		}

    }

    #BORRAR MATERIA
	#------------------------------------
	public function borrarMateriaController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "materias");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaMateria");
			
			}

		}

    }

    #BORRAR ALUMNO-MATERIA
	#------------------------------------
	public function borrarAlumnoMateriaController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "materia_alumnos");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaAlumnoMateria&id=".$datosController);
			
			}

		}

    }

#########################################################################################

    #REGISTRO TUTORIAS
	#------------------------------------
	#Genera la interfaz que muestra en una tabla todos los registros almacenados
	public function vistaTutoriasController(){
		if($_COOKIE['nivel']==1)
			$respuesta = Datos::vistaTablaModel("sesion_tutoria");
		else
			$respuesta = Datos::vistaTutoriasNivelModel("sesion_tutoria",$_SESSION["num_empleado"]);		
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tema"].'</td>
				<td>'.$item["tipo"].'</td>
				<td><a href="index.php?action=editar_tutoria&id='.$item["id"].'"><button class="btn btn-warning">Editar</button></a></td>
				<td><a href="index.php?action=tutorias&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
			</tr>';
		}
	}

	#BORRAR TUTORIAS
	#------------------------------------
	#Permite el eliminado de las tutorais llamando el modelo
	public function borrarTutoriaController(){

		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarAlumnosTutoriaModel($datosController, "sesion_alumnos");
			$respuesta = Datos::borrarTutoriaModel($datosController, "sesion_tutoria");
			
			if($respuesta == "success"){
				header("location:index.php?action=tutorias");
			}
		}
	}

	#REGISTRAR TUTORIAS
	#------------------------------------
	#Permite el registro de una tutoria en la base de datos
	public function registroTutoriaController(){	  
		if(isset($_POST["fecha"])){
			$datosController = array(
								      "hora"=>$_POST["hora"],
								      "fecha"=>$_POST["fecha"],
								      "tema"=>$_POST["tema"],
								      "tipo"=>$_POST["tipo"],
								      "num_maestro"=>$_POST["num_maestro"]
								  );

			$respuesta = Datos::registroTutoriaModel($datosController, "sesion_tutoria");
			
			if(isset($_POST['hid'])){
				$data = $_POST['hid'];

				$id_sesion = Datos::ObtenerLastTutoria("sesion_tutoria");

				$respuesta = Datos::registroAlumnosTutoriaModel($data, $id_sesion[0], "sesion_alumnos");
		  	}
		  	
			if($respuesta == "success"){
				header("location:index.php?action=ok_tutoria");
			}
			else{
				header("location:index.php");
			}
		
		}
		
	}

	#REGISTRO BASE DE TUTORIAS
	#------------------------------------
	#Genera la interfaz base para el registro de las tutorias
	public function registroBaseTutoriaController(){
		if($_COOKIE['nivel']==1)
			$respuesta_alumnos = Datos::vistaTablaModel("alumnos");
		else
			$respuesta_alumnos = Datos::obtenerAlumnosNivelModel("alumnos",$_SESSION['num_empleado']);

		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['id']."'>".$respuesta_alumnos[$i]['nombre']."</option>";


		echo'
			<input type="hidden" id="hid" name="hid"></input>
			<table class="table table-striped table-bordered display">
				<tr>
					<td>
						<h4>Detalles en la tutoria</h4>
						<input type="hidden" name="num_maestro" value="'.$_SESSION['num_empleado'].'" required>
						<label for="fecha" class="control-label">Fecha:</label>
						<input type="date" class="form-control" name="fecha" required>
						<label for="hora" class="control-label">Hora:</label>
						<input type="time" class="form-control" name="hora" required>
						<label for="tipo" class="control-label">Tipo:</label>
						<select name="tipo" class="form-control" required>
							<option value="Grupal">Grupal</option>
							<option value="Individual">Individual</option>
						 </select>
						<label for="Tema" class="control-label">Tema:</label>
						<input type="text" class="form-control" name="tema" required>
						<button class="btn btn-primary btn-sm waves-effect waves-light" onclick="sendData();" type="submit">Registrar</button>
						
					</td>
					<td>
						<h4>Alumnos en la tutoria</h4>
						<table>
							<tr>
								<td>
								 <label for="alumno">Nombre del Alumno:</label>
								 <select name="alumno" class="js-example-basic-multiple" id="alumno">
								 	'.$st_alumnos.'
								 </select>
								 <br><br>
							</td>
							 <td>
							 	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="addAlumno()">Agregar Alumno</button>
							 </td>
						</tr>
						<table>
						<table id="alumnos"></table>
					</td>
				</tr>
			</table>';

		echo'<script>
				$(document).ready(function() {
					$(".js-example-basic-multiple").select2();
				});

				var alumnos=[];
				var send_alumnos=[];
				var tab = document.getElementById("alumnos");

				function updateTable(){
					tab.innerHTML="<tr><th>Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
					for(var i=0;i<alumnos.length;i++){
						tab.innerHTML=tab.innerHTML+"<tr><td>"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
					}
				}

				function addAlumno(){
					
					var select = document.getElementById("alumno");
					var flag=false;
					for(var i=0;i<alumnos.length;i++){
						if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
							flag=true;
							break;
						}
					}

					if(!flag){
						alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
						send_alumnos.push([select.options[select.selectedIndex].value]);
						updateTable();						
					}else{
						alert("Alumno ya Agregado");
					}
				}

				function deleteAlumno(index){
					alumnos.splice(index, 1);
					send_alumnos.splice(index, 1);
					updateTable();
				}

				function sendData(){
					var hid = document.getElementById("hid");
					hid.value=send_alumnos;
				}

			</script>';
	}

	#EDICION DE TUTORIAS
	#------------------------------------
	#Se encarga de controlar la edicion de una tutoria
	public function editarTutoriaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarTutoriaModel($datosController, "sesion_tutoria");
		
		//$respuesta_alumnos = Datos::obtenerAlumnosModel("alumnos");
		$respuesta_alumnos = Datos::vistaTablaModel("alumnos");
		$respuesta_alumnosTutoria = Datos::obtenerAlumnosTutoriaModel($datosController,"sesion_alumnos");

		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['id']."'>".$respuesta_alumnos[$i]['nombre']."</option>";

		echo'
			<input type="hidden" id="hid" name="hid"></input>
			<table class="table table-striped table-bordered display">
				<tr>
					<td>
						<h4>Detalles en la tutoria</h4>
						<input type="hidden" value="'.$respuesta["maestro"].'" name="num_maestro">
						<label for="fecha" class="control-label">Fecha:</label>
						<input type="date" class="form-control" value="'.$respuesta["fecha"].'" name="fecha" required>
						<label for="hora" class="control-label">Hora:</label>
						<input type="time" class="form-control" value="'.$respuesta["hora"].'" name="hora" required>
						<label for="tipo" class="control-label">Tipo:</label>
						<select id="tipos" class="form-control" name="tipo" required>
							<option value="Grupal">Grupal</option>
							<option value="Individual">Individual</option>
						 </select>
						 <label for="tema" class="control-label">Tema:</label>
						 <input type="text" class="form-control" value="'.$respuesta["tema"].'" name="tema" required>
						 <button class="btn btn-primary btn-sm waves-effect waves-light" onclick="sendData();" type="submit">Actualizar</button>
					<td>
						<h4>Alumnos en la tutoria</h4>
						<table class="table table-striped table-bordered display">
							<tr>
								<td>
								 <label for="alumno" class="control-label">Nombre del Alumno:</label>
								 <select name="alumno" class="js-example-basic-multiple" id="alumno" class="form-control">
								 	'.$st_alumnos.'
								 </select>
								 <br><br>
							</td>
							 <td>
							 	<button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="addAlumno()">Agregar Alumno</button>
							 </td>
						</tr>
						<table>
						<table id="alumnos"></table>
					</td>
				</tr>
			</table>';

		echo'
		<script>
			$("#tipos").val("'.$respuesta["tipo"].'");
			$(document).ready(function() {
				$(".js-example-basic-multiple").select2();
				fillTable();
			});

			var alumnos=[];
			var send_alumnos=[];
			var tab = document.getElementById("alumnos");


			function fillTable(){
				var resp_at = '.json_encode($respuesta_alumnosTutoria).';
				alumnos=resp_at;
				for(var i=0;i<alumnos.length;i++){
					send_alumnos[i]=alumnos[i][0];
				}
				updateTable();
			}

			function updateTable(){
				tab.innerHTML="<tr><th>Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
				for(var i=0;i<alumnos.length;i++){
					tab.innerHTML=tab.innerHTML+"<tr><td>"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
				}
			}

			function addAlumno(){
				
				var select = document.getElementById("alumno");
				var flag=false;
				for(var i=0;i<alumnos.length;i++){
					if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
						flag=true;
						break;
					}
				}

				if(!flag){
					alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
					send_alumnos.push([select.options[select.selectedIndex].value]);
					updateTable();						
				}else{
					alert("Alumno ya Agregado");
				}
			}

			function deleteAlumno(index){
				alumnos.splice(index, 1);
				send_alumnos.splice(index, 1);
				updateTable();
			}

			function sendData(){
				var hid = document.getElementById("hid");
				hid.value=send_alumnos;
			}
		</script>';


	}

	#ACTUALIZAR TUTORIAS
	#------------------------------------
	#Permite la actualizacion de la tutoria, al registrarlo en lab base de datos, realiza una eliminacion
	#completa de los alumnos para volver a realizar su insercion
	public function actualizarTutoriaController(){
		if(isset($_POST["hora"])){
			$datosController = array( "id"=>$_GET["id"],
							          "fecha"=>$_POST["fecha"],
				                      "hora"=>$_POST["hora"],
				                      "tipo"=>$_POST["tipo"],
				                      "tema"=>$_POST["tema"]);

			$respuesta = Datos::actualizarTutoriaModel($datosController, "sesion_tutoria");

			$respuesta = Datos::borrarAlumnosTutoriaModel($_GET["id"], "sesion_alumnos");
			
			$data = $_POST['hid'];

			$respuesta = Datos::registroAlumnosTutoriaModel($data, $_GET["id"], "sesion_alumnos");
		  	
			

			if($respuesta == "success"){
				header("location:index.php?action=cambio_tutoria");
			}
			else{
				echo "error";
			}
		}
	}


	#VISTA MAESTROS REPORTES
	#------------------------------------
	#Genera la tabla de los reportes de maestros
	public function vistaReporteMaestrosController(){

		$respuesta = Datos::vistaTablaModel("maestros");;

		foreach($respuesta as $row => $item){
			$item["nivel"]=$item["nivel"]==1?"SuperAdmin":"Maestro";
		echo'<tr>
				<td>'.$item["numero"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["nivel"].'</td>
			</tr>';
		}

		echo'<script>
				$(document).ready( function () {
				    $("#table_maestros").DataTable();
				} );		
			</script>';

	}


	#VISTA ALUMNOS REPORTES
	#------------------------------------
	#Genera la tabla de los reportes de alumnos
	public function vistaReporteAlumnosController(){

		$respuesta = Datos::vistaTablaModel("alumnos");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["tutor"].'</td>
			</tr>';
		}


		echo'<script>
				$(document).ready( function () {
				    $("#table_alumnos").DataTable();
				} );		
			</script>';
	}

	#VISTA TUTORIAS REPORTES
	#------------------------------------
	#Genera la tabla de los reportes de tutorias
	public function vistaReporteTutoriasController(){
		if($_COOKIE['nivel']==1)
			$respuesta = Datos::vistaTablaModel("sesion_tutoria");
		else
			$respuesta = Datos::vistaTutoriasNivelModel("sesion_tutoria",$_SESSION["num_empleado"]);		
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tema"].'</td>
				<td>'.$item["tipo"].'</td>
			</tr>';
		}


		echo'<script>
				$(document).ready( function () {
				    $("#table_tutorias").DataTable();
				} );		
			</script>';
	}
}