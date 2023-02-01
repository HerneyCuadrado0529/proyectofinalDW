<?php

require_once "DAO.php";

class Asistente extends DAO
{


    protected $table = "asistentes";

    public function __construct()
    {
    }

    public function getAll()
    {
        $result = $this->query("SELECT c.id, a.asunto as acta, 
                                concat(u.nombres, ' ', u.apellidos) as asistente 
                                FROM asistentes as c 
                                inner join actas as a on a.id = c.acta_id 
                                inner join usuarios as u on u.id = c.asistente_id");
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }


    public function storeOrUpdate($id, $acta_id, $asistente_id)
    {
        $data = [];
        try {
            if ($id == 0) {
                $sql = "INSERT INTO asistentes (acta_id, asistente_id) VALUES ({$acta_id}, {$asistente_id})";
                $result = $this->query($sql);

                $data['status'] = 'success';
                $data['code'] = 'OK';
                $data['message'] = 'Registro insertado con exito';
                $data['data'] = [];
            } else {
                $sql = "UPDATE asistentes set acta_id = {$acta_id}, asistente_id = {$asistente_id} WHERE id = {$id}";
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
        $sql = "SELECT * FROM asistentes WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }


    public function delete($id)
    {

        $sql = "DELETE FROM asistentes WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'Registro eliminado con exito';
        $data['data'] = [];
        return $data;
    }
}
