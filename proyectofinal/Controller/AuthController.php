<?php

class AuthController
{

    private $auth;

    public function __construct()
    {
        require_once "Model/Auth.php";
    }

    public function login()
    {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $this->auth = new Auth();
        $data = $this->auth->login($user, $pass);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ../public/index.php');
    }

    public function cambioContraseña()
    {

        $email = $_POST['email'];
        $this->auth = new Auth();
        if ($this->auth->validar($email)) {
            header('Location: ChangePassword.php?email=' . $email);
            // header('Location: ../public/RecoverPassword.php');
        } else {
            echo "<script> 
                alert('Este usuario no está en la base de datos');
                window.location.href = '../public/index.php';     
                </script>";
        }
    }

    public function actualizarPass()
    {
        $user = $_POST['email'];
        $pass = $_POST['pass'];
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $this->auth = new Auth();
        if ($this->auth->updatePassword($user, $password)) {
            echo "<script> 
            alert('Contraseña actualizada con exito');
            window.location.href = 'public/index.php';     
            </script>";
        }
    }
}
