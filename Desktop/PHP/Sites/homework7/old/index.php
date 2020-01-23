<?php
include __DIR__ . '/config/bd.php';
include_once ('engine/functions.php');

$pages = include_once ('engine/pages.php');

$page = '1';
if (!empty($_GET['page'])) {
    $page = (int)$_GET['page'];
}

$file = 'main';

if (!empty($pages[$page])) {
    $file = $pages[$page];
}

$file = __DIR__ . '/page/' . $file . '.php';
if (!file_exists($file)) {
    $file = __DIR__ . '/page/main.php';
}

ob_start();
include $file;
$content = ob_get_clean();
?>

<ul>
    <li><a href="?page=1">Главная </a></li>
    <li><a href="?page=2">Пользователь</a></li>
    <li><a href="?page=3">Пользователи</a></li>
</ul>
<?= $content ?>

