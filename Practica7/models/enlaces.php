<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces=="createAlumno" || $enlaces=="createMaestro" || $enlaces=="createGrupo" || $enlaces=="createCarrera" || $enlaces=="createMateria" || $enlaces=="createAlumnoMateria" || $enlaces=="listaAlumno" || $enlaces=="listaMaestro" || $enlaces=="listaCarrera" || $enlaces=="listaGrupo" || $enlaces=="listaMateria" || $enlaces=="listaAlumnoMateria" || $enlaces=="editarAlumno" || $enlaces=="editarMaestro" || $enlaces=="editarCarrera" || $enlaces=="editarGrupo" || $enlaces=="editarMateria" || $enlaces == "registro_tutoria" || $enlaces == "tutorias" || $enlaces == "editar_tutoria" || $enlaces == "salir" || $enlaces == "reportes"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/tutorias.php";
		
		}

		else if($enlaces == "ok"){
			$module =  "views/modules/registro.php";
		}
		else if($enlaces == "ok_alumno"){
			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "ok_carrera"){
			$module =  "views/modules/carreras.php";
		}
		else if($enlaces == "ok_maestro"){
			$module =  "views/modules/maestros.php";
		}
		else if($enlaces == "ok_tutoria"){
			$module =  "views/modules/tutorias.php";
		}
		else if($enlaces == "fallo"){
			$module =  "login.php";
		}
		else if($enlaces == "cambio"){
			$module =  "views/modules/maestros.php";
		}
		else if($enlaces == "cambio_alumno"){
			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "cambio_carrera"){
			$module =  "views/modules/carreras.php";
		}
		else if($enlaces == "cambio_tutoria"){
			$module =  "views/modules/tutorias.php";
		}
		else if($enlaces == "cambio_producto"){
			$module =  "views/modules/inventario.php";
		}

		else{

			$module =  "views/modules/tutorias.php";

		}
		
		return $module;

	}

}

?>