<?php

include("connection.php");
$con = connection();

$id_proyecto=$_GET["id_proyecto"];

$sql="DELETE FROM proyectos WHERE id_proyecto='$id_proyecto'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>