<?php

use Dotenv\Dotenv;
use MyApp\config\config;
use cva67\phpmvc\Database;
use cva67\phpmvc\Migration;

define('BASE_PATH', realpath(__DIR__ . '/'));

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();
config::load(BASE_PATH . '/config');



$database = new Database();
$migration = new Migration($database);

$migration->applyMigration();
