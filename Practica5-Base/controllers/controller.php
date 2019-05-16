<?php
    class MvcController{
        // Llamar a la plantilla
        public function plantilla(){
            // include() se utiliza para invocar el archivo que contiene el código html
            include "views/template.php";
        }

        // Interacción y navegación del usuario
        public function enlacesPaginasController(){
            if(isset($_GET['action'])){
                $enlacesController = $_GET['action'];
            } else{
                $enlacesController = "index";
            }
            // Mandar parámetro a MODELO:
            $paginas = new EnlacesPaginas();
            $respuesta = $paginas->enlacesPaginasModel($enlacesController);
            include $respuesta;
        }
    }
?>