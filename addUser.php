<?php

include("connection.php");
$con = connection();

$id_usuario=null;
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$carrera = $_POST['carrera'];
$id_roles = $_POST['id_roles'];

$md5pass = md5($password);
$sql="INSERT INTO usuarios VALUES('$id_usuario','$nombre','$correo','$md5pass','$carrera','$id_roles')";
$query = mysqli_query($con, $sql);


if($query){
    Header("Location: index.php");
}else{
    echo '<div class="alert">Error al registrar usuario</div>';
}

?>