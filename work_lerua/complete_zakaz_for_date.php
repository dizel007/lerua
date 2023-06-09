<?php
/*
ЗДесь мы только подтвержаем все заказы, номера которых переданы в GET  запросе
*/
require_once "..\include_funcs.php"; // все функции
echo "Подтверждаем все заказы<br>";

$arr_for_complete = explode(",", $_GET['str_arr_for_complete']);

// echo "<pre>";
// print_r($arr_for_complete);

foreach ($arr_for_complete as $item) {
$id_parcel = $item;
$dop_link = ':confirm';
$link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;

$rrrr = light_query_without_data_with_post ($jwt_token, $link, 'Запрос на подтверждение Заказа');


echo $link."<br>";
}

echo '<a href="pack_zakaz_for_date.php">Перейти к комплектации заказов</a>';
