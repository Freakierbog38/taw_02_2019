<?php
    session_start();

    if(!$_SESSION["validar"]){
    
        header("location:index.php?action=ingresar");
    
        exit();
    
    }

    $vistaProducto = new MvcController();
    $vistaProducto -> vistaUnProductoController();
    $vistaProducto -> cantidadProductoController();
?>