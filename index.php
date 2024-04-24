<?php
    if (!defined('ROOT_PATH')) {
        define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }

    /** Charge le fichier UNE SEULE FOIS */
    require_once ROOT_PATH . 'app.php';

    template('index');
