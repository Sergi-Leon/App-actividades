<?php

// Aqui recojo los datos del formulario
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$password2=$_POST['password2'];

//Definimos constantes para la conexión a la BD
const SERVIDOR = "localhost";
const USER = "root";
const PASSWD = "";
const BD = "db_appactiv";


if (isset($_POST['enviar'])) {
    //Con este if comparamos si las 2 contraseñas son iguales
    if ($password == $password2) {
        $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
        //Con el count(1) hacemos un select en la base de datos para ver si hay alguien con ese nombre
        $sql="SELECT count(1) as nombre FROM `tbl_usuario` WHERE nombre_usu = '$usuario';";
        $insertUser=mysqli_query($conexion,$sql);
        $datos = mysqli_fetch_array($insertUser);
        //Con este if comparamos si el count() es igual a 0
        if ($datos['nombre'] == 0) {
            //En el caso de que el count() sea igual a 0 insertamos en la base de datos al nuevo usuario, ya que count(0) significa que no existe ese usuario
            $sql2= "INSERT INTO tbl_usuario (`nombre_usu`,`contraseña_usu`) VALUES ('$usuario','$password') ";
            $insertUser2=mysqli_query($conexion,$sql2);
            //Una vez se inserte lo redirijimos al formulario del login
            header('Location:../view/login.php');
        } else {
            header('Location:../view/registro.php?msg=existe');
        }
    } else {
        header('Location:../view/registro.php?msg=contraseña');
    }
}