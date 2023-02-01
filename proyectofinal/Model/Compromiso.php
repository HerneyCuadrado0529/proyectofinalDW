<?php

require_once "DAO.php";

class Compromiso extends DAO
{


    protected $table = "compromisos";

    public function __construct()
    {
    }

    public function getAll()
    {
        $result = $this->query("SELECT *, a.asunto as acta, 
                                concat(u.nombres, ' ', u.apellidos) as responsable 
                                FROM compromisos as c 
                                left join actas as a on a.id = c.acta_id 
                                inner join usuarios as u on u.id = c.responsable_id");
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
