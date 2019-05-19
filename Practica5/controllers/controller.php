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

	#REGISTRO DE PRODUCTOS
	#------------------------------------
	public function registroProductoController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( "nombre"=>$_POST["nombreRegistro"], 
									  "precio"=>$_POST["precioRegistro"],
									  "cantidad"=>$_POST["cantidadRegistro"]);

			$respuesta = Datos::registroProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
									  "password"=>$_POST["passwordRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE PRODUCTOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if(strcmp ($respuesta["password"] , $datosController["password"] ) == 0){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=productos");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE PRODUCTOS
	#------------------------------------

	public function vistaTablaController(){

		$respuesta = Datos::vistaTablaModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>$'.$item["precio"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td><a href="index.php?action=verPro&id='.$item["id"].'"><button>Ver</button></a></td>
				<td><a href="index.php?action=editarP&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=productos&idBorrar='.$item["id"].'" onclick="pregunta()"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#VISTA DE VENTAS
	#------------------------------------

	public function vistaVentaController(){

		$respuesta = Datos::vistaTablaModel("ventas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>$'.$item["nprod"].'</td>
				<td>'.$item["total"].'</td>
				<td><a href="index.php?action=verVen&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=ventas&idBorrar='.$item["id"].'" onclick="pregunta()"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	# VISTA DE UN PRODUCTO
	public function vistaUnProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		echo'<h1>PRODUCTO: '.$respuesta["id"].'</h1>
			 <p>ID: '.$respuesta["id"].'</p>
			 <p>Nombre: '.$respuesta["precio"].'</p>
			 <p>Precio: $'.$respuesta["precio"].'</p>
			 <p>Cantidad: '.$respuesta["cantidad"].'</p>
			 <form method="post">
			 <label for="cantidad">Agregar o quitar(-) cantidad</label>
			 <input type="number" name="cantidad">
			 <input type="hidden" name="id" value="'.$respuesta["id"].'">
			 <input type="hidden" name="cantAct" value="'.$respuesta["cantidad"].'">
			 <input type="submit" value="Editar">
			 </form>';

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarProductoModel($datosController, "productos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="number" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "nombre"=>$_POST["nombreEditar"],
				                      "precio"=>$_POST["precioEditar"]);
			
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	# AGREGA O RETIRA PRODUCTOS (CANTIDAD)
	public function cantidadProductoController(){

		if(isset($_POST["cantidad"])){

			$cantidad = $_POST["cantidad"] + $_POST["cantAct"];
			$datosController = array( "id"=>$_POST["id"],
				                      "cantidad"=>$cantidad);
			
			$respuesta = Datos::actualizarCantidadProductoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=verPro&id=".$datosController["id"]);

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarProdudctoModel($datosController, "productos");

			if($respuesta == "success"){

				header("location:index.php?action=productos");
			
			}

		}

	}

}

?>