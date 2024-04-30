<?php
    /** Si l'on met des valeurs aux paramètres permet de leur donner 
     *  une valeur par défaut si leur valeur n'est pas entré lors de 
     *  l'appel de la fonction
     * */

    /** Pour cette partie, il y a 3 inputs dont 2 qui DOIVENT être 
     *  rempli par l'utilisateur. En sachant qu'il y a 3 possibilités 
     *  de calcul, il suffit de regarder quel est la varible qui est 
     *  vide, donc non rempli par l'utilisateur pour exécuter la 
     *  bonne formule 
     * */
    function getPercent($percent = null, $of = null , $result = null){
        if($result === null){
            $result = $percent * $of / 100;

            return [
                'result' => $result,
            ];
        }
        if($percent === null){
            $percent = $of / $result * 100;

            return [
                'percent' => $percent,
            ];
        }
        if($of === null){
            $of = $result * 100 / $percent;

            return [
                'of' => $of,
            ];
        }
    }

    /** Simple produit en croix */
    function ruleOfThird($a = 1, $b = 1, $c = 1): array {
        return [
            'd' => ($b * $c)  / $a,
        ];
    }

    /** Ici c'est la variable REVERSE qui permet de faire la différence 
     *  entre CHIFFRER (true) et DECHIFFRER (false)
     * */
    function cesar($clear, $key, $reverse = false){
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $alphabet = str_split($alphabet);
        $clear = str_split($clear);
        $result = '';

        foreach ($clear as $letter){
            $index = array_search($letter, $alphabet);
            $index = $reverse ? $index - $key : $index + $key;
            while ($index > 25) {
                $index = $index - 26;
            }
            while ($index < 0) {
                $index = $index + 26;
            }
            $result .= $alphabet[$index];
        }

        if($reverse){
            return [
                'clear' => $result,
            ];
        } else {
            return [
                'result' => $result,
            ];
        }
    }

    /** Si l'utilisateur a entré une valeur dans l'input EUR alors USD 
     *  sera nulle et inversement. 
     * */
    function convertEuroDollars($euro = null, $dollars = null){
        $currency = $euro === null ? 'USD' : 'EUR';
        $reverseCurrency = $currency === 'EUR' ? 'USD' : 'EUR';

        /** Récupère toutes les possibilités de conversion dans la devise choisie */
        $url = 'https://open.er-api.com/v6/latest/' . $currency;

        $data = file_get_contents($url);
        $data = json_decode($data, true);
        /** Récupère le ratio de conversion */
        $rate = $data['rates'][$reverseCurrency];

        if($euro === null){
            $euro = $dollars * $rate;
            return [
                'EUR' => $euro,
            ];
        }
        if($dollars === null){
            $dollars = $euro * $rate;
            return [
                'USD' => $dollars,
            ];
        }
    }

    /** Permet la conversion entre différente devise monétaire */
    function convertCurrency($fromCurrency, $fromCurrencySelect, $toCurrencySelect){
        /** Récupère toutes les possibilités de conversion dans la devise choisie */
        $url = 'https://open.er-api.com/v6/latest/' . $fromCurrencySelect;

        $data = file_get_contents($url);
        $data = json_decode($data, true);
        /** Récupère le ratio de conversion */
        $rate = $data['rates'][$toCurrencySelect];

        $toCurrency = $fromCurrency * $rate;

        return [
            'toCurrency' => $toCurrency,
        ];
    }

    /** Conversion du DECIMAL vers le BINAIRE */
    function convertToBinary($decimal){
        $binary = decbin($decimal);
        return [
            'binary' => $binary,
        ];
    }

    /** Conversion du DECIMAL vers l'HEXADECIMAL */
    function convertToHexadecimal($decimal){
        $hexadecimal = dechex($decimal);
        return [
            'hex' => $hexadecimal,
        ];
    }

    // Conversion des millilitres en litres
    function convertLitre($L = null, $mL = null){
        if ($L === null) {
            $L = $mL * 1000;
            return [
                'L' => $L,
            ];
        }
        if ($mL === null) {
            $mL = $L / 1000;
            return [
                'mL' => $mL,
            ];
        }
    }

    /** Conversion des LONGUEURS */
    function convertLength($fromLength, $fromLengthSelect, $toLengthSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/length.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromLengthSelect]['convert'][$toLengthSelect]['ratio'];

        $toLength = $fromLength * $ratio;

        return [
            'toLength' => $toLength,
        ];
    }

    /** Conversion des ANGLES */
    function convertAngle($fromAngle, $fromAngleSelect, $toAngleSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/angle.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromAngleSelect]['convert'][$toAngleSelect]['ratio'];

        $toAngle = $fromAngle * $ratio;

        return [
            'toAngle' => $toAngle,
        ];
    }

    /** Conversion des AIRES */
    function convertArea($fromArea, $fromAreaSelect, $toAreaSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/area.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromAreaSelect]['convert'][$toAreaSelect]['ratio'];

        $toArea = $fromArea * $ratio;

        return [
            'toArea' => $toArea,
        ];      
    }

    /** Conversion des MASSES */
    function convertMass($fromMass, $fromMassSelect, $toMassSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/mass.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromMassSelect]['convert'][$toMassSelect]['ratio'];

        $toMass = $fromMass * $ratio;

        return [
            'toMass' => $toMass,
        ];        
    }

    /** Conversion des VITESSES */
    function convertSpeed($fromSpeed, $fromSpeedSelect, $toSpeedSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/speed.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromSpeedSelect]['convert'][$toSpeedSelect]['ratio'];

        $toSpeed = $fromSpeed * $ratio;

        return [
            'toSpeed' => $toSpeed,
        ];        
    }

    /** Conversion des TEMPERATURES */
    function convertTemperature($fromTemperature, $fromTemperatureSelect, $toTemperatureSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/temperature.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromTemperatureSelect]['convert'][$toTemperatureSelect]['ratio'];

        $toTemperature = $fromTemperature * $ratio;

        return [
            'toTemperature' => $toTemperature,
        ];        
    }

    /** Conversion des TEMPS */
    function convertTime($fromTime, $fromTimeSelect, $toTimeSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/time.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromTimeSelect]['convert'][$toTimeSelect]['ratio'];

        $toTime = $fromTime * $ratio;

        return [
            'toTime' => $toTime,
        ];        
    }

    /** Conversion des VOLUMES */
    function convertVolume($fromVolume, $fromVolumeSelect, $toVolumeSelect){
        /** Récupère toutes les possibilités de conversion */
        $url = './json/volume.json';

        $data = file_get_contents($url);
        $data = json_decode($data, true);

        /** Récupère le ratio de conversion */
        $ratio = $data[$fromVolumeSelect]['convert'][$toVolumeSelect]['ratio'];

        $toVolume = $fromVolume * $ratio;

        return [
            'toVolume' => $toVolume,
        ];        
    }
