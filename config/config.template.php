<?php
    setlocale(LC_CTYPE, 'es_ES.utf8');
    date_default_timezone_set('America/Mexico_City');

    define('DEBUG', false);
    define('ENVIROMENT', 'DEV');
    define('ROUTING_ENABLED', true);

    define('URL_PROTOCOL', 'http://');
    define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
    switch (ENVIROMENT) {
        case 'LOCAL':
            define('URL_SUB_FOLDER', dirname($_SERVER['SCRIPT_NAME']));
            define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER . DIRECTORY_SEPARATOR);
            break;

        case 'DEV':
            define('URL_SUB_FOLDER', dirname($_SERVER['SCRIPT_NAME']));
            define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
            break;

        case 'PROD':
            define('URL_SUB_FOLDER', str_replace('/', '', dirname($_SERVER['SCRIPT_NAME'])));
            define('URL', URL_PROTOCOL . URL_DOMAIN . DIRECTORY_SEPARATOR . URL_SUB_FOLDER);
            break;
    }

    define('DATABASE_ENABLED', true);
    define('MULTIPLE_DATABASES', false);

    if(DATABASE_ENABLED){
        $connections = [];
        switch (ENVIROMENT) {
            case 'LOCAL':
            case 'DEV':
                $connections[] = [
                    'name' => 'default',
                    'type' => 'mysql',
                    'host' => 'localhost',
                    'user' => 'user',
                    'password' => 'toor',
                    'db' => 'db_cracknd',
                    'prefix' => null,
                    'dsn' => null
                ];
                break;

            case 'PROD':
                $connections[] = [
                    'name' => 'default',
                    'type' => 'mysql',
                    'host' => 'localhost',
                    'user' => 'user',
                    'password' => 'toor',
                    'db' => 'db_cracknd',
                    'prefix' => null,
                    'dsn' => null
                ];
                break;

            default:
                $connections[] = [
                    'name' => 'default',
                    'type' => 'mysql',
                    'host' => 'localhost',
                    'user' => 'user',
                    'password' => 'toor',
                    'db' => 'db_cracknd',
                    'prefix' => null,
                    'dsn' => null
                ];
                break;
        }
    }

    if(DEBUG){
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }