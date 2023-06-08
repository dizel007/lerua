<?php
require 'libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->force_compile = true;
$smarty->debugging =  false; // старт консоли отладчика
$smarty->caching = true;
$smarty->cache_lifetime = 120;

require_once 'include_funcs.php';


$smarty->display('header.tpl');

/*
Подключаем PHPExcel
*/
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

require_once "functions/topen.php";
require "functions/functions.php";
// получаем список отправлений

$id_parcel = "";
$dop_link = '';
$link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;

$list_all_sending = light_query_without_data ($jwt_token, $link, 'Список всех отправлений');
$date_for_ship = "2023-06-08";
// Перебираем все отправления  и ищем новые (созданные)
$dop_link = '/statuses';
// echo "<pre>";
foreach ($list_all_sending as $item) {
    // смотрим статус каждого отправления 
    $id_parcel = $item['id'];
    $link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;

    $status_item = light_query_without_data ($jwt_token, $link, 'Статус отпраления');
    // print_r($status_item);
    $item['status'] =  $status_item[0]['name'];
    // если отправление не подтверждено, то добавляем его в новый массив
    if ($item['status'] == 'created') {
    $new_array_create_sends[] = $item;
    }
    if (($item['status'] == 'packingCompleted') && $item['pickup']['pickupDate'] == $date_for_ship){

        // packingCompleted - нужно сделать , ЛИст подборки нужно после комплектации делать
        // packingStarted - Если посмотреть лист подборки до комплектации

        $new_array_list_podbora[] = $item;
        }

}

// echo "<pre>";
// print_r($new_array_create_sends);
// echo "<pre>";


// разбиваем отправления по грузоместам
// $pppp = '[{"products": [{"sku": "90502006","quantity": 6}]},{"products": [{"sku": "90502006","quantity": 6}]}]';
if (isset($new_array_create_sends)) { // если есть неподтвержденные отправления, то разбиваем их по грузоместам
    $dop_link = '/boxes';
    foreach ($new_array_create_sends  as $item) {
        
    // $data_send =  make_right_posts_gruzomesta ($item['id'], $item['products']);
    $data_send =  make_right_posts_gruzomesta_NEW ($item['id'], $item['products']);

    echo "**************************************************************************<br>";
    // echo "<pre>";
    // print_r($data_send);
//    die(' РАЗБИЛИ ПО ГРУЗОМЕСТАМ');


    $id_parcel = $item['id'];
    $link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;
     $rrr = query_with_data ($jwt_token, $link, json_encode($data_send), ' Размещение по грузометам' );


    //    die($rrr);
    }
}
echo "******ssdssd********************************************************************<br>";
// die($rrr);
// получаем все отправления на нужную дату 


// Создадим каталог товаров по СКУ и артикулу и цену добавим (для листа подбора)
echo "<pre>";
foreach ($new_array_list_podbora as $items) {
    foreach ($items['products'] as $item) {
$arr_catalog_tovarov[$item['lmId']] =  $item['vendorCode'];
    }
}




echo "<br>5464654674678467568567<br>";
// Получаем массив по ID отправлению с разбивкой по грузометам
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$i=1;

$dop_link = '/boxes';
foreach ($new_array_list_podbora as $items) {
    $id_parcel = $items['id']; // MP3290370-001
    $link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;


$array_s_item = light_query_without_data ($jwt_token, $link, 'Лист подбора с грузоместами');

        foreach ($array_s_item as $shiped_posts) {
    
                
                  foreach ($arr_catalog_tovarov as $key => $catalot_item) { // по SKU находим артикул товара
                    if($key == $shiped_posts['products'][0]['sku']) {
                        $artikul = $catalot_item;
                    }

                }
                $sheet->setCellValue("A".$i, $shiped_posts['id']);
                $sheet->setCellValue("B".$i, $shiped_posts['products'][0]['sku']);
                $sheet->setCellValue("C".$i, $shiped_posts['products'][0]['quantity']);
                $sheet->setCellValue("D".$i, $artikul);
                $i++; // смешение по строкам
        }

$i++;
}
$objWriter = new PHPExcel_Writer_Excel2007($xls);
$objWriter->save('list_podbora.xlsx');


echo "<pre>";
   print_r($array_s_item);	
echo "<pre>";



die('ПЕРЕР=д СОзданием екселя');
// Создаем файл для листа подбора


$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$i=1;

foreach ($new_array_list_podbora as $items) {
    

// print_r($items);	


    $sheet->setCellValue("A".$i, $items['id']);
    foreach ($items['products'] as $item) {

            $sheet->setCellValue("B".$i, $item['vendorCode']);
            $sheet->setCellValue("C".$i, $item['qty']);
            $sheet->setCellValue("D".$i, $item['price']);
            $i++; // смешение по строкам

    }
    $i++; // смешение по строкам

}

 

$objWriter = new PHPExcel_Writer_Excel2007($xls);
$date_time = date("Y-m-d")."-".rand(0,1000);
$objWriter->save($date_time.'-list_podbora.xlsx');