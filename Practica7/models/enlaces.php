<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces=="createAlumno" || $enlaces=="createMaestro" || $enlaces=="listaAlumno" || $enlaces=="listaMaestro" || $enlaces=="editarAlumno" || $enlaces=="editarMaestro"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/listaAlumno.php";
		
		}

		else{

			$module =  "views/modules/listaMaestro.php";

		}
		
		return $module;

	}

}

?>