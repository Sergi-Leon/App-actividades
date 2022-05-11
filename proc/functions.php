<?php
// Funcion para conseguir cuantos likes tienen las actividades
function getLikes($i){
    $SERVIDOR = "localhost";
    $USER = "root";
    $PASSWD = "";
    $BD = "db_appactiv"; 
    $conexion=mysqli_connect($SERVIDOR,$USER,$PASSWD,$BD);
    $sql="SELECT count(id_like) AS likes FROM `tbl_likes` WHERE id_act = $i";
    $listaLikes=mysqli_query($conexion,$sql);
    foreach ($listaLikes AS $like){
        //var_dump($like);
        $likenum = $like['likes'];
        return $likenum;
    }
    //return $listaLikes;
}
// Detectar que el usuario activo le ha dado like
function myLike($u, $a){
    $SERVIDOR = "localhost";
    $USER = "root";
    $PASSWD = "";
    $BD = "db_appactiv"; 
    $conexion=mysqli_connect($SERVIDOR,$USER,$PASSWD,$BD);
    $sql="SELECT count(id_user) AS `count` FROM `tbl_likes` WHERE id_act = $a AND id_user= $u";
    $myLikes=mysqli_query($conexion,$sql);
    foreach ($myLikes AS $like){
        //var_dump($like);
        if($like['count'] >=1){
            return true;
        }else{
            return false;
        }
    }
}



