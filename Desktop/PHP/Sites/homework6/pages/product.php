<?php 


$sqlForChoosenProduct = "SELECT * FROM `goods` WHERE `goods`.`id_product` = " . '"' .$_GET["id"] . '"';

$forPicture = mysqli_query($link, $sqlForChoosenProduct ) ;

$productInfo = mysqli_fetch_assoc($forPicture);

$sqlForfeedbacks = $sqlForChoosenProduct = "SELECT * FROM `feedback` WHERE `feedback`.`id_product` = " . '"' .$_GET["id"] . '"';

$forComments = mysqli_query($link, $sqlForfeedbacks );

$feedbacks = " ";

while ($feedback = mysqli_fetch_assoc($forComments)) {

	$feedbacks .= 

	'<div class="feedback">'.
		'<h3>' . $feedback["User_name"] .'</h3>'.
		'<h3>' . $feedback["feedback"] .'</h3>'.
		'<h3>' . $feedback["timestamp"] .'</h3>'.
 
	"</div>" ;# code...
}








$dirToPicImg =  "image" . $productInfo["id_product"] . ".jpeg";



$singlePic = 
				'<div class="singlePic">'.
				'<img src="'. DIR_IMG .  $dirToPicImg . ' ">
				<a href="?page=catalog"><button class= "comeBackBtn">
				comeback</button></a>' .
				'<div class="productDescription"> '.
				'<h3>' . $productInfo["name_product"] .'</h3>'.
				'<h3>' . $productInfo["price_product"] .'</h3>'.
				'<h3>' . $productInfo["description_short"] .'</h3>'.
				'</div>'.
				'<a href="?page=feedback&&id=' . $productInfo["id_product"] .
				'"><button class = "comeBackBtn"> Оставить Отзыв о продукте</button></a>'.
				$feedbacks .

				 
			'</div>'  ;



$html = file_get_contents("galleryView.html");

echo   '<link rel="stylesheet" type="text/css" href="../../style.css">';

echo str_replace('{{pictures}}', $singlePic , $html);


 ?>

 <a href="../pages/feedback.php"><button> Оставить Отзыв о продукте</button></a>

