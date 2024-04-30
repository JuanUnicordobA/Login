<?php

namespace app;

require_once 'Utils/Connection.php';
require_once 'Utils/JsonResponse.php';

use PDO;
use Utils\Connection;
use Utils\JsonResponse;

class Model
{

    private PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = (new Connection())->getConnection();
    }


    public function all()
    {
        $sql = "SELECT * FROM $this->table";
        $prepare = $this->pdo->prepare($sql);
        $prepare->execute();
        $objects = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $objects;
    }

    public function find(int $id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':id', $id);
        $prepare->execute();
        
        if ($prepare->rowCount() > 0) {
            return $prepare->fetch(PDO::FETCH_OBJ);
        }
        
        JsonResponse::send(
            404,
            'registro no encontrado',
            null
        );

        die();
    }

    public function create($data)
    {
        $i = 1;
        $sql = "INSERT INTO $this->table (" . implode(",", array_keys($data)) . ") VALUES(" . implode(",", array_fill(0, count($data), "?")) . ")";
        $prepare = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }
        $prepare->execute();

        return $this->pdo->lastInsertId();
    }


    public function delete(int $id)
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':id', $id);
        
        if(!$prepare->execute()){
            JsonResponse::send(
                404,
                'evento no encontrado',
                null
            );
            die();
        }

        return true;
    }

    public function update(array $data, int $id)
    {

        $i = 1;
        $keys = array_keys($data);
        
        $updateSql = array_map(function ($key) {
            return " $key = ?";
        }, $keys);

        $sql = "UPDATE $this->table SET" . implode(', ', $updateSql) . " WHERE id = ?";
        $prepare = $this->pdo->prepare($sql);

        
        foreach ($data as $key => $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }
        
        $prepare->bindValue($i, $id);
        $prepare->execute();
    }
}