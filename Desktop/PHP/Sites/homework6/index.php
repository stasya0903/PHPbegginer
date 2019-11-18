<?php 

include __DIR__ . '/config/bd.php';
include_once ('engine/functions.php');

include_once ('engine/pages.php');


$page = 'main';

if (!empty($_GET['page'])){

	$page = (string)$_GET["page"];
}


if (!empty($pages[$page])){
	
	$file = __DIR__. "/pages/". $pages[$page];

}

if (!file_exists($file)) {
    $file = __DIR__ . '/pages/main.php';
}




ob_start();
$content = $pages;
include $file;
$content = ob_get_clean();


?>


<ul>
    <li><a href="?page=main">Главная </a></li>
    <li><a href="?page=calculator">Калькулятор</a></li>
    <li><a href="?page=calculator2nd">Калькулятор вотрой вариант</a></li>
    <li><a href="?page=catalog">Каталог товаров</a></li>
</ul>
<?= $content ?>
