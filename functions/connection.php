<?php
    /** Permet de transformer toutes les données dans le 
     *  fichier .ENV dans des variables d'environnement 
     *  PHP : $_ENV['...']
     * */
    require_once __DIR__ . '/../vendor/autoload.php';

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
