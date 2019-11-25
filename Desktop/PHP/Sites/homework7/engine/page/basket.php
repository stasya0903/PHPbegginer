<?php

function indexAction()
{
    $basketTemplate = '
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Имя продукта</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Количество</th>
                                        <th scope="col">Стоимость</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>';

    if (empty($_SESSION['goods'])) {

        $basketTemplate = '<h3>Корзина пуста</h3> ';
        return $basketTemplate;

    };

    $total = 0;

    foreach ($_SESSION['goods'] as $idProduct => $product) {

        $totalGoodPrice = (int)$product['count'] * (int)$product['price'];
        $total += $totalGoodPrice;

        $basketTemplate .=
            '<tr>
                     <th scope="col">' . $product["name"] . '</th>' .
            '<th scope="col">' . $product["price"] . '</th>' .
            '<th scope="col">' . $product["count"] . '</th>' .
            '<th scope="col">' . $totalGoodPrice . '</th>' .
            '<th scope="col">' . '<a href="' . '?p=basket&&a=add&&id=' . $idProduct . '">' .
            '<button class="comeBackBtn">+</button>' . "</a>" . '</th>' .
            '<th scope="col">' . '<a href="' . '?p=basket&&a=delete&&id=' . $idProduct . '">' .
            '<button class="comeBackBtn">-</button>' . "</a>" . '</th>' .
            '</tr>';


    }

    $basketTemplate .= "</table><p>Итого: {$total}р.</p>";

    if (!empty($_SESSION['login'])) {

        $basketTemplate .= '<div class=""><a href="' . '?p=basket&&a=submitOrder&id=.' . $_SESSION['id'] . '>' .
            '<button class=\"comeBackBtn\">Оформить заказ</button>' . "</a></div>";

        return $basketTemplate;

    }

    $_SESSION["msg"] = "Войдите в систему чтобы оформить ваш заказ";


    return $basketTemplate;


}

function addAction()
{

    $hasAdd = hasAddGoodsInBasket();
    if (!$hasAdd) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function ajaxAddAction()
{
    $dataResponse = [
        'success' => hasAddGoodsInBasket(),
        'count' => count($_SESSION['goods']),

    ];
    echo json_encode($dataResponse);

    exit;
}


function hasAddGoodsInBasket()
{
    if (empty($_GET['id'])) {
        return false;
    }

    $id = (int)$_GET['id'];
    $product = getProductAction($id);

    if (empty($product)) {
        return false;
    }

    if (empty($_SESSION['goods'][$id])) {
        $_SESSION['goods'][$id] = [
            'price' => $product['price_product'],
            'count' => 1,
            'name' => $product['name_product']
        ];
    } else {
        $_SESSION['goods'][$id]['count'] += 1;
        $_SESSION['msg'] = 'Товар добавлен в корзину';
    }

    return true;
}


function deleteAction()
{

    $id = $_GET['id'];
    $product = getProductAction($id);

    if ($_SESSION['goods'][$id]["count"] > 1) {
        $_SESSION['goods'][$id]["count"] -= 1;

    } else {
        unset($_SESSION['goods'][$id]);
    }

    $_SESSION['msg'] = 'Товар из корзины удален';

    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;


}

function submitOrderAction()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        foreach ($_POST as $field => $data) {
            if (empty($data)) {
                $_SESSION["msg"] = "Заполните все поля";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }

        $address =
            clearStr($_POST['address'] . " "
                . $_POST['address2'] . " "
                . $_POST['address3'] . " "
                . $_POST['address4']);

        $timeStamp = date("d/m/y H:i");

        $sqlToAddOrder = "INSERT INTO `orders` ( `user_id`, `adress`, `tel`, `email`,`time`) 
                                        VALUES ('$_SESSION[id]', '$address', '$_POST[phone]', '$_POST[email]' , '$timeStamp')";

        $result = updateBD($sqlToAddOrder);

        $forOrderId = mysqli_fetch_assoc(updateBD("SELECT LAST_INSERT_ID()"));

        $orderId = $forOrderId['LAST_INSERT_ID()'];


        if ($result) {

            foreach ($_SESSION['goods'] as $goodId => $good) {

                $sqlToAddOrderList = "INSERT INTO `order_list` ( `order_id`, `user_id`, `price`, `count`, `goods_id`)
                                                    VALUES ('$orderId', '$_SESSION[id]', '$good[price]', '$good[count]', '$goodId')";

                $result = updateBD($sqlToAddOrderList);

                if (!$result) {

                    $_SESSION = "Возникла ошибка сервера";


                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit;


                }


            };

            if ($result) {

                unset($_SESSION['goods']);
                $_SESSION['msg'] = "Ваш заказ успешно отправлен";

                return $content = "<h2>Спасибо за ваш заказ ! Наш оператор свяжется с вами в ближайщее время </h2>";
            }


        }


    }

    return $content =
        " <h3 style='color: pink'>Заполните следующие данные</h3>
            <form class='container' method='post'>
            <div class=\"form-group\">
               <label for=\"exampleInputEmail1\">Введите вашу электронную почту</label>
               <input name=\"email\" type=\"email\" class=\"form-control\" placeholder=\"Введите email\" 
                required >
            </div>
             <div class=\"form-group\">
                    <label for=\"exampleInputEmail1\">Телефон</label>
                    <input name='phone' type=\"tel\" class=\"form-control\" placeholder=\"+7 (***) ***-**-**\"
                     pattern=\"\d{1}\d{3}\d{3}\d{2}\d{2}\" required>
                 </div>
            <div class='address'>
                <div class=\"form-group\">
                    <label for=\"inputAddress\">Адрес</label>
                    <input name=\"address\"type=\"text\" class=\"form-control\" placeholder=\"Название улицы\"
                    required>
                </div>
                <div class=\"form-group\">
                    <label for=\"inputAddress2\">Адрес 2</label>
                    <input name=\"address2\" type=\"text\" class=\"form-control\" placeholder=\"Номер дома и квартира\"
                    required>
                </div>
                <div class=\"form-row\">
                    <div class=\"form-group col-md-7\">
                    <label for=\"inputCity\">Город</label>
                    <input name=\"address3\" type=\"text\" class=\"form-control\" placeholder=\"введите город\"
                    required>
                </div>
                <div class=\"form-group col-md-5\">
                    <label for=\"inputZip\">индекс</label>
                    <input name=\"address4\" type=\"number\" class=\"form-control\" placeholder=\"введите почтовый индекс\"
                    required>
                 </div>
                 </div><br><br>
                 <input class='comeBackBtn' type='submit' value='Подтвердить'>
                 </form>
            ";


}



