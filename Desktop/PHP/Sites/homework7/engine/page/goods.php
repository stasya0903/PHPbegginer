<?php
function indexAction()
{
    $forGood = mysqli_query(connect(), "SELECT * FROM `goods`");

    $galleryTemplate = " ";

    while ($product = mysqli_fetch_assoc($forGood)) {

        $galleryTemplate .=

            '<div class="picture">' .

            '<img  class="smallImg" src="img/' . "image" . $product["id_product"] . ".jpeg" . '">' .
            '<h3>' . $product["name_product"] . '</h3>' .
            '<h3>' . $product["price_product"] . '</h3>' .
            '<a href="' . '?p=goods&&a=add&&id=' . $product['id_product'] . '">' .
            '<button class="comeBackBtn">Добавить в корзину</button>' . "</a>" .
            '<a href="' . '?p=goods&&a=delete&&id=' . $product['id_product'] . '">' .
            '<button class="comeBackBtn">Удалить из корзины</button>' . "</a>" .
            "</div>";
    };

    $html = file_get_contents(dirname(__DIR__) . '/tmpl/galleryView.html');
    return str_replace('{{pictures}}', $galleryTemplate , $html);


}

function oneAction()
{
    return 'Продукт';
}

function addAction()
{
    session_start();
    $id = $_GET['id'];
    $product = getProductAction($id);

    if ($_SESSION['goods'][$id]) {
        $_SESSION['goods'][$id]["count"] += 1;

    } else {

        $_SESSION['goods'][$id] = [
            'id' => $id,
            'price' => $product["price_product"],
            'count' => 1,
            'name' => $product["name_product"],

        ];
    }
    header("location:?p=basket");



}


function getProductAction($id)
{

    $sqlForChoosenProduct = "SELECT * FROM `goods` WHERE `goods`.`id_product` = " . '"' . $_GET["id"] . '"';

    $forPicture = mysqli_query(connect(), $sqlForChoosenProduct);

    return $product = mysqli_fetch_assoc($forPicture);

}

function deleteAction()
{

    session_start();
    $id = $_GET['id'];
    $product = getProductAction($id);

    if ($_SESSION['goods'][$id]["count"] > 1) {
        $_SESSION['goods'][$id]["count"] -= 1;

    } else {
        unset($_SESSION['goods'][$id]);
    }

    header("location:?p=basket");
    var_dump($_SESSION);


}
