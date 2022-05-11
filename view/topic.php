<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topic</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Función de JavaScript para el botón de guardar enlace -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function copyToClipboard(enlace) {
    var input = 'http://localhost/www/App-actividades/view/miActividad.php?id=';
    var final = input.concat(enlace);
    navigator.clipboard.writeText(final);
    alert("Texto copiado");
}
</script>
<?php
    session_start();
    include '../proc/functions.php ';
    $id=$_GET['id'];
    const SERVIDOR = "localhost";
    const USER = "root";
    const PASSWD = "";
    const BD = "db_appactiv"; 
    $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
    $sql="SELECT * FROM `tbl_actividadad` WHERE tag =$id ORDER BY `fechaSub_act`";
    $sqlTitulo="SELECT topic_top FROM `tbl_topic` WHERE id_top =$id";
    $listaTitulo=mysqli_query($conexion,$sqlTitulo);
    $listaActividad=mysqli_query($conexion,$sql);
    $ruta=$_SERVER['SERVER_NAME']."/www/APP-ACTIVIDADES/img/";
    ?>

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
                </form>
            </div>
        </div>
    </nav>
    <div class="row-c">
        <div class="column-1 padding-m">
            <?php
            foreach($listaTitulo AS $titulo){
                echo"<h2 class='padding-m aligntext'>{$titulo["topic_top"]}</h2>";
            }
            ?>
            <h4 class="padding-m">Explora</h4>
        </div>
        <?php
        foreach($listaActividad AS $actividad){
            $numlikes=getLikes($actividad["id_act"]);
            $mylike=0;
            if(isset($_SESSION['usuario'])){
                $mylike=myLike($_SESSION['usuario'],$actividad["id_act"]);
            }
            $rutacompleta="http://".$ruta.$actividad['imagen_act'];
            $idlink=$actividad["id_act"];
            echo'<div class="column-3 padding-mobile">';
            echo "<a href='./miActividad.php?id={$actividad["id_act"]}'><img class='imgMyAct' src='{$rutacompleta}'></a>";
            echo'<div style="float: right;" class="padding-m">';
            echo"<button onclick='copyToClipboard(".$idlink.")' class='btn btn-light m-1' type='submit'><i class='fa-solid fa-link'></i></button>";
                    if($mylike && isset($_SESSION['usuario'])){
                        echo"<a href='../proc/like.php?id={$actividad["id_act"]}'><button class='btn btn-light m-1' type='submit'><i class='fa-solid fa-heart'></i></button></a>";
                    }else{
                        if(isset($_SESSION['usuario'])){
                            echo"<a href='../proc/like.php?id={$actividad["id_act"]}'><button class='btn btn-light m-1' type='submit'><i class='fa-regular fa-heart'></i></button></a>";
                        }else{
                            echo"<a href='login.php'><button class='btn btn-light m-1' type='submit'><i class='fa-regular fa-heart'></i></button></a>";
                        }
                    }
                    echo $numlikes;
                    //echo $mylike;
            echo"</div>
            </div>
             </br>";
        }
        ?>
    </div>
</body>
</html>