<?php

// Definir clase para mostrar propiedades de libros
class libro{
    public $titulo  = "Título del libro";
    public $autor = "Autor del libro";
    public $anioPublicacion = "2019";
    public $numeroHojas = "Hojas por defecto 234";
    public $editorial = "Editorial de la UPV";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página de datos del libro</title>
</head>
<body>
    <?php
    $libro1 = new libro();
    ?>
    <h1 align="center"><?php echo $libro1->titulo; ?></h1>
    <h1 align="center"><?php echo $libro1->autor; ?></h1>
    <h1 align="center"><?php echo $libro1->anioPublicacion; ?></h1>
    <h1 align="center"><?php echo $libro1->numeroHojas; ?></h1>
    <h1 align="center"><?php echo $libro1->editorial; ?></h1>
</body>
</html>