<?php

include("connection.php");
$con = connection();
$id_proyecto=$_POST["id_proyecto"];
$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$carrera = $_POST['carrera'];
$profesor = $_POST['profesor'];
$archivo = $_FILES['archivo'];
$sql1="SELECT * FROM proyectos WHERE id_proyecto='$id_proyecto'";
$query1=mysqli_query($con, $sql1);
$row=mysqli_fetch_assoc($query1);
$nombreA=$row['nombre'];
$materiaA=$row['materia'];
$carreraA=$row['carrera'];
$profesorA=$row['profesor'];
$periodoA=$row['periodo_esc'];
$descripcionA=$row['descripcion'];
$calificacionA=$row['calificacion'];
$integrantesA=$row['integrantes'];
var_dump($archivo);
if(($archivo['size']==0 && $materia!=$materiaA)||($archivo['size']==0 && $nombre!=$nombreA)||($archivo['size']==0 && $profesor!=$profesorA)||
($archivo['size']==0 && $periodo_esc!=$periodoA)||($archivo['size']==0 && $descripcion!=$descripcionA)||($archivo['size']==0 && $calificacion!=$calificacionA)||
($archivo['size']==0 && $integrantes!=$integrantesA)){
    $sql="UPDATE proyectos SET nombre='$nombre', materia='$materia', carrera='$carrera', profesor='$profesor',categoria='$categoria',tipo='$tipo', archivo='$archivoBLOB',periodo_esc='$periodo_esc', descripcion='$descripcion', calificacion='$calificacion', integrantes='$integrantes' WHERE id_proyecto='$id_proyecto'";
    $query = mysqli_query($con, $sql);
    if($query){
        Header("Location: index.php");
    }else{
        echo $errorInsert = 'No se pudo guardar';
    }
}

$tipo=$archivo['type'];
$categoria=explode('.',$archivo['name'])[1];
$tmp_name=$archivo['tmp_name'];
$contenido_archivo=file_get_contents($tmp_name);
$archivoBLOB=addslashes($contenido_archivo);
$periodo_esc = $_POST['periodo_esc'];
$descripcion = $_POST['descripcion'];
$calificacion = $_POST['calificacion'];
$integrantes = $_POST['integrantes'];

$sql="UPDATE proyectos SET nombre='$nombre', materia='$materia', carrera='$carrera', profesor='$profesor',categoria='$categoria',tipo='$tipo', archivo='$archivoBLOB',periodo_esc='$periodo_esc', descripcion='$descripcion', calificacion='$calificacion', integrantes='$integrantes' WHERE id_proyecto='$id_proyecto'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{
    echo $errorInsert = 'No se pudo guardar';
}

?>