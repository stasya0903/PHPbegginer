

<?php 

$content = date('Y');

$html = file_get_contents('main.html');



echo str_replace('{{content}}', $content, $html)




 ?>