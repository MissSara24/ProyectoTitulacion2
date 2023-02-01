<?php 
    include("connection.php");
    $con=connection();

    $id_proyecto=$_GET['id_proyecto'];

    $sql="SELECT * FROM proyectos WHERE id_proyecto='$id_proyecto'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
    $nombre=$row['nombre'];
    $categoria=$row['categoria'];
    $titulo=$nombre.'.'.$categoria;
    $tipo=$row['tipo'];
    $archivo=$row['archivo'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <title>Editar proyectos</title>
    </head>
    <style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
        }
        .table-responsive {
            margin: 40px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {        
            padding-bottom: 15px;
            background: #828282;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 150px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        table.table td a.view {
        color: #03A9F4;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }	
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {        
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }    
        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }
        .custom-checkbox input[type="checkbox"] {    
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }
        .custom-checkbox label:before{
            width: 18px;
            height: 18px;
        }
        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }
        .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }
        .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }	
        .modal form label {
            font-weight: normal;
        }	
        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-right: 1rem;
            padding-left: 5rem;
            background: #212529;
            max-height:100px;
        }
        #menu ul{
            margin: 0;
            padding: 0;
            list-style: none;
            display: inline-block;
            width: 100%;
        }
        #menu ul li{
            display: inline;
        }
        #menu ul li a{
            color: #FFFF;
            text-decoration: none;
            font-size: 1rem;
            margin: 0;
            padding: 0;
        }
        #menu ul li a:hover{
            color: rgb(227, 109, 30);
            text-decoration: none;
        }
        .cerrar-sesion{
            margin-left: 1700px;
        }
        h1, .h1 {
            margin: 0;
            padding-top: 1rem;
            font-weight: 500;
            line-height: 1.2;
            color: rgb(255,255,255);
        }
        h1, .h1 {
            font-size: calc(1.375rem + 1.5vw);
        }
        @media (min-width: 1200px) {
            h1, .h1 {
                font-size: 1.5rem;
            }
        }
        .search-box {
        position: relative;        
        float: right;
        margin: 30px 0;
        }
        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }
        .search-box input:focus {
        
        }
        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div id="menu">
                <ul>
                    <h1>Sistema de Gestion de Proyectos</h1>
                    <a style="font-size:15px">Panel de Profesor</a>
                    <li class="cerrar-sesion"><a href="logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                                <div class="col-sm-6">
                                    <h2>Vista del <b>Proyecto</b></h2>
                                </div>
                                <div class="col-sm-6">
                                    <a href="index.php" class="btn btn-success">Regresar</a>	
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del Proyecto</th>
                                    <th>Unidad de Aprendizaje</th>
                                    <th>Carrera</th>
                                    <th>Profesor</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="id_proyecto" value="<?= $row['id_proyecto']?>" disabled></td>
                                    <td><input type="text" name="nombre" value="<?= $row['nombre']?>"disabled></td>
                                    <td><input type="text" name="id_materia" value="<?= $row['materia']?>"disabled></td>
                                    <td><input type="text" name="id_carrera" value="<?= $row['carrera']?>"disabled></td>
                                    <td><input type="text" name="id_usuario" value="<?= $row['profesor']?>"disabled></td> 
                                </tr>
                            </tbody>
                                <tr>
                                    <th>Periodo Escolar</th>
                                    <th>Descripcion</th>
                                    <th>Calificacion</th>
                                    <th>Integrantes</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="periodo_esc" value="<?= $row['periodo_esc']?>"disabled></td>
                                    <td><input type="text" name="descripcion" value="<?= $row['descripcion']?>"disabled></td>
                                    <td><input type="text" name="calificacion" value="<?= $row['calificacion']?>"disabled></td>
                                    <td><input type="text" name="integrantes" value="<?= $row['integrantes']?>"disabled></td>
                                </tr>
                        </table>
                        <div class="m-auto w-75 mt-2 text-center">
                                    <?php
                                    $valor="";
                                    $valor="<iframe class='w-100' height='500' src='data:".$tipo.";base64,".base64_encode($archivo)."' frameborder='0'></iframe>";
                                    echo $valor;
                                    ?>
                                </div>
                </div>
            </div>
        </div>
        <footer class="py-5" style="margin-top: 420px; background:#212529;">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Instituto Politecnico Nacional</p></div>
        </footer>
    </body>
</html>