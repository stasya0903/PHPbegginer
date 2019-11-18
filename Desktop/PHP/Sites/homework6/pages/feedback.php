<?php 

echo $_GET["id"];


if (!empty($_GET) && !empty($_POST)) {

	$date = date("j F Y ");

	$sqlToAddFeedback = " INSERT INTO `feedback` ( `User_name`, `feedback`, `timestamp`, `id_product`) 
											VALUES ( '{$_POST["UserName"]}', '{$_POST["feedBack"]}', '{$date}', '{$_GET["id"]}')";


	mysqli_query($link, $sqlToAddFeedback );
	header('location:?page=product&&id=' .$_GET["id"] ."'") ;


}



 ?>

 <link rel="stylesheet" type="text/css" href="style.css">

 <div class = "container">
	<form method="post">
		<label>Ваше Имя</label><br><br>
		<input c type="text" name="UserName"><br><br>
		<label>Оставьте ваш отзыв</label><br><br>
		<textarea name= "feedBack" rows = "10" cols="50"></textarea><br><br>
		<input type="submit" name="submit" class = "comeBackBtn">
	</form>

  </div>