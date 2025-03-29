<?php

namespace MyApp\database;

class Schema
{

    public static function create(string $table, callable $callback)
    {
        $tableBuilder = new TableBuilder($table);
        $callback($tableBuilder);
        $tableBuilder->build();
    }

    public static function dropIfExists(string $table)
    {
        $tableBuilder = new TableBuilder($table);
        $tableBuilder->destory();
    }
}
