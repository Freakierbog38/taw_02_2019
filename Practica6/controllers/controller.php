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

    #INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){
        // Revisa que esté eactivo en metodo post
		if(isset($_POST["nombre"])){
            // Recolecta las variables en un array asociativo
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "password"=>$_POST["pass"]);
            // Llama el metodo de la clase Datos para traer el registro
			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");
            // Y posteriormente validar las contraseñas
			if(strcmp ($respuesta["password"] , $datosController["password"] ) == 0){
                // Si son iguales se inicia la sesión
				session_start();
                // Y se inicializan las variables
                $_SESSION["validar"] = true;
                $_SESSION["nombre"] = $respuesta["nombre"];
                // finalmente redirecciona a otra pagina
				header("Location: index.php?action=listaCliente");

			}
			else{
				header("Location: index.php");
			}

        }
    }

    # REGISTRO DE CLIENTES
	#------------------------------------
	public function registroClientesController(){
        if(isset($_POST["nombre"])){

			$datosController = array( "nombre"=>$_POST["nombre"], 
                                      "email"=>$_POST["email"],
                                      "edad"=>$_POST["edad"],
                                      "tipo"=>$_POST["tipo"]);

            $respuesta = Datos::registroClientesModel($datosController, "clientes");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE HABITACIONES
	#------------------------------------
	public function registroHabitacionesController(){
        if(isset($_POST["numero"])){

			$datosController = array( "numero"=>$_POST["numero"], 
                                      "precio"=>$_POST["precio"],
                                      "descripcion"=>$_POST["descripcion"],
                                      "tipo"=>$_POST["tipo"]);

            $respuesta = Datos::registroHabitacionesModel($datosController, "habitaciones");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    # REGISTRO DE RESERVACIONES
	#------------------------------------
	public function registroReservacionesController(){
        if(isset($_POST["cliente"])){
            $cliente = Datos::unRegistroModel("clientes", $_POST["cliente"]);
            $habitacion = Datos::unRegistroModel("habitaciones", $_POST["habitacion"]);

			$datosController = array( "cliente"=>$cliente["id"], 
                                      "habitacion"=>$habitacion["id"],
                                      "dias"=>$_POST["dias"],
                                      "total"=>($_POST["dias"]*$habitacion["precio"]));

            $respuesta = Datos::registroReservacionModel($datosController, "reservaciones");

            if($respuesta=="success"){
                echo '<label class="col-sm-3 control-label">Registrado</label>';
            }
            else{
                echo '<label class="col-sm-3 control-label">Error</label>';
            }
        }
    }

    #VISTA DE CLIENTES
	#------------------------------------
	public function vistaClientesController(){

        // Se llama al metodo de Datos para traer los registros de la tabla clientes
        $respuesta = Datos::vistaTablaModel("clientes");
        // Asi mismo los de tipo cliente para completar la información y sea legible
        $tipo = Datos::vistaTablaModel("tipo_cliente");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
            // También se recorre los resultados de tipo cliente
            foreach($tipo as $r=>$t)
                // Y cuando encuentra el tipo que es, por su id
                if($t['id']==$item['tipo'])
                    // se guarda el nombre de dicho tipo
                    $tip = $t['nombre'];

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
			    	<td>'.$item["nombre"].'</td>
    				<td>'.$item["email"].'</td>
                    <td>'.$tip.'</td>
                    <td>'.$item["edad"].'</td>
			    	<td><a href="index.php?action=editarCliente&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaCliente&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE HABITACIONES
	#------------------------------------
	public function vistaHabitacionesController(){

        // Se llama al metodo de Datos para traer los registros de la tabla habitaciones
        $respuesta = Datos::vistaTablaModel("habitaciones");
        // Asi mismo los de tipo habitaciones para completar la información y sea legible
        $tipo = Datos::vistaTablaModel("tipo_habitacion");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
            // También se recorre los resultados de tipo habitacion
            foreach($tipo as $r=>$t)
                // Y cuando encuentra el tipo que es, por su id
                if($t['id']==$item['tipo'])
                    // se guarda el nombre de dicho tipo
                    $tip = $t['nombre'];

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
			    	<td>'.$item["numero"].'</td>
    				<td>'.$item["precio"].'</td>
                    <td>'.$tip.'</td>
                    <td>'.$item["descripcion"].'</td>
			    	<td><a href="index.php?action=editarHabitacion&id='.$item["id"].'" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				    <td><a href="index.php?action=listaHabitacion&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #VISTA DE HABITACIONES
	#------------------------------------
	public function vistaReservacionController(){

        // Se llama al metodo de Datos para traer los registros de la tabla reservaciones
        $respuesta = Datos::vistaTablaModel("reservaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
            // Se llama a la funcion que trae un registro, para la informacion completa del cliente y habitaciones
            $habitacion = Datos::unRegistroModel("habitaciones", $item["habitacion"]);
            $cliente = Datos::unRegistroModel("clientes", $item["cliente"]);

            // Se imprimen los datos, y en vez de imprimir el id de tipo se imprime su nombre que anteriormente se encontró
		    echo'<tr>
			    	<td>'.$cliente["nombre"].'</td>
    				<td>'.$habitacion["numero"].'</td>
                    <td>'.$item["dias"].'</td>
                    <td>'.$item["fecha_inicio"].'</td>
                    <td>'.$item["fecha_fin"].'</td>
                    <td>'.$item["total"].'</td>
				    <td><a href="index.php?action=listaReservacion&idBorrar='.$item["id"].'" onclick="pregunta(event)" class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
			    </tr>';

		}

    }

    #EDITAR CLIENTE
	#------------------------------------
	public function editarClienteController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["nombre"])){
            // Las variables enviadas se guardan en un array asociativo
			$datosController = array( "id"=>$_POST["id"],
                                      "nombre"=>$_POST["nombre"],
							          "edad"=>$_POST["edad"],
                                      "email"=>$_POST["email"],
                                      "tipo"=>$_POST["tipo"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarClienteModel($datosController, "clientes");
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
    
    #EDITAR HABITACION
	#------------------------------------
	public function editarHabitacionController(){
        // Revisa si se activó el metodo post
		if(isset($_POST["numero"])){
            // Las variables enviadas se guardan en un array asociativo
			$datosController = array( "id"=>$_POST["id"],
                                      "numero"=>$_POST["numero"],
							          "precio"=>$_POST["precio"],
                                      "descripcion"=>$_POST["descripcion"],
                                      "tipo"=>$_POST["tipo"]);
            // Y se mandan a un metodo para que se lleve acabo la actualizacion
			$respuesta = Datos::actualizarHabitacionModel($datosController, "habitaciones");
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
    
    #BORRAR CLIENTE
	#------------------------------------
	public function borrarClienteController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "clientes");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaCliente");
			
			}

		}

    }
    
    #BORRAR HABITACION
	#------------------------------------
	public function borrarHabitacionController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "habitaciones");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaHabitacion");
			
			}

		}

    }
    
    #BORRAR RESERVACIÓN
	#------------------------------------
	public function borrarReservacionController(){
        // Si se recibe el id para borrar
		if(isset($_GET["idBorrar"])){
            // Lo captura
			$datosController = $_GET["idBorrar"];
			// Y llama al método para proceder la eliminación
			$respuesta = Datos::borrarIDModel($datosController, "reservaciones");
            // y si es exitoso
			if($respuesta == "success"){
                // Redirecciona al listado
				header("location:index.php?action=listaReservacion");
			
			}

		}

	}

}