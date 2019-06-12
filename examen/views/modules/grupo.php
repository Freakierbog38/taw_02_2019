<?php
  $grupos = BaseDatos::todaTabla('grupos');
?>
<a type="submit" href="index.php?action=createGrupo"><button>Agregar Grupo</button></a>
<table border="1">
  <thead>
    <tr>
      <th>ID</th>
      <th>Cuatrimestre</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($grupos as $g){ ?>
    <tr>
      <th><?= $g['id'] ?></th>
      <th><?= $g['cuatrimestre'] ?></th>
      <th><?= $g['nombre'] ?></th>
    </tr>
    <?php } ?>
  </tbody>
</table>