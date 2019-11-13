<?php 

define('DIR_IMG', './img');

$sqlForPic = mysqli_connect("localhost", "root", "root", "myfirst");

$forImg = mysqli_query($sqlForPic, "SELECT * FROM `forImg` ORDER BY `Num_watched` DESC ");


$galleryTemplate = " ";

while ($picture = mysqli_fetch_assoc($forImg)) {

	$galleryTemplate .=  
	
	'<div class="picture">'.
		"<a href=".  "/5homework/singlePage.php/". '?id=' . $picture['id_img'] . '>'.
			'<img  class="smallImg" src="'. DIR_IMG . "/" .$picture["dir_img"]. '">'.
		"</a>".
	"</div>" ;# code...
};


$html = file_get_contents("page.html");

echo str_replace('{{pictures}}', $galleryTemplate, $html);


mysqli_close($sqlForPic)



//http://localhost/5homework/singlePage.php


?>