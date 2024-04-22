<?php
// $db = include ROOT_PATH . 'config.php';
// // Pourquoi pas utiliser un .ENV ?
// define('DB_HOST', $db['host']);
// define('DB_USER', $db['user']);
// define('DB_PASSWORD', $db['password']);
// define('DB_NAME', $db['name']);
// define('DB_PORT', $db['port']);


// namespace App\Controller;

// class DotEnvEnvironmentTest {
//    public function load($path): void {
//        $lines = file($path . '/.env');
//        foreach ($lines as $line) {
//            [$key, $value] = explode('=', $line, 2);
//            $key = trim($key);
//            $value = trim($value);

//            putenv(sprintf('%s=%s', $key, $value));
//            $_ENV[$key] = $value;
//            $_SERVER[$key] = $value;
//         }   
//     }
// }

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
