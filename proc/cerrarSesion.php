<?php
// Iniciamos sesión
session_start();
// Descargamos de memoria la variable de inicio de sesion
unset($_SESSION['usuario']);
// Destruimos la sesión
session_destroy();
// Redireccionamos a index.html
echo'<script>window.location.href = "../index.html"</script>';