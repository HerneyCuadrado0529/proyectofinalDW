<?php

class AsistenteController
{

    private $asistentes;

    public function __construct()
    {
        require_once "Model/Asistente.php";
    }

    public function list()
    {
        $this->asistentes = new Asistente();
        $data = $this->asistentes->getAll();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function store()
    {
        $data = [];
        $id = $_POST['id'];
        $acta = $_POST['acta'];
        $asistente = $_POST['asistente']; 

        $this->asistentes = new Asistente();
        $data = $this->asistentes->storeOrUpdate($id, $acta, $asistente);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function edit()
    {
        $id = $_POST['id'];
        $this->asistentes = new Asistente();
        $data = $this->asistentes->edit($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $this->asistentes = new Asistente();
        $data = $this->asistentes->delete($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
}
