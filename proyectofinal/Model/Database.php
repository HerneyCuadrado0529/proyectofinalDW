<?php

class Database
{ 

    public static function conexion()
    {
        try {
            $instance = new PDO('mysql:host=localhost;dbname=actas', 'root', '');
            $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            $instance->query('SET NAMES utf8');
            $instance->query('SET CHARACTER SET utf8');
            return $instance;
        } catch (PDOException $error) {
            return $error->getMessage();
        }
        
    }
   
}
