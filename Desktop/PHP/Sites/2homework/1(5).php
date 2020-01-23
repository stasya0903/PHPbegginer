
<?php  

$content = date('Y');


$html = <<<php
	<!DOCTYPE html>
	<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>my HTML</title>
	</head>
	<body>
	<header class="header"></header>
	<main class="main"></main>
	<footer class="footer"><p>{$content}</p></footer>
	</body>
	</html>
php;

echo $html;

?>