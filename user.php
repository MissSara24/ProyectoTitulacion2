<?php

include_once 'db.php';

class User extends DB{

    private $nombre;
    private $correo;

    public function userExists($correo, $pass){
        $md5pass = md5($pass);

        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :correo AND password = :pass');
        $query->execute(['correo' => $correo, 'pass' => $md5pass]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            // validar rol
            $rol = $row[5];
            $_SESSION['rol'] = $rol;

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
            // no existe el usuario
           // echo "El usuario o contraseña son incorrectos";
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE correo = :user');
        $query->execute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['correo'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

}

?>