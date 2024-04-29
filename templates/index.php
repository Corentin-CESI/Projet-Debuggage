<?php

if (!session_id()) session_start();
try {
    $request_uri = get_server('request_uri');
    $query_string = get_server('query_string');

    /** Liste de toutes les routes possibles dans le sites */
    $routes = register_route(array(
        '/home',
        '/cesar',
        '/euros-dollars',
        '/convert-maths',
        '/pourcentage',
        '/decimal-hexadecimal',
        '/regle-de-trois',
        '/admin',
        /* ROUTES API */
        '/api/post',
    ));

    /** Permet de setup la page par défaut sur HOME, notamment 
     *  lorsque l'on rentre l'URL à la main 
     * */
    if($request_uri == "/") {
        $request_uri = '/home';
    }
    
    /** Permet de nettoyer la ROUTE en supprimmant les espace 
     *  et soit en enlevant le '/' si la ROUTE se termine par 
     *  ce dernier soit en n'en rajoutant un à la fin si la 
     *  ROUTE est vide 
     * */
    $requested_route = formate_route($request_uri);
    
    /** Si la ROUTE est dans la liste ROUTE alors charge le 
     *  template PHP correspondant */
    if (in_array($requested_route, $routes)) {
        template($requested_route);
    }
} 
catch (Exception $error) {
    echo $error->getMessage();
}
