<?php

namespace App\Models;

abstract class Model
{
    public function __connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $connection = null;

        try {
            $this->connection = new \PDO("mysql:host=$servername;dbname=database", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function __close()
    {
        $this->connection = null;
    }

    public function get(string $table, ?string $fields = '*', ?string $conditions = '')
    {
        $conn = $this->__connect();

        try {
            $stmt = $conn->prepare("SELECT $fields FROM $table $conditions");
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);

            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }

        $this->__close();
    }

    public function insert(string $table, string $columns, string $values)
    {
        $conn = $this->__connect();
        $date = date('Y-m-d H:i:s');

        try {
            $sql = "INSERT INTO $table ($columns, created_at, created_by) values ($values, '$date', '1')";
            $conn->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }

        $this->__close();
    }

}
