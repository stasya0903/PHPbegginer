<?php
session_start();

$link = mysqli_connect('localhost', 'root', '', 'gbphp');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "SELECT 
                    id, name, password, login, role 
            FROM 
                 users 
            WHERE login = '{$_POST['login']}' ";

    $user = [];
    if ($res = mysqli_query($link, $sql)) {
        $user = mysqli_fetch_assoc($res);
        var_dump(password_verify($_POST['password'], $user['password']));
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['login'] = true;
        }
    }
    header('Location: /');
    exit;
}

if (!empty($_GET['exit'])) {
    session_destroy();
    header('Location: /');
    exit;
}

if (empty($_SESSION['login'])) {
    echo <<<php
    <form method="post">
        <input name="login" placeholder="login">
        <input name="password" placeholder="password">
        <input type="submit">
    </form>
php;
} else {
    echo <<<php
        <a href="?exit=1">exit</a> 
php;

    var_dump($_SESSION);
}





