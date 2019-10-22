
<?php
$forHeader = 'This is header';
$forTitle = 'This is title';
$todayDate = date("d/m/y")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$forTitle?></title>
</head>
<body>
	<?php echo "<h1>$forHeader</h1>";
		echo "<p>"."Today is ".$todayDate."</p>"	
	?> 
</body>
</html>