<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "Del1al10.";

    $bd = "proyectotitulacion";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>