<?php

namespace cva67\phpmvc\database;

use cva67\phpmvc\App;
use cva67\phpmvc\Database;
use PDO;

class TableBuilder
{
    protected $table;
    protected $columns = [];
    private PDO $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = (new Database)->getConnection();
    }

    public function id()
    {
        $this->columns[] = "id INT AUTO_INCREMENT PRIMARY KEY";
        return $this;
    }

    public function string($name)
    {
        $this->columns[] = "$name VARCHAR(255)";
        return $this;
    }

    public function integer($name)
    {
        $this->columns[] = "$name INT";
        return $this;
    }

    public function unique($name)
    {
        $this->columns[] = "UNIQUE ($name)";
        return $this;
    }

    public function timestamps()
    {
        $this->columns[] = "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        $this->columns[] = "updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        return $this;
    }

    public function build()
    {
        $columns = implode(", ", $this->columns);
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->table}` ($columns)";


        echo "Applying migrations \n";

        try {
            $this->pdo->exec($sql);
            echo "Migrations $this->table created successfully! \n";
        } catch (\PDOException $e) {
            echo "Error creating migrations table: " . $e->getMessage() . '\n';
        }
        echo "Migrations applied Succesfully \n";
    }

    public function destory()
    {

        $sql = "DROP TABLE  `{$this->table}`";
        echo "Applying migrations \n";

        try {
            $this->pdo->exec($sql);
            echo "Migrations $this->table  successfully dropped! \n";
        } catch (\PDOException $e) {
            echo "Error dropping migrations table: " . $e->getMessage() . '\n';
        }
        echo "Migrations applied Succesfully \n";
    }
}
