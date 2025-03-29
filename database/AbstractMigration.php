<?php

namespace MyApp\database;

abstract class AbstractMigration
{
    abstract public function up();
    abstract public function down();
}
