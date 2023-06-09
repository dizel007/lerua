<?php
require_once "..\include_funcs.php"; // все функции
echo "ПЕРЕХОДИМ К КОМПЛЕКТАЦИИ ЗАКАЗА<br>";

$smarty->display('../templates/header.tpl');


$new_array_list_podbora = get_create_spisok_from_lerua($jwt_token, $smarty, $art_catalog, 'packingCompleted');
                                // packingCompleted - нужно сделать , ЛИст подборки нужно после комплектации делать
                                // packingStarted - Если посмотреть лист подборки до комплектации



// echo "<pre>";
// print_r($new_array_list_podbora);


// Смотрим была ли выбрана дата комплектации
if (isset($_GET['date_query_lerua'])) {
    $date_for_ship = $_GET['date_query_lerua'];
    echo "НАША ДАТА :".$date_for_ship,"<br>";
foreach ($new_array_list_podbora as $item) {
    if ($item['pickup']['pickupDate'] == $date_for_ship)
    $date_new_array_list[]= $item;
    }



$smarty->assign('link', "");
$smarty->assign('name_link', "");

            if (isset($date_new_array_list)) {
            $smarty->assign('new_array_create_sends', $date_new_array_list);
            $smarty->display('../templates/main_table.tpl');
       
            }
 $smarty->display('../templates/up_form_lerua.tpl');

}  else  {
    $date_for_ship = "";
   $date_new_array_list= $new_array_list_podbora;
   $smarty->assign('link', "");

$smarty->assign('name_link', "");
$smarty->assign('new_array_create_sends', $date_new_array_list);
$smarty->display('../templates/main_table.tpl');
$smarty->display('../templates/up_form_lerua.tpl');
}


// Создаем ЛИСТ ПОДБОРА 
require_once "make_list_podbora.php";
// Создаем файл для с количеством товаров для Заказа-клиента 1С
require_once "make_1c_file.php";

if (isset($_GET['date_query_lerua']) && isset($date_new_array_list )) {
    echo "<a href=\"$link_list_podbora\">Cкачать лист подбора</a>";
    echo "<a href=\"$link_list_tovarov\">Cкачать лист для 1С</a>";

} else {
    echo  "НЕТ ЗАКАЗОВ ДЛЯ КОМПЛЕКТАЦИИ";
}

// echo "<pre>";
// print_r($list_tovarov);


