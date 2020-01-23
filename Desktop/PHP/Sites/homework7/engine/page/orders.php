<?php

function indexAction()
{

    $forOrders = mysqli_query(connect(), "SELECT * FROM `orders`");

    $galleryTemplate = " <div class=\"container\">";

    $options = "
    <option value='Создан' $selected0 >Создан</option>  
    <option value='Одобрен' $selected1>Одобрен</option>
    <option value='Упаковка' $selected1>Упаковка</option> 
    <option value='Отправлен' >Отправлен</option> 
    <option value='Доставлен' >Доставлен</option>  
        ";

    while ($order = mysqli_fetch_assoc($forOrders)) {

        $galleryTemplate .=



            '<div class="card product " style="width: 18rem;" >' .
            '<div class="card-body">' .
            '<h6 class="card-title">Номер заказа:' . $order["id"] . '</h6>'.
            '<form method="post">'.
            '<select class="card-title">Статус: ' . $order["status"] .
            $options .'</select>
            <input type="submit" value="Обновить статус"></form><br>'.
            '<h6 class="card-title">Время создания: <br>' . $order["time"] . '</h6>' .
            "</div>" .
            '<a  href="' . '?p=orders&a=checkOrder&id=' . $order["id"] . '">' .
            '<button class="comeBackBtn">Детали</button>' .
            "</a>" .

            "</div>";
    };

    $galleryTemplate .= '</div>';

    return $galleryTemplate;


}

function checkOrderAction()
{

    $id = $_GET["id"];

    $sqlForOrder = "SELECT * FROM `orders` WHERE id ='$id'";

    $orderInfo = get_info_from_DB($sqlForOrder);

    $sqlForUser = "SELECT * FROM `users` WHERE id ='$orderInfo[user_id]'";

    $userInfo = get_info_from_DB($sqlForUser);

   $orderTemplate =

        '<div class="card-body">' .
        '<p class="card-title" >Заказ # ' . $orderInfo["id"] . ' Создан ' . $orderInfo["time"] . '</p>' .
        '<p class="card-title" >Пользователь: ' . $userInfo["name"] . '</p>' .
        '<div >
                    <label>Адрес</label>
                    <input class="form-group col-md-9" name=\"address\" type=\"text\"  placeholder="'. $orderInfo["adress"] .
                 ' ">
         </div>'.
        '<div >
                    <label>Телефон</label>
                    <input class="form-group col-md-4" name=\"tel\" type=\"phone\"  placeholder="'. $orderInfo["tel"] .
        ' ">
         </div>'.
        '<div >
                    <label>Email</label>
                    <input class="form-group col-md-5" name=\"email\" type=\"email\"  placeholder="'. $orderInfo["email"] .
        ' ">
         </div>'.
        '<table class="table">
                                <thead>
                                    <tr> 
                                        <th scope="col">Имя продукта</th>
                                        <th scope="col">Цена</th>
                                        <th scope="col">Количество</th>
                                        <th scope="col">Стоимость</th>
                                        <th scope="col">Добавить</th>
                                        <th scope="col">Удалить</th>
                                    </tr>
                                </thead>'.

        "</div>";

    $sqlForOrderList = "SELECT * FROM `order_list` WHERE order_id = '$orderInfo[id]'";

    $forOrderList = mysqli_query(connect(),  $sqlForOrderList);

    $total = 0;

    while ($orderList = mysqli_fetch_assoc($forOrderList)) {

        $sqlForProduct = "SELECT * FROM `goods` WHERE id_product='$orderList[goods_id]'";

        $product = get_info_from_DB($sqlForProduct);

        $totalGoodPrice = (int)$orderList["count"] * (int)$orderList["price"];
        $total += $totalGoodPrice;

        $orderTemplate .=
            '<tr>
                     <th scope="col">' . $product["name_product"] . '</th>' .
            '<th scope="col">' . $orderList["price"] . '</th>' .
            '<th scope="col">' . $orderList["count"] . '</th>' .
            '<th scope="col">' . $totalGoodPrice . '</th>' .
            '<th scope="col">' . '<a href="' . '?p=orders&&a=addToOrder&&orderId=' . $orderList["order_id"]. "&idProduct=" . $orderList["goods_id"]. "&count=" . $orderList["count"].'">' .
            '<button class="comeBackBtn">+</button>' . "</a>" . '</th>' .
            '<th scope="col">' . '<a href="' . '?p=orders&&a=deleteFromOrder&&orderId=' . $orderList["order_id"]. "&idProduct=" . $orderList["goods_id"]. "&count=" . $orderList["count"] .'">' .
            '<button class="comeBackBtn">-</button>' . "</a>" . '</th>' .
            '</tr>';
            '</tr>';


    }

    $orderTemplate .= "</table><p>Итого: {$total}р.</p>";

    return $orderTemplate;


}

function addToOrderAction (){

        $sql = "UPDATE `order_list` SET `count`= $_GET[count] + 1 WHERE `order_id`= '$_GET[orderId]' AND `goods_id` = '$_GET[idProduct]' ";

        $result = updateBD($sql );

        if ($result) {
            $_SESSION['msg'] = "Товар добавлен к заказу";
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;



    }

    $_SESSION['msg'] = "Произошла ошибка";



}

function deleteFromOrderAction (){

    if ($_GET["count"] > 1 ){
        $sql = "UPDATE `order_list` SET `count`= $_GET[count] - 1 WHERE `order_id`= '$_GET[orderId]' AND `goods_id` = '$_GET[idProduct]' ";

        $result = updateBD($sql );

        if ($result) {
            $_SESSION['msg'] = "Товар удален";
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;

        }

    }

    $sql = "DELETE FROM `order_list`  WHERE `order_id`= '$_GET[orderId]' AND `goods_id` = '$_GET[idProduct]' ";

    var_dump($sql);

    $result = updateBD($sql );

    if ($result) {
        $_SESSION['msg'] = "Товар удален";
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit;

    }





}


