<?php
    // inicia la sesión para usar las utilidades de SESSION correctamente
    session_start();
    
    // Se borran las variables que guardaba SESSION
    session_unset();

    // Se redirecciona a login
    header('Location: login.php');