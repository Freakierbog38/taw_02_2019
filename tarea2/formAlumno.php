<?php
    //Muestra los errores en ejecución
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>

<?php

class alumno{

//Atributos de la clase
public $nombre = "";
public $matricula = "";
public $carrera = "";
public $email = "";
public $telefono = "";

public $nombreErr = "";
public $matriculaErr = "";
public $carreraErr = "";
public $emailErr = "";
public $telefonoErr = "";

//Método que captura la información de POST
public function capturar(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
            $this->nombreErr = "Name is required";
        } else {
            $this->nombre = $this->test_input($_POST["nombre"]);
        }
        if (empty($_POST["email"])) {
            $this->emailErr = "Email is required";
        } else {
            $this->email = $this->test_input($_POST["email"]);
            // Revisa si el formato de email está bien formulado
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Invalid email format";
            }
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
        if (empty($_POST["matricula"])) {
            //Revisa si el genero no está vacio
            $this->matriculaErr = "Matricula is required";
        } else {
            $this->matricula = $this->test_input($_POST["matricula"]);
        }
        // Después de validar las entradas intenta subirlas a la BD
        echo $this->subirBD();
    }
}

public function mostrar(){
    echo "<h2>Your Input:</h2>";
    echo $this->matricula;
    echo "<br>";
    echo $this->nombre;
    echo "<br>";
    echo $this->carrera;
    echo "<br>";
    echo $this->email;
    echo "<br>";
    echo $this->telefono;
}

public function formulario(){
    echo "<h2>PHP Form Validation Example</h2>";
    echo "<form method="."post"." action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . ">";
    echo "Matricula: <input type="."text"." name="."matricula"." value=".$this->matricula.">";
    echo "<br><br>";
    echo "Nombre: <input type="."text"." name="."nombre"." value=".$this->nombre.">";
    echo "<br><br>";
    echo "Carrera: <input type="."text"." name="."carrera"." value=".$this->carrera.">";
    echo "<br><br>";
    echo "Correo: <input type="."email"." name="."email"." value=".$this->email.">";
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
    // Se crea un array asociativo con los datos necesarios
    $datos = [
        'matricula' => $this->matricula,
        'nombre' => $this->nombre,
        'carrera' => $this->carrera,
        'telefono' => $this->telefono,
        'email' => $this->email
    ];
    // Se crea la conexión a mysql con PDO
    $mbd = new PDO('mysql:host=localhost;dbname=tarea2', 'taw2019', 'taw123');
    // Se prepara la solicitud
    $stmt = $mbd->prepare("INSERT INTO alumnos(matricula, nombre, carrera, telefono, email) VALUES(:matricula, :nombre, :carrera, :telefono, :email)");
    // Se ejecuta enviando los datos necesarios
    if ($stmt->execute($datos)){
        // Si se ejecuta elimina (cierra) la conexión y muestra un mensaje de exito
        $mbd = null;
        return "Agregado exitosamente";
    }
    else{
        // Si no se ejecuta igual cierra la conexión y muestra Error
        $mbd = null;
        return "Error";
    }
}

}

$a1 = new alumno();
$a1->capturar();
$a1->formulario();
$a1->mostrar();
?>
</body>
</html>