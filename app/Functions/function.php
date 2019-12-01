<?php

//limit text display
function limit($value, $limit = 100, $end = '...')
{
    if (mb_strwidth($value, 'UTF-8') <= $limit) {
        return $value;
    }
    return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
}

//get last word
function get_last_words($amount, $string)
{
    $amount += 1;
    $string_array = explode(' ', $string);
    $totalwords = str_word_count($string, 1, 'àáãç3');
    if ($totalwords > $amount) {
        $words = implode(' ', array_slice($string_array, count($string_array) - $amount));
    } else {
        $words = implode(' ', array_slice($string_array, count($string_array) - $totalwords));
    }

    return $words;
}

// export notification
function notification($alert_type, $message)
{
    $notification = array(
        'alert-type' => $alert_type,
        'message' => $message
    );
    return $notification;
}


function tagColorStatus($status)
{
    switch ($status) {
        case 'Chưa xác nhận' :
            return 'text-warning-lv2';
            break;
        case 'Đã xác nhận' :
            return 'text-primary-lv2';
            break;
        case 'Xác nhận thất bại' :
            return 'text-danger-lv2';
            break;
        case 'Đang xử lý' :
            return 'text-info-lv2';
            break;
        case 'Đã hoàn thành' :
            return 'text-success-lv2';
            break;
        case 'Đã thanh toán' :
            return 'text-success-lv2';
            break;
        case 'Chưa thanh toán' :
            return 'text-warning-lv2';
            break;
    }
}


//remove image
function checkExistsAndDeleteImage($path, $file, $img_default)
{
    if (file_exists($path . $file)
        && $file != $img_default) {
        unlink($path . $file);
    }
}

function handleImageBase64($image)
{
    $image_replace = str_replace('data:image/png;base64,', '', $image);
    $image_replace = str_replace(' ', '+', $image_replace);
    $image_replace = base64_decode($image_replace);
    return $image_replace;
}

function getNameImageUnique($length)
{
    $imageName = uniqid($length) . '.' . 'png';
    return $imageName;
}
