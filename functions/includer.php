<?php

/** Vérifie l'existence d'un fichier PHP */
function has_file(string $file_name, string $directory = null) {
    if (!empty($directory)) {
        $directory = ltrim(rtrim($directory, '/'), '/');
        $directory .= '/';
    }

    $file = ROOT_PATH . $directory . $file_name . '.php';

    return file_exists($file) ? $file : false;
}

/** Charge le fichier PHP après avoir vérifié s'il existait */
/** $data NON UTILISER MAIS utile pour avoir le TITRE de l'onglet
 *  pas compris pourquoi
 **/
function get_file(string $file_name, string $directory = null, array $data = array()) {
    $file = has_file($file_name, $directory);
    return !empty($file) ? include_once $file : printf("Fichier [<b> %s </b>] introuvable", $file_name);
}
