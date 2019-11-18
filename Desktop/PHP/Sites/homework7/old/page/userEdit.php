<?php
$id = 0;
if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = clearStr($_POST['password']);
    $login = clearStr($_POST['login']);
    $role = (int)$_POST['role'];

    $sql = "UPDATE 
                users 
            SET 
                password = '$password', 
                login = '$login', 
                role = '$role'
            WHERE id = {$id};";
    $result = mysqli_query($link, $sql);

    header('Location: ?page=2&id=' . $id );
    exit();
}



$sql = "SELECT id, name, login, role, password FROM users WHERE id = {$id}";
$result = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($result);

$selected1 = 'selected';
$selected0 = '';


if (empty($row['role'])) {
    $selected1 = '';
    $selected0 = 'selected';
}

$options = "
    <option value='1' $selected1>admin</option>  
    <option value='0' $selected0>user</option>  
"


?>

<form method="post">
    <input  name="login" placeholder="login" value=" <?= $row['login']?>">
    <input  name="password" placeholder="password" value=" <?= $row['password']?>">
    <select name="role" >
        <?= $options ?>
    </select>
    <input type="submit">
</form>
