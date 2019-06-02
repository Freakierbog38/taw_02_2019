<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces=="createAlumno" || $enlaces=="createMaestro" || $enlaces=="createCarrera" || $enlaces=="listaAlumno" || $enlaces=="listaMaestro" || $enlaces=="listaCarrera" || $enlaces=="editarAlumno" || $enlaces=="editarMaestro" || $enlaces=="editarCarrera"){

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