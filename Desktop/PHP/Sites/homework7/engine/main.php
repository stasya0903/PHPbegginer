<?php
session_start();
include __DIR__ . '/config/bd.php';
include __DIR__ . '/config/helper.php';

$page = !empty($_GET['p']) ? $_GET['p'] : 'index';
$action = !empty($_GET['a']) ? $_GET['a'] : 'index';

$dir = __DIR__ . '/page/';
if (! file_exists($dir . $page . '.php')) {
    $page = 'index';
}

include ($dir . $page . '.php');

if (!function_exists($action . 'Action')) {
    $action = 'index';
}

$action .= 'Action';
$content = $action();

$html = file_get_contents(__DIR__ . '/tmpl/main.html');
ob_start();
$content = print str_replace(['{{CONTENT}}', '{{count}}', '{{MSG}}', '{{OPTIONS}}'],
    [$content, getCountGoodsInBasket(), getMSG(), getNav()],
     $html);



