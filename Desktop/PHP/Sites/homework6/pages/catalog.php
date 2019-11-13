<?php 


include_once ("config/bd.php");


$forGood = mysqli_query($link, "SELECT * FROM `goods`");


$galleryTemplate = " ";

while ($product = mysqli_fetch_assoc($forGood)) {

	$galleryTemplate .=  
	
	'<div class="picture">'.
		"<a href=".  '/homework6/?page=product&&id=' . $product['id_product'] . '>'.
			'<img  class="smallImg" src="'. DIR_IMG . "/" . "image" . $product["id_product"]. ".jpeg" .  '">'.
		"</a>".

		'<h3>' . $product["name_product"] .'</h3>'.
		'<h3>' . $product["price_product"] .'</h3>'.
 
	"</div>" ;# code...
};


$html = file_get_contents("galleryView.html");

echo str_replace('{{pictures}}', $galleryTemplate, $html);





 ?>

