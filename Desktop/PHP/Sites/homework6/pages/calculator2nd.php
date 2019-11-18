<?php 

$content = "Выберите числа и операцию";



if( (!empty($_POST["firstNum"])) && (!empty($_POST["secondNum"]))) {

	$firstNum = (int)$_POST["firstNum"];

	$secondNum = (int)$_POST["secondNum"];

	$operation = $_POST["operation"];

	$arrForOperations = [
						"+" => "summary",
						"-" => "subtraction",
						"*" => "multiply",
						"/" => "devision"
					];


		if ((int)$secondNum == 0 && $operation == "/") {

			$content = "На ноль делить нельзя";
		} else {

			$result = MathOperation($firstNum, $secondNum, $arrForOperations[$operation]);

		$content =  $firstNum . " ". $operation . " " . $secondNum .  " = " . $result;


		}

}

?>

<h1> КАЛЬКУЛЯТОР </h1>
 <form method= "POST">
 	<label>Введите первое число</label> 
 	<input type="number" name="firstNum"><br><br>
 	<label>Введите второе число</label>
 	<input type="number" name="secondNum"><br><br>
 	<label>Выберите операцию</label>
 	<input type="submit" name="operation" value = "+"> 
	<input type="submit" name="operation" value = "-">
	<input type="submit" name="operation" value = "/">
	<input type="submit" name="operation" value = "*">
 </form>

 <h1>  <?= $content ?></h1>
