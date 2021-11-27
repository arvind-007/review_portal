<?php
function pr($data)
{
    echo "<pre>";
    print_r($data);
}

function prd($data)
{
    echo "<pre>";
    print_r($data);
    die();
}
function url_base64_encode($string)
{
    $url = strtr(base64_encode($string), '+', '~');
    return $url;
}

function url_base64_decode($string)
{
    $string = strtr($string, '~', '+');
    $url = base64_decode($string);
    return $url;
}