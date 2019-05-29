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

    # REGISTRO DE ALUMNO
	#------------------------------------
	public function registroAlumnoController(){
        if(isset($_POST["matricula"])){

			$datosController = array( "matricula"=>$_POST["matricula"], 
                                      "nombre"=>$_POST["nombre"],
                                      "apellidos"=>$_POST["apellidos"],
                                      "carrera"=>$_POST["carrera"],
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

    #VISTA DE ALUMNOS
	#------------------------------------
	public function vistaAlumnoController(){

        // Se llama al metodo de Datos para traer los registros de la tabla clientes
        $respuesta = Datos::vistaTablaModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
            // Se llama a un metodo que trae un registro mediante su id
            $c = Datos::unRegistroModel("carrera", $item["carrera"]);

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
			    	<td>'.$item["matricula"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["apellidos"].'</td>
                    <td>'.$item["email"].'</td>
                    <td>'.$c["nombre"].'</td>
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

}