<?php
$link = mysqli_connect('localhost', 'root', '', 'gbphp');

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM `users` WHERE `id` = " . $id;
    $result = mysqli_query($link, $sql);
    header('Location: ?');
    exit;
}

if (!empty($_GET['login']) && !empty($_GET['password'])) {
    $login = mysqli_real_escape_string($link, $_GET['login']);
    $password = mysqli_real_escape_string($link, $_GET['password']);

    $sql = "INSERT INTO `users`
                    (`password`, `login`) 
            VALUES 
                   ('{$password}', '{$login}');";

    mysqli_query($link, $sql);
    header('Location: ?');
    exit;
}

$sql = "SELECT id, name, login, role FROM users";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo <<<php
        <h2>{$row['login']}</h2>
        <p>{$row['role']}</p>
        <a href="?id={$row['id']}">Удалить</a>
php;
}

var_dump($_GET);
?>

<form>
    <input type="text" name="login" placeholder="login">
    <input type="text" name="password" placeholder="password">
    <input type="submit">
</form>

