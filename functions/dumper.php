<?php

function dumper($var,$dumper = 'dump') {
    if($dumper === 'print') {
        echo '<prej>';
        print_r($var);
        echo '</pre>';
    } else {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
