<?php

    if (!defined('TEMPLATE_PATH')) {
        define('TEMPLATE_PATH', 'templates');
    }

    /** Charge le template PHP */
    function template(string $file_name, array $data = array('title' => 'PHPCrud')) {
        return get_file($file_name, TEMPLATE_PATH, $data);
    }
