<?php
function indexAction()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $sqlForUser =  " SELECT  `id` , `name`, `login`, `password`, `role` FROM `users` WHERE login ='$_POST[login]' ";

        $user = get_info_from_DB($sqlForUser);

        if (!$user) {

            $_SESSION["msg"] = "Такой логин не существует";

            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!password_verify($_POST['password'], $user['password'])) {

            $_SESSION["msg"] = "Вы ввели неправильный пароль";

            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $_SESSION['login'] =  true;

        $_SESSION['id'] = $user["id"];

        if ($user["role"]) {
            $_SESSION["admin"] = true;
        }

    }

    if (!empty($_GET['exit'])) {
        session_destroy();
        header('location: ' . $_SERVER['HTTP_REFERER']);  
       
    }

    if (!empty($_SESSION["login"])) {

        if (empty($user))   {

            $sqlForUser =  " SELECT  `name`, `login`, `password`, `role` FROM `users` WHERE id ='$_SESSION[id]' ";

            $user = get_info_from_DB($sqlForUser);

            return $content = '<h2> Вы вошли под логином  ' . $user["login"] . '</h2>' .
                '<a href="?p=user&&exit=1">Выйти</a>';                                             

        }

        return $content = '<h2> Вы вошли под логином  ' . $user["login"] . '</h2>' .
            '<a href="?p=user&&exit=1">Выйти</a>';


    }


    $content = "       <div class='form'> 
                            <form method=\"post\">
                                <div class='form-group'> 
                                <input name=\"login\" placeholder=\"login\">
                                </div>
                                <div class='form-group'> 
                                <input name=\"password\" placeholder=\"password\">
                                </div>
                                <input class ='comeBackBtn submitBtn' type=\"submit\">
                            </form> 
                        </div>
                        
                        <a href=\"?p=user&&a=addUser\"><button class='comeBackBtn formBtn'>Регистрация</button>  </a> 
                       
                   
                  ";

    return $content;


}

function addUserAction()
{

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (empty($_POST['name'])) {
            $_SESSION['msg'] = "Заполните поля чтобы зарегистрироваться";
            header("location:?p=user&a=addUser");
            exit;

        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $login = clearStr($_POST['login']);
        $name = clearStr($_POST['name']);

        $sqlToAddUser = "INSERT INTO 
                                    `users` (`name`, `login`, `password`) 
                                    VALUES ( '{$name}', '{$login}', '{$password}')";

        $result = mysqli_query(connect(), $sqlToAddUser);


        if ($result) {

            $_SESSION['msg'] = "Вы успешно зарегестрированы.Войдите чтобы авторизироваться";

        }
    }


    $content = " <div class='form'>
                    <h3>Для регистрации заполните следующие поля</h3><br>
                     <form method=\"post\">
                        <div class='form-group'> 
                        <input name=\"name\" placeholder=\"Ваше имя\">
                        </div>
                        <div class='form-group'>
                        <input name=\"login\" placeholder=\"Придумайте логин\">
                        </div>
                        <div class='form-group'>
                        <input name=\"password\" placeholder=\"Придумайте пароль\">
                        </div>
                        <div class='form-group'>
                        <input class='comeBackBtn' type=\"submit\">
                        </div>
                        
                    </form> 
                 </div>
                   ";


    return $content;


}




















