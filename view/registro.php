<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Página de registro</title>
</head>
<body id="registro">
    <div class="registro">
        <h1>Registrarse</h1>
        <!-- Formulario de registro -->
        <form action="../proc/checkregister.php" method="post">
            <input class="registroform" type="text" name="usuario" placeholder="Usuario" Required>
            <br>
            <input class="registroform" type="password" name="password" placeholder="Contraseña" Required> 
            <br>
            <input class="registroform" type="password" name="password2" placeholder="Repetir contraseña" Required>
            <br>
            <input id="registroButton" type="submit" name="enviar" value="Registrarse">
        </form>
        <?php
            // Se muestra alerta si el usuario ya existe
            if(isset($_GET['msg']) && $_GET['msg'] == 'existe'){
                echo'<p id="registroerror">Este usuario ya existe, pruebe con otro usuario</p>';     
            }
            // Se muestra alerta si las contraseñas no coinciden
            if(isset($_GET['msg']) && $_GET['msg'] == 'contraseña') {
                echo '<p id="registroerror">Las contraseñas que has introducido no coinciden</p>';
            }
        ?>
    </div>
</body>
</html>