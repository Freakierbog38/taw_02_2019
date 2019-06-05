<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
setcookie("nivel", "", time()-3600);
unset($_COOKIE["nivel"]);
session_destroy();
?>

<script> 
<!--
window.location.replace('login.php'); 
//-->
</script>