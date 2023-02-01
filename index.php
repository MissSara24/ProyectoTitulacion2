<?php

include_once 'user.php';
include_once 'user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])&& isset($_SESSION['rol'])){
    //echo "Hay sesión";
    $user->setUser($userSession->getCurrentUser());
    switch($_SESSION['rol']){
        case 1:
            header('location: admin.php');
        break;

        case 2:
        header('location: teacher.php');
        break;

        default:
    }
}else if(isset($_POST['correo']) && isset($_POST['password'])){
    //echo "Validación de login";

    $userForm = $_POST['correo'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm) && isset($_SESSION['rol'])){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;
    
            case 2:
            header('location: teacher.php');
            break;
    
            default:
        }

    }else{
        //echo "nombre de usuario y/o password incorrecto";
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once 'login.php';
    }

}else{
    //echo "Login";
    include_once 'login.php';
}


?>