<?php

namespace cva67\phpmvc\database;

abstract class AbstractMigration
{
    abstract public function up();
    abstract public function down();
}
