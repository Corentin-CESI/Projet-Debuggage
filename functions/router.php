<?php

    define('BASE_URL', $_SERVER['HTTP_HOST']);

    /** Permet d'avoir une URL qui fonction par rapport à la construction 
     *  du dossier. Donc si ce dernier est renommé ou juste différent d'une 
     *  machine à l'autre le programme ne plantera pas et fonctionnera 
     *  normalement 
     * */
    function home_url() {
        $protocol = '';
        if (isset($_SERVER['HTTPS']) &&
            ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
            $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
            $protocol = 'https';
        }
        else {
            $protocol = 'http';
        }
        return $protocol . '://' . BASE_URL;
    }

    /** Permet de vérifié si la variable SERVER qui contient l'URL courant 
     *  correspond à une URL sélectionnée. Cette fonction est utilisée dans 
     *  le HEADER.PHP et permet l'ACTIVATION de l'item de la SIDEBAR 
     *  correspondant au template CHARGE 
     * */
    function is_current_url($url = "/") {
        return $_SERVER['REQUEST_URI'] == $url;
    }

    /** Récupère la valeur de la variable de SERVER correspondant à la clé 
     *  fourni si cette dernière existe 
     * */
    function get_server($key) {
        /** STRTOUPPER convertie en majuscules une chaine de caractères  */
        if (!empty($_SERVER[strtoupper($key)])) {
            $server = $_SERVER[strtoupper($key)];
        } else {
            $server = '';
        }

        return $server;
    }

    /** Met sous forme de tableau toutes les routes poosibles du site */
    function register_route(array $routes) {
        $route_maps = array();
        foreach ($routes as $route) {
            $route_maps[] = formate_route($route);
        }

        return $route_maps;
    }

    /** Nettoie la ROUTE en soit ENLEVANT le slash et les espaces soit SI VIDE met un slash */
    function formate_route(string $route) {
        $route = remove_slash($route);
        if ($route == '') {
            $route = '/';
        }

        return $route;
    }

    /** Supprime les SLASH et les ESPACES */
    function remove_slash($string, $positions = 'rl') {
        switch ($positions) {
            case 'r':
                $trimed_string = rtrim($string, '/');
                break;
            case 'l':
                $trimed_string = ltrim($string, '/');
                break;
            case 'rl':
                $trimed_string = rtrim(ltrim($string, '/'), '/');
                break;
        }

        return $trimed_string;
    }
