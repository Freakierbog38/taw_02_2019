<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "productos" || $enlaces == "editarP" || $enlaces == "salir" || $enlaces == "ventas" || $enlaces == "verPro" || $enlaces == "verVen" || $enlaces == "registroP"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/registroU.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registroU.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/productos.php";
		
		}

		else{

			$module =  "views/modules/registroU.php";

		}
		
		return $module;

	}

}

?>