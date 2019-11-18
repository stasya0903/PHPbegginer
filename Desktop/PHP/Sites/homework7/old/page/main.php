<?php
    var_dump($_POST);
    var_dump($_FILES);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $file = dirname(__DIR__) . 'main.php/' . $_FILES['userfile']['name'];
        copy($_FILES['userfile']['tmp_name'], $file);
    }

?>

<form enctype="multipart/form-data"  method="post">
    <input name="file">
Отправить этот файл: <input name="userfile" type="file">
    <input type="submit" value="Отправить файл">
</form>