<?php

namespace MyApp\database;

use cva67\phpmvc\Database;
use PDO;
use PDOException;

class DbModel
{

    protected string $table;
    protected array $data;
    private PDO $pdo;

    public function __construct()
    {

        $this->pdo = (new Database)->getConnection();
    }

    public function save()
    {

        $columns = implode(', ', array_keys($this->data));
        $placeholders = ':' . implode(', :', array_keys($this->data));

        try {
            $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})");

            foreach ($this->data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }

            if ($stmt->execute()) {
                return "Data inserted successfully!";
            } else {
                return "Error inserting data.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function delete(): bool
    {



        return true;
    }
    public function find(int $id): mixed
    {

        try {

            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :value");
            $stmt->bindParam(':value', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function findOne(array $data): mixed
    {
        $conditions = [];
        foreach ($data as $column => $value) {
            $conditions[] = "{$column} = :{$column}";
        }
        $whereClause = implode(' AND ', $conditions);

        try {

            $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE  {$whereClause} limit 1");
            foreach ($data as $column => $value) {
                $stmt->bindParam(":{$column}", $data[$column]);
            }
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function findAll(): array
    {


        return [];
    }
}
