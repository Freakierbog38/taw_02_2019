<h1>Agregar Grupo</h1>
<form method="post">
  <label>Cuatrimestre:</label>
  <select name="cuatri">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
  <label>Nombre:</label>
  <input type="text" name="nombre">
  <button type="submit">Agregar</button>
</form>
<?php
  $grupo = new MVCcontroller();
  $grupo -> crearGrupo();
?>