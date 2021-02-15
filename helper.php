<?php
//helpers

function asset($src)
{
    $src = BASE_URL . "/template/" . trim($src, '/ ');
    echo $src;
}

function url($url)
{
    $url = BASE_URL . "/" . trim($url, '/ ');
    return $url;
}

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}

function currentDomain()
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField()
{
    return $_SERVER['REQUEST_METHOD'];
}