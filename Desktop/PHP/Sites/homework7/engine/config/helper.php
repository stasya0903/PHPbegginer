<?php
function getProductAction($id)
{

    $sqlForChoosenProduct = "SELECT * FROM `goods` WHERE `goods`.`id_product` = " . '"' . $_GET["id"] . '"';

    $forPicture = mysqli_query(connect(), $sqlForChoosenProduct);


    return $product = mysqli_fetch_assoc($forPicture);

}

function updateBD ($sql) {



    return $action = mysqli_query(connect(), $sql);


}

function getCountGoodsInBasket()
{
    if (empty($_SESSION['goods'])) {
        return "0";
    }

    return count($_SESSION['goods']);
}

function getMSG()
{
    if (empty($_SESSION['msg'])) {
        return '';
    }

    $msg =
        "<div class=\"alert alert-danger\" role=\"alert\">"
                .$_SESSION['msg'].
        "</div>";
    unset($_SESSION['msg']);

    return $msg;
}


function get_info_from_DB($sql)
{

    $data = [];

    if ($res = mysqli_query(connect(), $sql)) {


        return $data = mysqli_fetch_assoc($res);

    }

    return false;

}

function getNav () {

    if (!empty($_SESSION['admin'])) {

        $content =  " <li class=\"breadcrumb-item\"><a href=\"?p=main\">Главная </a></li>
        <li class=\"breadcrumb-item\"><a href=\"?p=goods\">Каталог товаров</a></li>
        <li class=\"breadcrumb-item\"><a href=\"?p=orders\">Заказы <span class=\"badge badge-secondary\">{{count}}</span></a></li>
        <li class=\"breadcrumb-item\"><a href=\"?p=user\">{{login}}</a></li>";

        return  str_replace(['{{count}}', '{{login}}'],
            [ getCountGoodsInBasket(), getUserStatus()],
            $content);

    }
    $content =  " <li class=\"breadcrumb-item\"><a href=\"?p=main\">Главная </a></li>
        <li class=\"breadcrumb-item\"><a href=\"?p=goods\">Каталог товаров</a></li>
        <li class=\"breadcrumb-item\"><a href=\"?p=basket\">Корзина <span class=\"badge badge-secondary\">{{count}}</span></a></li>
        <li class=\"breadcrumb-item\"><a href=\"?p=user\">{{login}}</a></li>";

    return  str_replace(['{{count}}', '{{login}}'],
        [ getCountGoodsInBasket(), getUserStatus()],
        $content);

}

function getUserStatus(){
    if (!empty($_SESSION['login'])) {

        return "Личный кабинет";

    }

    return "Войти";
}
function getActionsForProduct($product_id){
    if (empty($_SESSION['admin'])){

        $optionsForAction = [];



        array_push($optionsForAction, '<a  href="' . '?p=goods&&a=one&&id=' . $product_id. '">');

        array_push($optionsForAction, '<a  href="' . '?p=basket&&a=add&&id=' . $product_id . '">' .
            '<button class="comeBackBtn">Добавить в корзину</button>' . "</a>")  ;

        return $optionsForAction;

        }

    $optionsForAction = [];

    array_push($optionsForAction,
        '<a  href="' . '?p=goods&&a=changeProduct&&id=' . $product_id . '">' )  ;

    array_push($optionsForAction,
        '<a  href="' . '?p=goods&&a=deleteProduct&&id=' . $product_id . '">' .
                    '<button class="comeBackBtn">Удалить</button>' .
                "</a>" );

    return $optionsForAction;








}


