<?php
    /** Définit l'en-tête Content-Type de la réponse HTTP 
     *  comme application/json 
     *  Pas compris 
     * */
    header('Content-Type: application/json');
    http_response_code(200); // reponse qui dit 'ok'

    /** Vérifie que la méthode est POST */
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit;
    }

    /** Récupère les données envoyées via la méthode POST.
     *  'php://input' semble être l'entrée standard de PHP
     *  pour la récupération de donnée
     */
    $json = file_get_contents('php://input');

    /** Converti en objet PHP sous la forme :
     *  (
     *      [form] => '...'
     *      [percent] => '...'
     *      [result] => '...'
     *      [of] => '...'
     *  )
     *  Ce qui entre crochet sont les propriétés
     */
    $body = json_decode($json); // 
    $result = null;

    /** Gestion des erreurs */
    if($body === null){
        $data = [
            'response' => 'error',
            'message' => 'No data sent'
        ];
        echo json_encode($data);
        exit;
    }
    // Vérifie l'existance de la propriété FORM dans l'objet BODY
    if(!isset($body->form)){
        $data = [
            'response' => 'error',
            'message' => 'No form name'
        ];
        echo json_encode($data);
        exit;
    }
    /** ------------------- */

    /** Regarde le contenu de la propriété FORM dans l'objet BODY */
    switch ($body->form){
        case 'percent':
            $percent = null;
            $of = null;

            /** Récupère le contenu des propriétés PERCENT -- RESULT -- OF */
            if(isset($body->percent)){
                $percent = $body->percent;
            }
            if(isset($body->result)){
                $result = $body->result;
            }
            if(isset($body->of)){
                $of = $body->of;
            }

            $result = getPercent($percent, $of, $result);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'regle-de-trois':
            /** Récupère le contenu des propriétés A -- B -- C */
            $a = $body->a;
            $b = $body->b;
            $c = $body->c;

            $result = ruleOfThird($a, $b, $c);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'cesar':
            $reverse = false;
            $text = '';

            /** Condition équivalente à : isset($body->result), 
             *  petite différence tout de même ISSET vérifie si 
             *  ca EXISTE et n'est pas NULL alors que PROPERTY 
             *  vérifie seulement si ca EXISTE. 
             * */
            if(property_exists($body, 'result')) {
                $reverse = true;
                $text = $body->result;
            } else {
                $text = $body->clear;
            }
            $key = $body->key;

            /** Si REVERSE est TRUE, CHIFFRE le texte
             *  Si REVERSE est FALSE, DECHIFFRE le texte
             */
            $result = cesar($text, $key, $reverse);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'euros-dollars':
            if(property_exists($body, 'fromCurrency')){
                $fromCurrency = $body->fromCurrency;
            }
            if(property_exists($body, 'fromCurrencySelect')){
                $fromCurrencySelect = $body->fromCurrencySelect;
            }
            if(property_exists($body, 'toCurrencySelect')){
                $toCurrencySelect = $body->toCurrencySelect;
            }

            $result = convertCurrency($fromCurrency, $fromCurrencySelect, $toCurrencySelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;
            
        case 'decimal-hexadecimal':
            if(property_exists($body, 'decimal')){
                $decimal = $body->decimal;
            }

            $hex = convertToHexadecimal($decimal);
            $bin = convertToBinary($decimal);

            $result = [$hex, $bin];

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;
    }

    /** Envoi des données dans la BDD */
    logSubmitToDatabase($body, $result);

    exit;

