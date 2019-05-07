<?php
    // Muestra los errores en ejecución
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>

<?php

class maestro{

//Atributos de la clase
public $nombre = "";
public $carrera = "";
public $telefono = "";

public $nombreErr = "";
public $carreraErr = "";
public $telefonoErr = "";

//Método que captura la información de POST
public function capturar(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
            $this->nombreErr = "Name is required";
        } else {
            $this->nombre = $this->test_input($_POST["nombre"]);
        }
        if (empty($_POST["carrera"])) {
            $this->carreraErr = "Carrera is required";
        } else {
            $this->carrera = $this->test_input($_POST["carrera"]);
        }
        if (empty($_POST["telefono"])) {
            $this->telefonoErr = "Telefono is required";
        } else {
            $this->telefono = $this->test_input($_POST["telefono"]);
        }
        echo $this->subirBD();
    }
}

public function mostrar(){
    echo "<h2>Your Input:</h2>";
    echo $this->nombre;
    echo "<br>";
    echo $this->carrera;
    echo "<br>";
    echo $this->telefono;
}

public function formulario(){
    echo "<h2>PHP Form Validation Example</h2>";
    echo "<form method="."post"." action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . ">";
    echo "Nombre: <input type="."text"." name="."nombre"." value=".$this->nombre.">";
    echo "<br><br>";
    echo "Carrera: <input type="."text"." name="."carrera"." value=".$this->carrera.">";
    echo "<br><br>";
    echo "Telefono: <input type="."text"." name="."telefono"." value=".$this->telefono.">";
    echo "<br><br>";
    echo "<input type="."submit"." name="."submit"." value="."Submit".">";
    echo "</form>";
}

public function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

public function subirBD(){
    // Datos necesarios para la inserción
    $datos = [
        'nombre' => $this->nombre,
        'carrera' => $this->carrera,
        'telefono' => $this->telefono
    ];
    // Se crea la conexión con mysql
    $mbd = new PDO('mysql:host=localhost;dbname=tarea2', 'taw2019', 'taw123');
    // Se prepara la solicitud
    $stmt = $mbd->prepare("INSERT INTO maestros(nombre, carrera, telefono) VALUES(:nombre, :carrera, :telefono)");
    // Ejecuta la solicitud con los datos necesarios
    if ($stmt->execute($datos)){
        // Si se ejecuta cierra la conexión y muestra mensaje de éxito
        $mbd = null;
        return "Agregado exitosamente";
    }
    else{
        // Si no se ejecuta cierra la conexión y muestra mensaje de error
        $mbd = null;
        return "Error";
    }
}

}

$m1 = new maestro();
$m1->capturar();
$m1->formulario();
$m1->mostrar();
?>
</body>
</html>