<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces=="createCliente" || $enlaces=="createHabitacion" || $enlaces=="createReservacion" || $enlaces=="listaCliente" || $enlaces=="listaHabitacion" || $enlaces=="listaReservacion" || $enlaces=="editarCliente" || $enlaces=="editarHabitacion" || $enlaces=="editarReservacion" || $enlaces=="logout"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/createCliente.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/productos.php";
		
		}

		else{

			$module =  "views/modules/login.php";

		}
		
		return $module;

	}

}

?>