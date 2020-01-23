<?php

function connect()
{
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'root', 'root', 'onlineShop');
    }
    return $link;
}

function clearStr($str)
{
    $str = trim($str);
    $str = strip_tags($str);
    return mysqli_real_escape_string(connect(), $str);
}

