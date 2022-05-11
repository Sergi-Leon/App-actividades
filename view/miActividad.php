<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Mi actividad</title>
</head>
<body>
    <?php
// Definimos variables de conexión a la base de datos
    const SERVIDOR = "localhost";
    const USER = "root";
    const PASSWD = "";
    const BD = "db_appactiv"; 
    session_start();
    $id=$_GET["id"];
    $ruta=$_SERVER['SERVER_NAME']."/www/APP-ACTIVIDADES/img/";
    $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
    $sql="SELECT * FROM `tbl_actividadad` WHERE id_act = '$id'";
    $listaActividad=mysqli_query($conexion,$sql);
    ?>
<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.php">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page"
                            href="./actividades.html">Actividades</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <button  class="btn btn-light form-control me-1" type="submit"><i
                            class="fa-solid fa-arrow-up-from-bracket"></i></button>
                    <?php
                    echo "<a href='../proc/cerrarsesion.php' class='btn btn-light form-control ms-1'>Salir</a>";
                    ?>
                </form>
            </div>
        </div>
    </nav>
</br>
    <?php
// Mostramos los datos de la actividad
    echo'<div class="row-c">';
    foreach($listaActividad AS $actividad){
        $rutacompleta="http://".$ruta.$actividad['imagen_act'];
        echo '<div class="column-act1">';
            echo "<img id='Actividad' src='{$rutacompleta}'>";
        echo '</div>';
        echo '<div class="column-act2">';
            echo "<h1>{$actividad["Titulo"]}</h1>";
            echo "<p id='Actividad_fecha'>{$actividad["fechaSub_act"]}</p><span id='Actividad_tiempo'>{$actividad["tiempoEst_act"]} minutos</span>";
            echo "<p>{$actividad["descripcion_act"]}</p>";
        echo '</div>';
    }
    echo'</div>';
    ?>
    <div id="marginBot"></div>
    <a href="./misactividades.php" class="BackbuttonMyAct"><button type="button" class="btn btn-success"><i
    class="fa-solid fa-chalkboard-user"></i> Volver</button></a>
</body>
</html>
