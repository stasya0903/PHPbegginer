<?php 

//1============================

$a = 0;

while ($a < 100){

	if($a % 3 == 0){
		echo $a.'  ';
	}
	 $a++;

}
$a = 0; 

echo '<br>';

// 2============================

do {
if ($a == 0){
	echo '<br>'.$a++.' это ноль <br>';
}

if($a % 2 == 0){
	echo $a++. ' четное число <br>';
}

echo $a++. ' нечетное число <br>';

} while ($a <= 10);

echo '<br>';
// 3============================


$russia = [
	'Московская область' => 	['Москва', 'Зеленоград', 'Клин'],
	'Ленинградская область'=> ['Санкт-Петербург', 'Всеволожск', 
								'Павловск', 'Кронштадт'],
	'Рязанская область' => ["1", "2","3"]
];

foreach ($russia as $key => $value) {
	echo $key.":<br>";
	echo implode(', ', $value).".<br>";
}

echo '<br>';

// 4============================

$alphabit = [
	'а' => 'a', 
	'б' => 'b', 
	'в' => 'v', 
	'г' => 'g', 
	'д' => 'd',
	'е' => 'e',
	'ж' => 'zh',
	'з' => 'z',
	'и' => 'i',
	'й' => 'i',
	'к' => 'k',
	'л' => 'l',
	'м' => 'm',
	'н' => 'n',
	'о' => 'o', 
	'п' => 'p',
	'р' => 'r', 
	'с' => 's',
	'т' => 't',
	'у' => 'u',
	'ф' => 'f',
	'х' => 'h', 
	'ц' => 'c',
	'ч' => 'ch',
	'ш' => 'sh',
	'щ' => 'sh',
	'ь' => 'i',
	'ы' => 'i',
	'ь' => 'i',
	'э' => 'e',
	'ю' => 'iy',
	'я' => 'ia',
];

function Transilation ($alphabit, $string){

	
$letterInLat = [];

for ($i = 0; $i < strlen($string); $i = $i + 2){

$letterInKiril = ($string[$i].$string[$i+1]);


if (!array_key_exists($letterInKiril, $alphabit)){

	echo 'Input one word with no space and in lower case';
	break;

} else {

	array_push($letterInLat, $alphabit[$letterInKiril]);
	
}


}

$string =  implode('', $letterInLat);
	echo $string;

};

Transilation($alphabit, "лдоыпдодыф");

echo '<br>';

//5============================

function spaceToUnderscore ($string){

	if (!is_string($string)) {
        return "incorrect argument {$string}";
    }


	echo str_replace(" ", "_", $string);

}

spaceToUnderscore("Санкт Петербург");

echo '<br>';

//7===========================

for($i = 0 ; $i < 10; print $i++ . " "){


}
//8===========================

echo '<br>';

$russia = [
	'Московская область' => 	['Москва', 'Зеленоград', 'Клин'],
	'Ленинградская область'=> ['Санкт-Петербург', 'Всеволожск', 
								'Павловск', 'Кронштадт'],
	'Рязанская область' => ["Касимов", "Кораблино","Рязань"]
];

foreach ($russia as $key => $value) {

	echo $key;

	$arrayForCity = [];

		foreach ($value as $city ) {
			
			if (substr($city, 0,2) == "К") {
			
			array_push($arrayForCity, $city);
		
			} }
	if (count($arrayForCity) == 0 ) {
		echo "<br>";
	}
	if (count($arrayForCity) == 1 ) {
		echo ":<br>". implode(",", $arrayForCity).'.<br>';
	}

	if (count($arrayForCity) > 1 ){
		echo ":<br>". implode(", ", $arrayForCity).'.<br>';

}

}





 ?>