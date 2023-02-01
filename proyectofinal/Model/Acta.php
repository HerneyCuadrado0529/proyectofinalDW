<?php

require_once "DAO.php";

class Acta extends DAO
{


    protected $table = "actas";

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

    public function storeOrUpdate($id, $creador_id, $asunto, $fecha, $responsable, $hi, $hf, $orden, $descripcion)
    {
        $data = [];
        try {
            if ($id == 0) {
                $sql = "INSERT INTO actas (creador_id, asunto, fecha_creacion, hora_inicio, hora_final, responsable_id, orden_del_dia, descripcion_hechos) VALUES ({$creador_id}, '{$asunto}', '{$fecha}', '{$hi}', '{$hf}', {$responsable}, '{$orden}', '{$descripcion}')";
                $result = $this->query($sql);

                $data['status'] = 'success';
                $data['code'] = 'OK';
                $data['message'] = 'Registro insertado con exito';
                $data['data'] = [];
            } else {
                $sql = "UPDATE actas set asunto = '{$asunto}', orden_del_dia = '{$orden}', descripcion_hechos = '{$descripcion}' WHERE id = {$id}";
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


    // public function update($id, $data) {}


    public function delete($id)
    {
        $sql = "DELETE FROM actas WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'Registro eliminado con exito';
        $data['data'] = [];
        return $data;
    }
    public function edit($id)
    {
        $sql = "SELECT * FROM actas WHERE id = {$id}";
        $result = $this->query($sql);
        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data'] = $result;
        return $data;
    }

    public function infoActa($id)
    {
        $sql = "SELECT a.*, CONCAT(u.nombres, ' ', u.apellidos) AS creador 
                FROM actas AS a
                INNER JOIN usuarios AS u ON u.id = a.creador_id 
                WHERE a.id = {$id}";
        $acta = $this->query($sql);

        $sql = "SELECT concat(u.nombres, ' ', u.apellidos) AS asistente,
                username, identificacion
                FROM asistentes AS a
                INNER JOIN usuarios AS u ON u.id = a.asistente_id
                WHERE a.asistente_id = {$id}";
        $asistentes = $this->query($sql);

        $sql = "SELECT c.*, CONCAT(u.nombres, ' ', u.apellidos) AS resposable
                FROM compromisos AS c 
                INNER JOIN usuarios AS u ON u.id = c.responsable_id
                WHERE c.acta_id = {$id}";
        $compromisos = $this->query($sql);


        $data['status'] = 'success';
        $data['code'] = 'OK';
        $data['message'] = 'OK';
        $data['data']['acta'] = $acta;
        $data['data']['asistentes'] = $asistentes;
        $data['data']['compromisos'] = $compromisos;
        return $data;
    }
}
