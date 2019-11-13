
<?php 

function GetPages (){


 $directoryForPages = scandir(dirname(__DIR__). "/pages");

 $pages = [];

foreach ($directoryForPages as  $value) {
	
	if (strlen($value) <= 2 && is_dir($value)){
		continue;
	}

	$fileName = trim(preg_replace("/.php/i", "", $value));

	$pages[$fileName] =   $value ;
	
	};

	return $pages;
}


function multiply($num1, $num2){
	return $num1 * $num2;
};

function summary($num1, $num2){
	return $num1 + $num2;
};

function devision($num1, $num2){
	return $num1 / $num2;
};

function subtraction($num1, $num2){
	return $num1 - $num2;
};

function MathOperation($num1, $num2, $operation){

	return $operation($num1, $num2);
};

 ?>