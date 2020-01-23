<?php
$sql = "SELECT id, name, login, role FROM users";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo <<<php
        <h2>{$row['login']}</h2>
        <p>{$row['role']}</p>
        <a href="?page=2&id={$row['id']}">Подробнее ...</a>
php;
}