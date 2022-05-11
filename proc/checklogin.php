<?php
$user=$_POST['user'];
$pass=$_POST['passwd'];
const SERVIDOR = "localhost";
const USER = "root";
const PASSWD = "";
const BD = "db_appactiv"; 
if(isset($_POST['enviar'])){
    if(!empty($_POST['user'])&&!empty($_POST['passwd'])){
        $conexion=mysqli_connect(SERVIDOR,USER,PASSWD,BD);
        $sql="SELECT count(id_usu), id_usu FROM `tbl_usuario` WHERE nombre_usu = '$user' && contraseña_usu = '$pass';";
        $listauser=mysqli_query($conexion,$sql);
        foreach($listauser as $usuario){
            //var_dump($usuario);
            if($usuario['count(id_usu)']==1){
                session_start();
                $_SESSION['usuario']=$usuario['id_usu'];
                header('Location: ../view/actividades.php');
            }else{
                header('Location: ../view/login.php?msg=fallo');
            }
        }
    }
}
