<?php
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
//$isLike=myLike(1, 66);

// function ShowTop($i){
//     $SERVIDOR = "localhost";
//     $USER = "root";
//     $PASSWD = "";
//     $BD = "db_appactiv"; 
//     $conexion=mysqli_connect($SERVIDOR,$USER,$PASSWD,$BD);
//     $sqltop="SELECT * FROM `tbl_likes` WHERE id_act = $i";
//     $top5=mysqli_query($conexion,$sql);
//     foreach ($top5 AS $actividad){
//         $rutacompleta="http://".$ruta.$actividad['imagen_act'];
//         echo'<div class="column-4 padding-s">';
//         echo "<a href='./miActividad.php?id={$actividad["id_act"]}'><img class='imgMyAct' src='{$rutacompleta}'></a>";
//         echo'</div>';
//     }
// }


