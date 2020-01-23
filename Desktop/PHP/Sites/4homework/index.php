<?php 

ob_start();

require 'gallery.php';

$gallery = ob_get_clean();

$html = file_get_contents("page.html");

echo str_replace('{{pictures}}', $gallery, $html);

$updatedLog = file_get_contents("log.txt");




	if (strlen($updatedLog) >= 90) {

		$arrayForLogs = scandir('./logs');

		$numberOfLogs = count($arrayForLogs) - 1;

		$newLog = fopen( "./logs/log".$numberOfLogs.".txt", 'w+');

		fwrite($newLog, $updatedLog);

		$log = fopen("log.txt", 'w');

		fwrite($log, date("h:i:s").PHP_EOL);

		fclose($log); 


	}



	$log = fopen("log.txt", 'a');

	fwrite($log, date("h:i:s").PHP_EOL);

	fclose($log);



?>