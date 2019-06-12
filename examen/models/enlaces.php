<?php
class Enlace{
  public function enlaces($link){
    
    // Se encarga de recibir lo que que se manda por GET y compara con una lista para mandar a la respectiva información
    if($link == 'createAlumno' || $link == 'alumno' || $link == 'createGrupo' || $link == 'grupo'){
      $res = 'views/modules/'.$link.'.php';
    }
    elseif($link=='index'){
      $res = 'views/modules/inicio.php';
    }
    // en caso contrario que no se encuentre en la lista, se manda a una por default
    else{
      $res = 'views/modules/inicio.php';
    }
    // Y regresa dicha información
    return $res;
    
  }
}