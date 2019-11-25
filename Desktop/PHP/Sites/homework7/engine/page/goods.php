<?php
function indexAction()
{
    $forGood = mysqli_query(connect(), "SELECT * FROM `goods`");

    $galleryTemplate = " <div class=\"container\">";

    while ($product = mysqli_fetch_assoc($forGood)) {

        $galleryTemplate .=

                    '<div class="card product " style="width: 18rem;" >' .

                    " {{OPTION1}}" .

                        '<img  class="smallImg card-img-top" src="img/' . "image" . $product["id_product"] . ".jpeg" . '">'
                        . "</a>" .

                        '<div class="card-body">'.
                            '<h5 class="card-title">' . $product["name_product"] . '</h5>' .
                            '<p class="card-text">' . $product["price_product"] . '</p>' .
                        " {{OPTION2}}" .
                        "</div>".

                    "</div>"
            ;
        $galleryTemplate = str_replace(["{{OPTION1}}", "{{OPTION2}}"], getActionsForProduct($product['id_product']),$galleryTemplate);
    };

    $galleryTemplate .= '</div>';

    return $galleryTemplate;


}

function oneAction()
{
    $id = $_GET["id"];
   $product = getProductAction($id);

   return $ProductTemplate =

            '<div class="card" style="width:35rem" >' .

                '<img  class="card-img-top" src="img/' . "image" . $product["id_product"] . ".jpeg" . '">'.



                    '<div class="card-body">'.
                        '<h5 class="card-title">' . $product["name_product"] . '</h5>' .
                        '<p class="card-text">' . $product["price_product"] . '</p>' .
                        '<p class="card-text">' . $product["description_short"] . '</p>' .

                        "<button class=\"comeBackBtn\" onclick=\"addGoods({$id})\">Добавить в корзину</button>" .

                    "</div>".

            "</div>".

       '<script src="js/js.js"></script>';
}

function changeProductAction(){

    $id = $_GET["id"];
    $product = getProductAction($id);

    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        foreach($_POST as $field => $info){

            if(empty($info)){
                continue;
            }

            $info = clearStr($info);

            $sql =  " UPDATE `goods` SET $field='$info' WHERE id_product = '$id'";

            $result = updateBD($sql);

            if ($result){
                $_SESSION['msg'] = "Товар успешно обновлен";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

        };





    }

    return $ProductTemplate =

        '<div class="card" style="width:35rem" >' .

        '<a class="changePicture" href="?p=goods&a=changePic&id=' . $product["id_product"] .  '">'.

        '<img  class="card-img-top" src="img/' .  $product["img_dir"] . ".jpeg" . '">'.

        "</a>".

        '<form method="post">
         <div class="card-body">'.
        '<input name="name_product" type ="text" class="form-control" placeholder="' .  $product["name_product"] . '" >' .
        '<input name="price_product" type ="number" class="form-control"placeholder="' . $product["price_product"] . '" >' .
        '<input name="description_short" type ="text" class="form-control"placeholder="' . $product["description_short"] . '" >' .
        '<input class="comeBackBtn Submit" type="submit" value="Изменить">';


        "</form></div>";


}

function deleteProductAction(){

    $id = $_GET["id"];

    $sql =  " DELETE FROM `goods`  WHERE id_product = '$id'";

    $result = updateBD($sql);

    if ($result){
        $_SESSION['msg'] = "Товар успешно удален";
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


}

function changePicAction() {


    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $targetDir = "img/";
        $fileName = basename('image' .$_GET['id'] . '.jpeg');
        $targetFilePath = $targetDir . $fileName;

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

            $_SESSION["msg"] = "Файл успешно загружен";
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;

        }else{
            $_SESSION["msg"] = "Возникла ошибка при загрузке файла";
        }











    }


    $id = $_GET["id"];
    return $content =

        "<form method=\"post\" method=\"post\" enctype=\"multipart/form-data\">
         <h2>Выбирете картинку для загрузки </h2>
        <input class=\"forImg\" type=\"file\" name=\"file\"> <br>
        <input class=\"comeBackBtn\" type=\"submit\" name=\"submit\" value=\"Загрузить\">
        </form>";
}





