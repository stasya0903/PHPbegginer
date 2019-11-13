<?php 

$content = "Выберите число и операцию";

if(!empty($_POST)) {

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
 	<input type="number" name="firstNum"><br>
 	<label>Введите второе число</label>
 	<input type="number" name="secondNum"><br>
 	<label>Выберите операцию</label>
 	<select name= "operation">
 	<option  value = "+">Сложение</option>
 	<option  value = "-">Вычитание</option>
 	<option  value = "*">Умножение</option>
 	<option  value = "/">Деление</option>
 	</select> <br>
	<input type="submit">
 </form>

 <h1>  <?= $content ?></h1>
