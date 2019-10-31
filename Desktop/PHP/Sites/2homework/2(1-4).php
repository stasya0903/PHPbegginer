<?php
    $a = rand(-100,100);
    $b = rand(-100,100);

    

if($a >= 0 and $b >=0 ){

	echo $a. " - ".$b. " = " .($a - $b);

} else if (($a < 0 and $b >= 0) or ($a >= 0 and $b < 0)){

	echo $a. " + ".$b. " = " .($a + $b);

} else {

	echo $a. " * ".$b. " = " .($a * $b);

	}

$a = rand(0, 15);

switch ($a) {
	case '0':
		echo 0," ";
	case '1':
		echo 1, " ";
	case '2':
		echo 2, " ";	
	case '3':
		echo 3, " ";
	case '4':
		echo 4, " ";
	case '5':
		echo 5, " ";
	case '6':
		echo 6, " ";
	case '7':
		echo 7," ";
	case '8':
		echo 8, " ";
	case '9':
		echo 9, " ";
	case '10':
		echo 10, " ";
	case '11':
		echo 11, " ";
	case '12':
		echo 12, " ";
	case '13':
		echo 13, " ";
	case '14':
		echo 14, " ";
	case '15':
		echo 15, " ";
	};

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

echo MathOperation(2, 4, 'summary');


    
?>
