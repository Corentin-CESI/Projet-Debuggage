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

        case 'LtomL':

            $mL = null;
            $L = null;
        
            if (property_exists($body, 'mL')) {
                $mL = $body->mL;
            }
        
            if (property_exists($body, 'L')) {
                $L = $body->L;
            }
        
            $result = convertLitre($L, $mL);
        
            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
        
            echo json_encode($data);
        
            break;
            
        case 'length':
            if(property_exists($body, 'fromLength')){
                $fromLength = $body->fromLength;
            }
            if(property_exists($body, 'fromLengthSelect')){
                $fromLengthSelect = $body->fromLengthSelect;
            }
            if(property_exists($body, 'toLengthSelect')){
                $toLengthSelect = $body->toLengthSelect;
            }

            $result = convertLength($fromLength, $fromLengthSelect, $toLengthSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'angle':
            if(property_exists($body, 'fromAngle')){
                $fromAngle = $body->fromAngle;
            }
            if(property_exists($body, 'fromAngleSelect')){
                $fromAngleSelect = $body->fromAngleSelect;
            }
            if(property_exists($body, 'toAngleSelect')){
                $toAngleSelect = $body->toAngleSelect;
            }

            $result = convertAngle($fromAngle, $fromAngleSelect, $toAngleSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'area':
            if(property_exists($body, 'fromArea')){
                $fromArea = $body->fromArea;
            }
            if(property_exists($body, 'fromAreaSelect')){
                $fromAreaSelect = $body->fromAreaSelect;
            }
            if(property_exists($body, 'toAreaSelect')){
                $toAreaSelect = $body->toAreaSelect;
            }

            $result = convertArea($fromArea, $fromAreaSelect, $toAreaSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'mass':
            if(property_exists($body, 'fromMass')){
                $fromMass = $body->fromMass;
            }
            if(property_exists($body, 'fromMassSelect')){
                $fromMassSelect = $body->fromMassSelect;
            }
            if(property_exists($body, 'toMassSelect')){
                $toMassSelect = $body->toMassSelect;
            }

            $result = convertMass($fromMass, $fromMassSelect, $toMassSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'speed':
            if(property_exists($body, 'fromSpeed')){
                $fromSpeed = $body->fromSpeed;
            }
            if(property_exists($body, 'fromSpeedSelect')){
                $fromSpeedSelect = $body->fromSpeedSelect;
            }
            if(property_exists($body, 'toSpeedSelect')){
                $toSpeedSelect = $body->toSpeedSelect;
            }

            $result = convertSpeed($fromSpeed, $fromSpeedSelect, $toSpeedSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'temperature':
            if(property_exists($body, 'fromTemperature')){
                $fromTemperature = $body->fromTemperature;
            }
            if(property_exists($body, 'fromTemperatureSelect')){
                $fromTemperatureSelect = $body->fromTemperatureSelect;
            }
            if(property_exists($body, 'toTemperatureSelect')){
                $toTemperatureSelect = $body->toTemperatureSelect;
            }

            $result = convertTemperature($fromTemperature, $fromTemperatureSelect, $toTemperatureSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'time':
            if(property_exists($body, 'fromTime')){
                $fromTime = $body->fromTime;
            }
            if(property_exists($body, 'fromTimeSelect')){
                $fromTimeSelect = $body->fromTimeSelect;
            }
            if(property_exists($body, 'toTimeSelect')){
                $toTimeSelect = $body->toTimeSelect;
            }

            $result = convertTime($fromTime, $fromTimeSelect, $toTimeSelect);

            $data = [
                'response' => 'success',
                'message' => 'Calcul réussi',
                'data' => $result
            ];
            echo json_encode($data);
            break;

        case 'volume':
            if(property_exists($body, 'fromVolume')){
                $fromVolume = $body->fromVolume;
            }
            if(property_exists($body, 'fromVolumeSelect')){
                $fromVolumeSelect = $body->fromVolumeSelect;
            }
            if(property_exists($body, 'toVolumeSelect')){
                $toVolumeSelect = $body->toVolumeSelect;
            }

            $result = convertVolume($fromVolume, $fromVolumeSelect, $toVolumeSelect);

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

