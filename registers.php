<?php

/**
 * Registrar aqui todas as dependencias
 */

use Illuminate\Database\Capsule\Manager as DB;

// Registro para funcionar o Iluminate\Database
$capsule = new DB;

$capsule->addConnection([
    'driver' => DRIVER,
    'host' => HOST,
    'database' => DB,
    'username' => USER,
    'password' => PASS,
    'charset' => CHARSET,
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);
$capsule->setAsGlobal();

unset($capsule);
