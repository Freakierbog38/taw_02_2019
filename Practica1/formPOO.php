<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
<html>
<head>
    <title>Formulario en PHP7</title>
</head>

<body>


<?php
class form{

    //Atributos de la clase
    public $name = "";
    public $email = "";
    public $gender = "";
    public $comment = "";
    public $website = "";
    //Atributos de error
    public $nameErr = "";
    public $emailErr = "";
    public $genderErr = "";
    public $commentErr = "";
    public $websiteErr = "";

    //Método que captura la información de POST
    public function capturar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $this->nameErr = "Name is required";
            } else {
                $this->name = $this->test_input($_POST["name"]);
                // Checa si solamente hay letras o espacios en blanco
                if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) {
                    $this->nameErr = "Only letters and white space allowed";
                }
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
            if (empty($_POST["website"])) {
                $this->website = "";
            } else {
                $this->website = $this->test_input($_POST["website"]);
                // Revisa si es una URL valida
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website)) {
                    $this->websiteErr = "Invalid URL";
                }
            }
            if (empty($_POST["comment"])) {
                $this->comment = "";
            } else {
                $this->comment = $this->test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                //Revisa si el genero no está vacio
                $this->genderErr = "Gender is required";
            } else {
                $this->gender = $this->test_input($_POST["gender"]);
            }
        }
    }

    public function mostrar(){
        echo "<h2>Your Input:</h2>";
        echo $this->name;
        echo "<br>";
        echo $this->email;
        echo "<br>";
        echo $this->website;
        echo "<br>";
        echo $this->comment;
        echo "<br>";
        echo $this->gender;
    }

    public function formulario(){
        echo "<h2>PHP Form Validation Example</h2>";
        echo "<p><span class="."error".">* required field.</span></p>";
        echo "<form method="."post"." action=" . htmlspecialchars($_SERVER["PHP_SELF"]) . ">";
        echo "Name: <input type="."text"." name="."name"." value=".$this->name.">";
        echo "<span class="."error".">* ".$this->nameErr."</span>";
        echo "<br><br>";
        echo "E-mail: <input type="."text"." name="."email"." value=".$this->email.">";
        echo "<span class="."error".">* ".$this->emailErr."</span>";
        echo "<br><br>";
        echo "Website: <input type="."text"." name="."website"." value=".$this->website.">";
        echo "<span class="."error".">".$this->websiteErr."</span>";
        echo "<br><br>";
        echo "Comment: <textarea name="."comment"." rows="."5"." cols="."40".">".$this->comment."</textarea>";
        echo "<br><br>";
        echo "Gender:";
        echo "<input type="."radio"." name="."gender";
        if (isset($this->gender) && $this->gender=="female"); echo "checked";
        echo "value="."female".">Female";
        echo "<input type="."radio"." name="."gender";
        if (isset($this->gender) && $this->gender=="male") echo "checked";
        echo "value="."male".">Male";
        echo "<span class="."error".">* ".$this->genderErr."</span>";
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
    
}

$f1 = new form();
$f1->capturar();
$f1->formulario();
$f1->mostrar();
?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>
