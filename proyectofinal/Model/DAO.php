<?php


require_once ('Database.php');
 
class DAO {

    private $connection;
    // public $table;   
    
    public function query($sql)
    {        
        $this->connection = Database::conexion();
        $stm = $this->connection->prepare($sql);
        $stm->execute();        
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectAll()
    {
        $this->connection = Database::conexion();      
        $sql = "SELECT * FROM {$this->table}";
        $stm = $this->connection->prepare($sql);
        $stm->execute();        
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function selectById($id)
    {
        $this->connection = Database::conexion();
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stm = $this->connection->prepare($sql);
        $stm->bindParam(1, $id);
        $stm->execute();
        $res = $stm->fetch();
        if ($res == false) {
            return null;
        }
        return $res;
    }

    public function store($data){}

    public function delete($id){}
    
    public function update($id, $data){}
    
}