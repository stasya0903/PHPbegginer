<?php 



define('DIR_IMG', 'img/');

$sqlForPic = mysqli_connect("localhost", "root", "root", "myfirst");

$sqlForChoosenPic = "SELECT * FROM `forImg` WHERE `forImg`.`id_img` = " . '"' .$_GET["id"] . '"';



$forImg = mysqli_query($sqlForPic, $sqlForChoosenPic ) ;

$imgInfo = mysqli_fetch_assoc($forImg);

$dirToCurrentPic = $imgInfo["dir_img"];

$numWatched = $imgInfo["Num_watched"];


$singlePic = 
				'<div class="singlePic">'.
				'<h1> Количество просмотров = '. $numWatched . '</h1>'.
				'<img src="'. '../'. DIR_IMG .  $dirToCurrentPic. ' ">
				<a href="/5homework"><button class= "comeBackBtn">
				comeback</button></a>' .
				 
			'</div>';



$sqlToUpdateNumWatched = "UPDATE `forImg` SET `Num_watched` = ". '"' .++$numWatched . '"' . " WHERE `forImg`.`id_img` = ".$_GET["id"];

mysqli_query($sqlForPic, $sqlToUpdateNumWatched );

$html = file_get_contents("page.html");

echo   '<link rel="stylesheet" type="text/css" href="../style.css">';

echo str_replace('{{pictures}}', $singlePic , $html);

mysqli_close($sqlForPic);


 ?>