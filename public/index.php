<?php

use Dotenv\Dotenv;
use cva67\phpmvc\App;

define('BASE_PATH', realpath(__DIR__ . '/..'));

require __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->safeLoad();

$app = new App();

$app->run();
