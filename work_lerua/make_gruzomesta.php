<?php
require_once "../include_funcs.php"; // все функции
$smarty->display('../templates/header.tpl');

echo "РАЗБИВАЕМ ВСЕ ПО ГРУЗОМЕСТАМ<br>";


// ***** Вычитываем отправления cо статусом CREATED*
$new_array_create_sends = get_create_spisok_from_lerua($jwt_token, $smarty, $art_catalog, 'created');

// ***** Запускаем функцию по разбитию товаров на грузоместа ***********
if (isset($new_array_create_sends)) { // если есть неподтвержденные отправления, то разбиваем их по грузоместам
    $dop_link = '/boxes';
    foreach ($new_array_create_sends  as $item) {
           $data_send =  make_right_posts_gruzomesta_NEW ($item['id'], $item['products']);
           $id_parcel = $item['id'];
           $link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;
// **********************   Запуск разбития по грузоотправлениям 
           $rrr = query_with_data ($jwt_token, $link, json_encode($data_send), ' Размещение по грузометам' );
           
$arr_for_complete[] = $id_parcel;
    }
}

$str_arr_for_complete = implode(",", $arr_for_complete);

// echo "$str_arr_for_complete<br>";


$smarty->assign('link', "complete_zakaz_for_date.php?str_arr_for_complete=$str_arr_for_complete");
$smarty->assign('name_link', "Подтвердить все отправления");

$smarty->assign('new_array_create_sends', $new_array_create_sends);
$smarty->display('../templates/main_table.tpl');