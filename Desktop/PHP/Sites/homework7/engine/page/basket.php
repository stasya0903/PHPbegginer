<?php

function indexAction()
{

    session_start();
    $basketTemplate = " ";

    if (!empty($_SESSION['goods'])) {
        foreach ($_SESSION['goods'] as $product) {
            $basketTemplate .=
                '<table>
                <tr>
                    <td>' . $product["name"] . '</td>' .
                '<td>' . $product["count"] . " X " . $product["price"] . '</td>' .
                '<td>' . '<a href="' . '?p=goods&&a=add&&id=' . $product["id"] . '">' .
                '<button class="comeBackBtn">Добавить в корзину</button>' . "</a>" . '</td>' .
                '<td>' . '<a href="' . '?p=goods&&a=delete&&id=' . $product["id"] . '">' .
                '<button class="comeBackBtn">Удалить из корзины</button>' . "</a>" . '</td>' .

                '</tr>' .

                '</table> ';


        }

    } else {
        $basketTemplate = "Корзина Пуста";
    }


    $html = file_get_contents(dirname(__DIR__) . '/tmpl/galleryView.html');
    return str_replace('{{pictures}}', $basketTemplate, $html);


}

