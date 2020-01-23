<?php
$id = 0;
if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
}

$sql = "SELECT id, name, login, role FROM users WHERE id = {$id}";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($result);

$role = 'admin';
if (empty($row['role'])) {
    $role = 'user';
}

echo <<<php
        <h1>Информация о пользователе:</h1>
        <h2>{$row['name']}</h2>
        <p>{$row['login']}</p>
        <p>{$role}</p>
        <a href="?id={$row['id']}&page=4">Редактировать</a>
php;
