<?php

function conexion(){
      try{
        $pdo = new \PDO('mysql:host=localhost;dbname=curso;charset=utf8',
            'root',
            'mysql',
            array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => false,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = 'America/Mexico_City' ",
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' "
            )
        );
        return $pdo;
      }catch(\PDOException $ex){
        return print($ex->getMessage());
      }
    }
    
?>
