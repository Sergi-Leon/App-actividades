<?php
// Definimos variables de inicio de sesión
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
// Variables relacionadas con las imagenes
echo $namefoto;
$destino=$_SERVER['DOCUMENT_ROOT'].'/www/App-actividades/img/'.$foto["name"];
$conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
// Comprobamos el formato de las imagnes, si es el correcto subimos el fichero
if(($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")){
    // Subimos el fichero
    $exito=move_uploaded_file($foto['tmp_name'], $destino);
    //echo $exito;
    // Si la subida del fichero ha funcionado añadimos el registro
    if($exito){
        $sql="INSERT INTO `tbl_actividadad` (`Titulo`, `descripcion_act`, `imagen_act`, `fechaSub_act`, `tiempoEst_act`, `id_autor`, `tag`) VALUES ('$titulo', '$desc', '$namefoto', current_date, '$tiempo', '$user', '$topic')";
        $listcontactos=mysqli_query($conexion,$sql);
    }
    echo'<script>window.location.href = "../view/misactividades.php"</script>';

    // INSERT INTO `tbl_actividadad` (`Titulo`, `descripcion_act`, `imagen_act`, `fechaSub_act`, `tiempoEst_act`, `id_autor`, `tag`) VALUES ("Test", "prueba", "foto", current_date, "10", "1", "1");
}else{
    // Refirigimos al formulario de subir actividades si falla la subida
    header('Location: ../view/subirActiv.php?msg=fallo');
}
