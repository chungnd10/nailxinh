<?php

//limit text display
function limit($value, $limit = 100, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }

    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
}

//get last word
function get_last_words($amount, $string)
{
    $amount+=1;
    $string_array = explode(' ', $string);
    $totalwords= str_word_count($string, 1, 'àáãç3');
    if($totalwords > $amount){
        $words= implode(' ',array_slice($string_array, count($string_array) - $amount));
    }else{
        $words= implode(' ',array_slice($string_array, count($string_array) - $totalwords));
    }

    return $words;
}

function notification($alert_type, $message)
{
    $notification = array(
        'alert-type' => $alert_type,
        'message' => $message
    );

    return $notification;
}
