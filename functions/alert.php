<?php
    /** Permet l'apparition d'une alerte lors de l'envoi d'un formulaire */
    function getAlert(array $messages) {
        if (!empty($messages)) {
            /** Soit SUCCESS soit DANGER */
            $message_type = array_keys($messages);
            foreach($message_type as $class) {
                echo '<div class="alert alert-'.$class.'">';
                foreach($messages[$class] as $message) {
                    echo "<li> {$message} </li>";
                }
                echo '</div>';
            }
        } else {
            return;
        }
    }
