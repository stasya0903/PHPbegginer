<?php
var_dump($_GET);
var_dump($_POST);

echo "<h1>{$_GET['page']}</h1>";
if (!empty($_POST['role']['key'])) {
    foreach ($_POST['role']['key'] as $value) {
        echo $value . ' ';
    }
}


?>
<form action="?page=10" method="post">
    <input type="" name="name">
    <input type="checkbox" name="role[key][]" value="1">
    <input type="checkbox" name="role[key][]" value="2">
    <input type="checkbox" name="role[key][]" value="3">
    <input type="submit">
</form>
