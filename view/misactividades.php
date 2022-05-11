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
    <title>Mis actividades</title>
</head>
<body>
<!-- Definimos constantes para la conexión a la BD e iniciamos sesión-->
<?php
    const SERVIDOR = "localhost";
    const USER = "root";
    const PASSWD = "";
    const BD = "db_appactiv"; 
    session_start();
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
                    <a href='subirActiv.php' class='btn btn-light form-control ms-1'><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                    <?php
                    echo "<a href='../proc/cerrarsesion.php' class='btn btn-light form-control ms-1'>Salir</a>";
                    ?>
                </form>
            </div>
        </div>
    </nav>
</br>
<!-- Comprobamos si el usuario ha iniciado sesión, hacemos una consulta para sacar info de la BD -->
    <?php
        if(isset($_SESSION['usuario'])){        
            $user = $_SESSION['usuario'];
            $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
            $sql="SELECT nombre_usu FROM `tbl_usuario` WHERE id_usu = '$user'";
            $listausuario=mysqli_query($conexion,$sql);
            foreach($listausuario as $usuario){
                echo "<h1 class='aligntext margen'>Hola, ".$usuario['nombre_usu']." </h1>";
            }
        }else{
            header('Location:login.php');
        }
        ?>
    <h3 class="aligntext margen">Mis actividades</h3>
<!-- Sección de actividades -->
    <?php
        $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
        $sql="SELECT * FROM `tbl_actividadad` WHERE id_autor = '$user'";
        $listaActividad=mysqli_query($conexion,$sql);
        $ruta=$_SERVER['SERVER_NAME']."/www/APP-ACTIVIDADES/img/";
        $actCount=0;
        echo '<div class="row-c">';
        // Mostramos las actividades
        foreach($listaActividad AS $actividad){
            if($actCount % 3 ==0 && $actCount!=0){
                echo"</div>";
                echo '<div class="row-c">';
            }
            $actCount++;
            echo"
            <div class='column-3'>";
            $rutacompleta="http://".$ruta.$actividad['imagen_act'];
            echo "<a href='./miActividad.php?id={$actividad["id_act"]}'><img class='imgMyAct borderimg' src='{$rutacompleta}'></a>";
            //echo "<input type='image' src='{$rutacompleta}'/>";
            echo "</br>";
            //echo '<p class="desc">'.$actividad["descripcion_act"].'</p>';
            //echo '<p class="desc">'.$actividad["fechaSub_act"].'</p>';
            echo"</div>";
        }
        // Esto muestra el numero de actividades que tiene el usuario
        echo"</div>";
        echo '<p class="aligntext margen" id="subirActButton">'.$actCount.' actividades</p>';
    ?>
</body>
</html>
