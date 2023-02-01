<?php

require_once "DAO.php";

class Auth extends DAO
{


    protected $table = "usuarios";

    public function __construct()
    {
    }

    public function getAll()
    {
        $result = $this->selectAll();
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }


    public function login($user, $pass)
    {
        $sql = "SELECT * FROM usuarios where username = '{$user}'";
        $result = $this->query($sql);
        $data = [];
        if (count($result) == 0) {
            $data['status'] = 'error';
            $data['code'] = 'OK';
            $data['message'] = 'No existe el usuarios en la base de datos';
            $data['data'] = [];
        } else {
            if (password_verify($pass, $result[0]['password'])) {
                session_start();
                $_SESSION['id_usuario']  = $result[0]['id'];
                $_SESSION['username']  = $result[0]['username'];
                $_SESSION['rol']  = $result[0]['tipo'];
                $_SESSION['nombre']  =  $result[0]['nombres'] . " " .  $result[0]['apellidos'];
                $data['status'] = 'success';
                $data['code'] = 'OK';
                $data['message'] = 'Login exotoso';
                $data['data'] = $result;
            } else {
                $data['status'] = 'error';
                $data['code'] = 'OK';
                $data['message'] = 'Error en credenciales';
                $data['data'] = [];
            }
        }
        return $data;
    }

    public function validar($email)
    {
        $sql = "SELECT * FROM usuarios where username = '{$email}'";
        $result = $this->query($sql);
        $data = [];
        if (count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function updatePassword($user, $pass)
    {
        $sql = "UPDATE usuarios set password = '{$pass}'  where username = '{$user}'";
        $result = $this->query($sql);        
        return true;
    }
}
