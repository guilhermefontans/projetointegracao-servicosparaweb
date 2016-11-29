<?php
/**
 * Variaveis e contantes de configuração aqui
 */
date_default_timezone_set('America/Sao_Paulo');

define('DEBUG', true);
define('DS', DIRECTORY_SEPARATOR);
define('APP_ROOT', realpath(__DIR__ . DS . '..'));
define('HOST', 'localhost');
define('DRIVER', 'mysql');
define('DB', 'EVENTOQI');
define('USER', 'root');
define('PASS', 'root');
define('PORT', 3306);
define('CHARSET', 'UTF8');
define('DSN', DRIVER . ':host='. HOST.';port='.PORT.';dbname='.DB.';charset='.CHARSET);
