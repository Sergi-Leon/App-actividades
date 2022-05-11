<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
<?php
    session_start();
    const SERVIDOR = "localhost";
    const USER = "root";
    const PASSWD = "";
    const BD = "db_appactiv"; 
    $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
    $sql="SELECT * FROM `tbl_actividadad` ORDER BY `fechaSub_act` desc, id_act desc LIMIT 0,4";
    $listaActividad=mysqli_query($conexion,$sql);
    $ruta=$_SERVER['SERVER_NAME']."/www/APP-ACTIVIDADES/img/";
    // if(!isset($_SESSION['usuario'])){
    //     header('Location:login.php');
    // }
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="#">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./actividades.php">Actividades</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href='../proc/cerrarsesion.php' class='btn btn-light form-control ms-1'>Salir</a>
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <a href='subirActiv.php' class='btn btn-light form-control ms-1'><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                    <?php
                        if(isset($_SESSION['usuario'])){
                            echo "<a href='misactividades.php' class='btn btn-light form-control ms-1'>Perfil</a>";
                        }else{
                            echo "<a href='login.php' class='btn btn-light form-control ms-1'>Iniciar</a>";
                        }
                    ?>
                    <!-- <button class="btn btn-light form-control ms-1" type="submit">Acceder</button> -->
                </form>
            </div>
        </div>
    </nav>
    <!-- Topics -->

    <div class="row-c padding-m aligntext">
        <div class="column-66 padding-m padding-right aligntext">
            <h5 >Topics</h5>
            <a href='topic.php?id=1'><button type="button" class="btn btn-primary mt-1">matemáticas</button></a>
            <a href='topic.php?id=2'><button type="button" class="btn btn-info mt-1">informática</button></a>
            <button type="button" class="btn btn-dark mt-1">...</button>
        </div>
    </div>

    <!-- Intro -->
    <header class="text-white flex padding-l">
        <h1><strong>#AppName</strong></h1>
    </header>
    <div class="row-c padding-m aligntext">
        <div class="column-1 padding-m">
            <h5>Navega</h5>
        </div>
        <div class="column-66 padding-m padding-right aligntext">
            <!-- <h2><strong>#AppName</strong> es un club para explorar, desarrollar y compartir nuestra creatividad natural</h2> -->
        </div>
    </div>
<h4 class="padding-m padding-right aligntext">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore, corporis ipsa. Non, exercitationem! Vel enim exercitationem dolores, incidunt, molestias praesentium magnam cumque nostrum aperiam ducimus tempore? Fugit placeat debitis asperiores.</h4>
    <!-- Random de actividades -->

    <div class="row-c padding-m aligntext">
        <div class="column-1 padding-m">
            <h5>Subidas recientemente</h5>
        </div>

        <div class="column-1 padding-s">
            <?php
            foreach($listaActividad AS $actividad){
                
                $rutacompleta="http://".$ruta.$actividad['imagen_act'];
                echo'<div class="column-4 padding-s">';
                echo "<a href='./miActividad.php?id={$actividad["id_act"]}'><img class='imgMyAct' src='{$rutacompleta}'></a>";
                echo'</div>';
            }
            ?>
        </div>
    </div>

</body>

</html>