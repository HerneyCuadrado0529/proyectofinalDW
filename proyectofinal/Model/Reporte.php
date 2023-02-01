<?php

require_once "DAO.php";

class Reporte extends DAO
{


    protected $table = "";

    public function __construct()
    {
    }

    public function actas_fechas($fecha_i, $fecha_f)
    {
        $result = $this->query("SELECT * 
                                FROM actas 
                                WHERE str_to_date(fecha_creacion,'%d/%m/%Y') BETWEEN str_to_date('{$fecha_i}','%Y-%m-%d') AND str_to_date('{$fecha_f}','%Y-%m-%d')");
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }

    public function compromisos_pendientes()
    {
        $result = $this->query("SELECT * FROM actas
                                WHERE id NOT IN (SELECT acta_id FROM compromisos)");    
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }

    public function actas_usuarios($id)
    {
        $result = $this->query("SELECT * FROM actas WHERE creador_id = {$id}");    
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }

    public function busqueda_codigo($id)
    {
        $result = $this->query("SELECT * FROM actas WHERE id = {$id}");    
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }

    public function busqueda_asunto($asunto)
    {
        $result = $this->query("SELECT * FROM actas WHERE asunto like '%$asunto%'");    
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }

    public function storeOrUpdate($id, $acta, $responsable, $fi, $ff, $descripcion)
    {
        $data = [];
        try {
            if ($id == 0) {
                $sql = "INSERT INTO compromisos (acta_id, responsable_id, descripcion, fecha_inicio, fecha_final) VALUES ({$acta}, {$responsable}, '{$descripcion}', '{$fi}', '{$ff}')";
                $result = $this->query($sql);

                $data['status'] = 'success';
                $data['code'] = 'OK';
                $data['message'] = 'Registro insertado con exito';
                $data['data'] = [];
            } else {
                $sql = "UPDATE compromisos set acta_id = {$acta}, responsable_id = {$responsable}, descripcion = '{$descripcion}', fecha_inicio = '{$fi}', fecha_final = '{$ff}' WHERE id = {$id}";
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


    public function delete($id)
    {
        $sql = "DELETE FROM compromisos WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'Registro eliminado con exito';
        $data['data'] = [];
        return $data;
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM compromisos WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }
}
