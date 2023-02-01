<?php

class ReporteController
{

    private $resportes;

    public function __construct()
    {
        require_once "Model/Reporte.php";  
         
    }

    public function actas_fechas()
    {
        $fecha_i = $_POST['fecha_i'];
        $fecha_f = $_POST['fecha_f'];
        $this->resportes = new Reporte();    
        $data = $this->resportes->actas_fechas($fecha_i, $fecha_f);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }

    public function compromisos_pendientes()
    {
        $this->resportes = new Reporte();    
        $data = $this->resportes->compromisos_pendientes();
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }

    public function actas_usuarios()
    {
        $id = $_POST['usuario'];
        $this->resportes = new Reporte();    
        $data = $this->resportes->actas_usuarios($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }

    public function busqueda_codigo()
    {
        $id = $_POST['id'];
        $this->resportes = new Reporte();    
        $data = $this->resportes->busqueda_codigo($id);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }

    public function busqueda_asunto()
    {
        $asunto = $_POST['asunto'];
        $this->resportes = new Reporte();    
        $data = $this->resportes->busqueda_asunto($asunto);
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($data);
    }
    
}
