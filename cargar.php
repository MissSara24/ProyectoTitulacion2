<?php 
    include("connection.php");
    $con=connection();

    $id_proyecto=$_GET['id_proyecto'];

    $sql="SELECT * FROM proyectos WHERE id_proyecto='$id_proyecto'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);


    $valor=$row['archivo'];
   
    header("Content-type:"."application/pdf");
    header("Content-Disposition:inline;filename=$valor"."application/pdf");
    echo $valor;
?>