<?php

function WriteLog($text) {
    $log_file = 'logs.txt';
    $date_format = 'Y-m-d H:i:s';
    $date = date($date_format);
    $log_text = $date . '; ' . $text . PHP_EOL;
    $file_handle = fopen($log_file, 'a');
    if ($file_handle === false) {
        echo "Impossible d'ouvrir le fichier de log.";
    } else {
        fwrite($file_handle, $log_text);

        fclose($file_handle);
    }
}

WriteLog("Mon code de debug");
?>
