<?php
const SERVIDOR = "localhost";
const USER = "root";
const PASSWD = "";
const BD = "db_appactiv";
session_start();
$user = $_SESSION['usuario'];
$titulo = $_POST['titulo'];
$desc = $_POST['descripcion'];
$tiempo = $_POST['tiempoEstim'];
$topic = $_POST['topic'];
$foto =$_FILES['foto'];
$namefoto = $foto["name"];
echo $namefoto;
$destino=$_SERVER['DOCUMENT_ROOT'].'/www/App-actividades/img/'.$foto["name"];
$conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);

if(($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")){
    $exito=move_uploaded_file($foto['tmp_name'], $destino);
    //echo $exito;
    if($exito){
        $sql="INSERT INTO `tbl_actividadad` (`Titulo`, `descripcion_act`, `imagen_act`, `fechaSub_act`, `tiempoEst_act`, `id_autor`, `tag`) VALUES ('$titulo', '$desc', '$namefoto', current_date, '$tiempo', '$user', '$topic')";
        $listcontactos=mysqli_query($conexion,$sql);
    }
    echo'<script>window.location.href = "../view/misactividades.php"</script>';

    // INSERT INTO `tbl_actividadad` (`Titulo`, `descripcion_act`, `imagen_act`, `fechaSub_act`, `tiempoEst_act`, `id_autor`, `tag`) VALUES ("Test", "prueba", "foto", current_date, "10", "1", "1");
}else{
    header('Location: ../view/subirActiv.php?msg=fallo');
}
