<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Subir actividades</title>
</head>
<body id="subirAct">
    <div class="subirAct">
        <h1>Subir actividades</h1>
        <?php
        // Si no hay un usuario iniciado te devuelve a la pagina de login
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location:login.php');
        }   
        // Definimos variables de sesión
        const SERVIDOR = "localhost";
        const USER = "root";
        const PASSWD = "";
        const BD = "db_appactiv";
        $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
        $sql="SELECT * FROM tbl_topic;";
        $listaTopic=mysqli_query($conexion,$sql);
        ?>
        <!-- Formulario con de subir actividad -->
        <form action="../proc/procSubirActiv.php" method="post" Enctype="multipart/form-data">
            <input class="subirActform" type="text" name="titulo" placeholder="Introduce un título" required>
            <br>
            <input class="subirActform" type="text" name="descripcion" placeholder="Descripción" required>
            <br>
            <input class="subirActform" type="number" name="tiempoEstim" placeholder="Tiempo estimado (en min)" required>
            <br>
            <select class="subirActform" name="topic" required>
            <?php
            foreach ($listaTopic as $topic) {
                echo '<option value="'.$topic['id_top'].'">'.$topic['topic_top'].'</option>';
            }
            ?>
            </select>
            <br>
            <input class="subirActform" type="file" name="foto" placeholder="Foto" required>
            <br>
            <input id="subirActButton" type="submit" name="enviar" value="Subir">
        </form>
    </div>
</body>
</html>

