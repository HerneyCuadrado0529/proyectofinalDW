<?php

require_once "DAO.php";

class Usuario extends DAO
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


    public function storeOrUpdate($id, $nombre, $apellido, $tipo_id, $identificacion, $usuario, $tipo, $password)
    {
        $data = [];
        try {
            if ($id == 0) {
                $sql = "INSERT INTO usuarios (nombres, apellidos, tipo_id, identificacion, username, password, tipo) VALUES ('{$nombre}', '{$apellido}', {$tipo_id}, '{$identificacion}', '{$usuario}', '{$password}', '{$tipo}')";
                $result = $this->query($sql);

                $data['status'] = 'success';
                $data['code'] = 'OK';
                $data['message'] = 'Registro insertado con exito';
                $data['data'] = [];
            } else {
                $sql = "UPDATE usuarios set nombres = '{$nombre}', apellidos = '{$apellido}', tipo_id = {$tipo_id}, identificacion = '{$identificacion}', username = '{$usuario}', password = '{$password}' WHERE id = {$id}";
                $result = $this->query($sql);
                $data['status'] = 'success';
                $data['code'] = 'OK';
                $data['message'] = 'Registro insertado con exito';
                $data['data'] = [];
            }
        } catch (PDOException $e) {
            header('Content-type:application/json;charset=utf-8');
            $data['status'] = 'error';
            $data['code'] = $e->getCode();
            $data['message'] = $e->getMessage();
            $data['data'] = [];
        }
        return $data;
    }


    public function edit($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }


    public function delete($id)
    {

        $sql = "DELETE FROM usuarios WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'Registro eliminado con exito';
        $data['data'] = [];
        return $data;
    }
}
