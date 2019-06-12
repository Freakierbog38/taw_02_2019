<?php
  $alumnos = BaseDatos::todaTabla('alumnos');
?>
<a type="submit" href="index.php?action=createAlumno"><button>Agregar alumno</button></a>
<table border="1">
  <thead>
    <tr>
      <th>Matricula</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Carrera</th>
      <th>Año Ingreso</th>
      <th>Grupo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($alumnos as $a){ ?>
    <tr>
      <th><?= $a['matricula'] ?></th>
      <th><?= $a['nombre'] ?></th>
      <th><?= $a['apellidos'] ?></th>
      <th><?= $a['carrera'] ?></th>
      <th><?= $a['anio_ingreso'] ?></th>
      <th><?= $a['grupo'] ?></th>
    </tr>
    <?php } ?>
  </tbody>
</table>