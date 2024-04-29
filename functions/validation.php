<?php

    /** Nettoie les données en fonction du type */
    function sanitize($item, $type) {
        switch($type) {
            case 'string':
                $item = filter_var($item, FILTER_UNSAFE_RAW);
                break;
            case 'email':
                $item = filter_var($item, FILTER_SANITIZE_EMAIL);
                break;
            case 'int':
                $item = filter_var($item, FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'url':
                $item = filter_var($item, FILTER_SANITIZE_URL);
                break;
        }

        return $item;
    }

    /** Valide les données en fonction d'une règle spécifiée. Permet 
     *  notamment de vérifier si tous les input du formulaire de 
     *  contact ont été entrés 
     * */
    function validate(array $items, array $rule_items) {
        $result = array();
        foreach($rule_items as $item_key => $item_value) {
            
            if (array_key_exists($item_key, $items)) {
                $form_items[$item_key] = trim($items[$item_key]);
                $form_label = $item_value['label'];

                foreach($item_value as $rule_key => $rule_value) {
                    switch($rule_key) {
                        case 'required':
                            if ($rule_value === TRUE && empty($form_items[$item_key])) {
                                $result['danger'][] = $form_label . ' is required!';
                            }
                            break;
                        case 'sanitize':
                            if (!sanitize($form_items[$item_key], $rule_value)) {
                                $result['danger'][] = $form_label . ' is not valid!';
                            }
                            break;
                        case 'min':
                            if (strlen($form_items[$item_key]) < $rule_value) {
                                $result['danger'][] = $form_label . ' is min. '.$rule_value.' characters!';
                            }
                            break;
                        case 'max':
                            if (strlen($form_items[$item_key]) > $rule_value) {
                                $result['danger'][] = $form_label . ' is max. '.$rule_value.' characters!';
                            }
                            break;
                        case 'regexp':
                            if (!preg_match($rule_value, $form_items[$item_key])) {
                                $result['danger'][] = $form_label . ' pattern does not match';
                            }
                            break;
                        case 'matches':
                            if ($form_items[$item_key] !== $form_items[$rule_value]) {
                                $result['danger'][] = $form_label . ' does not match';
                            }
                            break;
                    }

                    $result['item'] = $form_items;
                }
            }
        }
        return $result;
    }

    /** Vérifie si la VALIDATION est un succès en regardant si AUCUN 
     *  clé dans ITEM correspond à DANGER 
     * */
    function is_passed(array $items) {
        return !array_key_exists('danger', $items);
    }

    /** Permet de faire des actions supplémentaire après validation 
     *  des donnnées, comme HASH un mot de passe ou la SUPPRESSION 
     *  d'élément 
     * */
    function check_validation(array $validated_items, array $after_validation = null) {
        if (is_passed($validated_items)) {

            $after_validated_items = $validated_items['item'];
            if ($after_validation !== null) {
                foreach($after_validation as $action_key => $action_value) {
                    switch($action_key) {
                        case 'hash':
                            $argument = explode(':', $action_value);
                            $after_validated_items[$argument[0]] = password_hash($after_validated_items[$argument[0]], constant($argument[1]));
                            break;
                        case 'remove':
                            unset($after_validated_items[$action_value]);
                            break;
                    }
                }
            }
            return $after_validated_items;
        } else {
            $result['danger'] = $validated_items['danger'];
            return $result;
        }
    }
