<?php
include("connection.php");
$con = connection();

$id_proyecto = null;
$nombre = $_POST['nombre'];
$materia = $_POST['materia'];
$carrera = $_POST['carrera'];
$profesor = $_POST['profesor'];
$archivo = $_FILES['archivo'];
var_dump($archivo);
$tipo=$archivo['type'];
$categoria=explode('.',$archivo['name'])[1];
$tmp_name=$archivo['tmp_name'];
$contenido_archivo=file_get_contents($tmp_name);
$archivoBLOB=addslashes($contenido_archivo);
$periodo_esc = $_POST['periodo_esc'];
$descripcion = $_POST['descripcion'];
$calificacion = $_POST['calificacion'];
$integrantes = $_POST['integrantes'];

$sql = "INSERT INTO proyectos VALUES('$id_proyecto','$nombre','$materia','$carrera','$profesor','$categoria','$tipo','$archivoBLOB','$periodo_esc','$descripcion','$calificacion','$integrantes')";
$query = mysqli_query($con, $sql);

/*if($_FILES["archivo"]["error"]>0){
    echo "Error al cargar archivo";
}else{
    $permitidos = array("application/pdf");
    $limite=200;

    if(in_array($_FILES["archivo"]["type"],$permitidos)&& $_FILES["archivo"]["size"]<=$limite*1024){
        $ruta = 'files/'.$id_proyecto.'/';
        $archivo2=$ruta.$_FILES["archivo"]["name"];
            if(!file_exists($ruta)){
                mkdir($ruta);
            }
        }
}*/ if($query){
    Header("Location: index.php");
}else{
    echo $errorInsert = 'No se pudo guardar';
}
?>