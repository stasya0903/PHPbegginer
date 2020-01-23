<?php
function indexAction()
{
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $sql = "SELECT 
                    id, name, password, login  
            FROM 
                 users 
            WHERE login = '{$_POST['login']}' ";

        $user = [];;
        if ($res = mysqli_query(connect(), $sql)) {
            $user = mysqli_fetch_assoc($res);
            var_dump(password_verify($_POST['password'], $user['password']));
            if ( password_verify($_POST['password'], $user['password'])) {
                $_SESSION['login'] = true;
            }
        }


    }
    if (!empty($_SESSION["login"]) && !empty($user)) {

        $content = '<h2> Добро Пожаловать ' . $user['name'] . '</h2>' .
            '<a href="?p=user&&exit=1">Выйти</a>';

    } else {

        $content = " <form method=\"post\">
                        <input name=\"login\" placeholder=\"login\">
                        <input name=\"password\" placeholder=\"password\">
                        <input type=\"submit\">
                    </form> 
                   <a href=\"?p=user&&a=addUser\"><button>Регистрация</button>  </a>";

    }

    if (!empty($_GET['exit'])) {
        session_destroy();
        header('Location: ?p=user');

    }
    $html = file_get_contents(dirname(__DIR__) . '/tmpl/galleryView.html');
    return str_replace('{{pictures}}', $content, $html);


}

function addUserAction()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $password = password_hash(clearStr($_POST['password']), PASSWORD_DEFAULT);
        $login = clearStr($_POST['login']);
        $name = $_POST['name'];

        $sqlToAddUser = "INSERT INTO 
                                    `users` (`name`, `login`, `password`) 
                                    VALUES ( '{$name}', '{$login}', '{$password}')";

        $result = mysqli_query(connect(), $sqlToAddUser);
        if ($result) {

            $content = "<h3>Вы успешно зарегестрированы!</h3>
                    <a href=?p=user><button>Войти</button></a>";

            $html = file_get_contents(dirname(__DIR__) . '/tmpl/galleryView.html');
            return str_replace('{{pictures}}', $content, $html);


        }
    }


    $content = " <h3>Для регистрации заполните следующие поля</h3><br>
                     <form method=\"post\">
                        <input name=\"name\" placeholder=\"Ваше имя\">
                        <input name=\"login\" placeholder=\"Придумайте логин\">
                        <input name=\"password\" placeholder=\"Придумайте пароль\">
                        <input type=\"submit\">
                    </form> 
                   ";


    $html = file_get_contents(dirname(__DIR__) . '/tmpl/galleryView.html');
    return str_replace('{{pictures}}', $content, $html);


}

