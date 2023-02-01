<?php

class UsuarioController
{

    private $usuarios;

    public function __construct()
    {
        require_once "Model/Usuario.php";
    }

    public function list()
    {
        $this->usuarios = new Usuario();
        $data = $this->usuarios->getAll();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function store()
    {
        $data = [];
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipo_id = $_POST['tipo_id'];
        $identificacion = $_POST['identificacion'];
        $usuario = $_POST['usuario'];
        $tipo = $_POST['tipo'];
        $password = password_hash($identificacion, PASSWORD_DEFAULT);

        $this->usuarios = new Usuario();
        $data = $this->usuarios->storeOrUpdate($id, $nombre, $apellido, $tipo_id, $identificacion, $usuario, $tipo, $password);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function edit()
    {
        $id = $_POST['id'];
        $this->usuarios = new Usuario();
        $data = $this->usuarios->edit($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $this->usuarios = new Usuario();
        $data = $this->usuarios->delete($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
}
