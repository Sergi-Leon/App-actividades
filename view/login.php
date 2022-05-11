<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Inicio de sesión</title>
</head>
<body id="login">
    <div class="login">
        <h1>Inicio de sesión</h1>
        <form action="../proc/checklogin.php" method="post">
            <input class="loginform" type="text" name="user" placeholder="Usuario" Required>
            <br>
            <input class="loginform" type="password" name="passwd" placeholder="Contraseña" Required>
             </br>
            <input id="loginButton" type="submit" value="Iniciar" name="enviar">
        </form> 
        <?php
        if(isset($_GET['msg'])){
            echo'<p id="loginerror">Usuario o contraseña incorrecto</p>';     
        }
        ?>
    </div>
</body>
</html>