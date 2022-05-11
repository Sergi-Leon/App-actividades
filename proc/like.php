<?php
// Definimos variables de sesión
session_start();
// Detectamos si hay un usuario activo, sino redireccionamos a login
if(!isset($_SESSION['usuario'])){
    header('Location:login.php');
}   
// Definimos las variables para la conexión a la base de datos
$user=$_SESSION['usuario'];
$id=$_GET['id'];

const SERVIDOR = "localhost";
const USER = "root";
const PASSWD = "";
const BD = "db_appactiv"; 
$conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
$sql="SELECT id_user from tbl_likes WHERE `id_user` = $user AND `id_act` = $id";
$listaLikes=mysqli_query($conexion,$sql);
$repeat=0;
// Este foreach devuelve un true o false
foreach($listaLikes as $like){
    echo $like["id_user"];
    if($like["id_user"] == $user){
        $repeat=1;
    }
}
// Si es false añadimos datos y si es false lo borramos
if($repeat !=1){
    $sql="INSERT INTO `tbl_likes`(`id_like`, `id_act`, `id_user`) VALUES (NULL,$id,$user)";
}else{
    $sql="DELETE FROM `tbl_likes` WHERE `id_user` = $user AND `id_act` = $id";
}
$listaLikes=mysqli_query($conexion,$sql);
// Redireccion a actividades.php
header('Location:../view/actividades.php');

//DELETE FROM `tbl_likes` WHERE `id_user` = $user;