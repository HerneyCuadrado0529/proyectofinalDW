<?php
include '../../config/database.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

try {
    $data = [];
    $statement = $mbd->prepare("SELECT * FROM usuarios where username = :username");
    $statement->bindParam(':username', $user);
    $statement->execute();
    if ($statement->rowCount() == 0) {
        $data['status'] = 'error';
        $data['code'] = 'OK';
        $data['message'] = 'No existe el usuarios en la base de datos';
        $data['data'] = [];
    } else {
        $results = $statement->fetch(PDO::FETCH_OBJ);
        if (password_verify($pass, $results->password)) {
            session_start();
            $_SESSION['id_usuario']  = $results->id;
            $_SESSION['rol']  = $results->tipo;
            $_SESSION['nombre']  = $results->nombres . " " . $results->apellidos;
            $data['status'] = 'success';
            $data['code'] = 'OK';
            $data['message'] = 'Login exotoso';
            $data['data'] = $results;
        } else {           
            $data['status'] = 'error';
            $data['code'] = 'OK';
            $data['message'] = 'Error en credenciales';
            $data['data'] = [];
        }
    }
    header('Content-type:application/json;charset=utf-8');
    echo json_encode($data);
} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');
    $data['status'] = 'error';
    $data['code'] = $e->getCode();
    $data['message'] = $e->getMessage();
    $data['data'] = [];
    echo json_encode($data);
}
