<?php

class ActaController
{

    private $actas;

    public function __construct()
    {
        require_once "Model/Acta.php";  
         
    }

    public function list()
    {
        $this->actas = new Acta();    
        $data = $this->actas->getAll();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }
    public function store()
    {
        session_start();  
        $data = [];
        $id = $_POST['id'];
        $creador_id = $_SESSION['id_usuario'];
        $asunto = $_POST['asunto'];
        $fecha = $_POST['fecha'];
        $responsable = $_POST['responsable'];
        $hi = $_POST['hi'];
        $hf = $_POST['hf'];
        $orden = $_POST['orden'];
        $descripcion = $_POST['descripcion'];

        $this->actas = new Acta();    
        $data = $this->actas->storeOrUpdate($id, $creador_id, $asunto, $fecha, $responsable, $hi, $hf, $orden, $descripcion);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
    
    public function edit()
    {
        $id = $_POST['id'];
        $this->actas = new Acta();  
        $data = $this->actas->edit($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $this->actas = new Acta();  
        $data = $this->actas->delete($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
    
    public function info()
    {
        $id = $_POST['id'];
        $this->actas = new Acta();  
        $data = $this->actas->infoActa($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
}
