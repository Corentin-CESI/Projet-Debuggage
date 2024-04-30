<?php
    /** Permet de transformer toutes les données dans le 
     *  fichier .ENV dans des variables d'environnement 
     *  PHP : $_ENV['...']
     * */
    require_once __DIR__ . '/../vendor/autoload.php';

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // $db = include ROOT_PATH . 'config.php';

    // define('DB_HOST', $db['host']);
    // define('DB_USER', $db['user']);
    // define('DB_PASSWORD', $db['password']);
    // define('DB_NAME', $db['name']);
    // define('DB_PORT', $db['port']);
