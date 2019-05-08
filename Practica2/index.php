<?php
    // Incluir la clase
    include "persona.php";

    // Instanciar la clase
    $persona = new persona();

    $persona->capturar();
?>

<h2>PHP Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $persona->nombre;?>" required>
    <br><br>
    Edad: <input type="number" name="edad" value="<?php echo $persona->edad;?>" required>
    <br><br>
    Peso (kg): <input type="text" name="peso" value="<?php echo $persona->peso;?>" required>
    <br><br>
    Altura (m): <input type="text" name="altura" value="<?php echo $persona->altura;?>" required>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    // Se crea la conexión a mysql con PDO
    $mbd = new PDO('mysql:host=localhost;dbname=practica2', 'taw2019', 'taw123');
    // Se prepara la solicitud
    $stmt = $mbd->prepare("SELECT * FROM persona");
    $stmt->execute();
?>

<table>
    <tr>
        <td>Nombre</td>
        <td>Edad</td>
        <td>Peso</td>
        <td>Altura</td>
        <td>IMC</td>
    </tr>
    <?php while($p = $stmt->fetch()){ ?>
    <tr>
        <td><?php echo $p['nombre']; ?></td>
        <td><?php echo $p['edad']; ?></td>
        <td><?php echo $p['peso']; ?></td>
        <td><?php echo $p['altura']; ?></td>
        <td><?php echo $p['imc']; ?></td>
    </tr>
    <?php } ?>
</table>