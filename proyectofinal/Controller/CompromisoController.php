<?php

class CompromisoController
{

    private $compromisos;

    public function __construct()
    {
        require_once "Model/Compromiso.php";  
         
    }

    public function list()
    {
        $this->compromisos = new Compromiso();    
        $data = $this->compromisos->getAll();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }
    public function store()
    {
        $data = [];
        $id = $_POST['id'];
        $acta = $_POST['acta'];
        $responsable = $_POST['responsable'];
        $fi = $_POST['fi'];
        $ff = $_POST['ff'];
        $descripcion = $_POST['descripcion'];

        $this->compromisos = new Compromiso();    
        $data = $this->compromisos->storeOrUpdate($id, $acta, $responsable, $fi, $ff, $descripcion);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
    
    public function edit()
    {
        $id = $_POST['id'];
        $this->compromisos = new Compromiso();  
        $data = $this->compromisos->edit($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $this->compromisos = new Compromiso();  
        $data = $this->compromisos->delete($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode([$data]);
    }
    
}
