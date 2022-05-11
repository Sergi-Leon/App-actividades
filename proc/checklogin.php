<?php
// Definimos variables de sesión
$user=$_POST['user'];
$pass=$_POST['passwd'];
const SERVIDOR = "localhost";
const USER = "root";
const PASSWD = "";
const BD = "db_appactiv"; 
// Comprobamos si venimos del formulario login
if(isset($_POST['enviar'])){
// Comprobamos si se ha enviado usuario y contraseña desde el formulario
    if(!empty($_POST['user'])&&!empty($_POST['passwd'])){
        $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
// Verifamos si el usuario y la contraseña son correctos comparandolo con una consulta a la base de datos
        $sql="SELECT count(id_usu), id_usu FROM `tbl_usuario` WHERE nombre_usu = '$user' && contraseña_usu = '$pass';";
        $listauser=mysqli_query($conexion,$sql);
        foreach($listauser as $usuario){
            //var_dump($usuario);
            if($usuario['count(id_usu)']==1){
                // Si los datos son correctos iniciamos sesión, creamos la variable con el id del usuario y redireccionamos a actividades
                session_start();
                $_SESSION['usuario']=$usuario['id_usu'];
                header('Location: ../view/actividades.php');
            }else{
                header('Location: ../view/login.php?msg=fallo');
            }
        }
    }
}
