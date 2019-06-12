<?php
  $carreras = BaseDatos::todaTabla('carreras');
  $grupos = BaseDatos::todaTabla('grupos');
  $ingreso = BaseDatos::todaTabla('anios_ingreso');
?>
<h1>Agregar Alumno</h1>
<form method="post">
  <label>Matricula:</label>
  <input type="text" name="matricula">
  <label>Nombre:</label>
  <input type="text" name="nombre">
  <label>Apellidos:</label>
  <input type="text" name="apellidos">
  <label>Carrera:</label>
  <select name="carrera">
    <?php foreach($carreras as $c){ ?>
    <option value="<?= $c['id'] ?>"><?= $c['nombre'] ?></option>
    <?php } ?>
  </select>
  <label>Año ingreso:</label>
  <select name="anio_ingreso">
    <?php foreach($ingreso as $a){ ?>
    <option value="<?= $a['id'] ?>"><?= $a['codigo'] ?></option>
    <?php } ?>
  </select>
  <label>Grupo:</label>
  <select name="grupo">
    <?php foreach($grupos as $g){ ?>
    <option value="<?= $g['id'] ?>"><?= $g['nombre'] ?></option>
    <?php } ?>
  </select>
  <button type="submit">Agregar</button>
</form>
<?php
  $alumno = new MVCcontroller();
  $alumno -> crearAlumno();
?>