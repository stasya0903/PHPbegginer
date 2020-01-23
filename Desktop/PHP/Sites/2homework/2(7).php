<?php 

$hour = date('H');
$min = date('i');
$wordsForHour = ["час", "часов", "часа"];
$wordsForMin = ["минутa", "минут", "минуты"];


function getString($value, $array){
	if     	($value == 1 or 
			(($value > 20) and ($value % 10 == 1)))
		{
			return $array[0];

		} else if 	(($value > 1 and $value <5) or
					(($value % 10) > 1 and ($value % 10) < 5 and $value > 20)){
						return $array[2];
					} else {
					
						return $array[1];
		}
}

function getTime ($hour, $min, $wordsForHour,$wordsForMin){

	$hourString = $hour . " " .getString($hour, $wordsForHour);
	$minString = $min . " " . getString($min,$wordsForMin);

	echo "Сейчас ". $hourString . " " . $minString;
}


getTime($hour, $min, $wordsForHour,$wordsForMin)
 ?>
