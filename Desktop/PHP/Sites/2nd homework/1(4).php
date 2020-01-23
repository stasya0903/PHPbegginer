
<php? 

$content = data("y");

$html = file_get_contents('index.html');
str_replace('{{CONTENT}}',  $content,  $html)""
?>