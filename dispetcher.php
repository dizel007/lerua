<?php
require 'libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->force_compile = true;
$smarty->debugging =  false; // старт консоли отладчика
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display('header.tpl');

/*
Подключаем PHPExcel
*/
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

require_once "functions/topen.php";
require_once "functions/functions.php";
require_once "functions/art_cat.php";
require_once "functions/excel_style.php";
// получаем список отправлений

$id_parcel = "";
$dop_link = '';
$link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;

$list_all_sending = light_query_without_data ($jwt_token, $link, 'Список всех отправлений');
$date_for_ship = "2023-06-09";
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
// print_r($new_array_list_podbora);
// echo "<pre>";


// разбиваем отправления по грузоместам
if (isset($new_array_create_sends)) { // если есть неподтвержденные отправления, то разбиваем их по грузоместам
    $dop_link = '/boxes';
    foreach ($new_array_create_sends  as $item) {
           $data_send =  make_right_posts_gruzomesta_NEW ($item['id'], $item['products']);
           $id_parcel = $item['id'];
           $link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;
// **********************   Запуск разбития по грузоотправлениям 
           $rrr = query_with_data ($jwt_token, $link, json_encode($data_send), ' Размещение по грузометам' );

    }
}

// die($rrr);
// получаем все отправления на нужную дату 

// Создадим каталог товаров по СКУ и артикулу и цену добавим (для листа подбора)

foreach ($new_array_list_podbora as $items) {
    foreach ($items['products'] as $item) {
$arr_catalog_tovarov[$item['lmId']] =  $item['vendorCode'];
    }
}




echo "<br>5464654674678467568567<br>";
// Получаем массив по ID отправлению с разбивкой по грузометам и формируем ексель файл ЛИСТ ПОДБОРА
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();

//Параметы печати
// Ориентация
 
// Поля
$sheet->getPageMargins()->setTop(0.5);
$sheet->getPageMargins()->setRight(0.5);
$sheet->getPageMargins()->setLeft(0.5);
$sheet->getPageMargins()->setBottom(0.5);
// Ширина столбцов
$sheet->getColumnDimension("A")->setWidth(16); // ширина столбца
$sheet->getColumnDimension("B")->setWidth(60); // ширина столбца
$i=1;

$dop_link = '/boxes';
$sheet->setCellValue("A".$i, 'Лист подбора на '.$date_for_ship);
$sheet->getStyle("A".$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$sheet->mergeCells("A1:D1"); 
$sheet->getStyle("A".$i)->getFont()->setBold(true); // жирный текст
$sheet->getStyle("A".$i)->getFont()->setSize(16); // размер текста
$i++;
// шапка в екселе
$sheet->setCellValue("A".$i, '№ отправления');
$sheet->setCellValue("B".$i, 'Наименование');
$sheet->setCellValue("C".$i, 'Кол-во');
$sheet->setCellValue("D".$i, 'Арт.');
$sheet->getStyle("A".$i.":D".$i)->getFont()->setSize(10); // размер текста
$sheet->getStyle("A".$i.":D".$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$i++;
// echo "<pre>";
// print_r($new_array_list_podbora);
// die();


foreach ($new_array_list_podbora as $items) {

    $id_parcel = $items['id']; // MP3290370-001
    $sheet->setCellValue("A".$i, 'Отправление №'.$id_parcel." на сумму: ". number_format($items['parcelPrice'],2). " руб.");
    $sheet->getStyle("A".$i)->getFont()->setBold(true); // жирный текст
    $sheet->getStyle("A".$i)->getFont()->setSize(15); // размер текста
    $i++;
    $link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;


$array_s_item = light_query_without_data ($jwt_token, $link, 'Лист подбора с грузоместами');

        foreach ($array_s_item as $shiped_posts) {
    
                
                  foreach ($arr_catalog_tovarov as $key => $catalot_item) { // по SKU находим артикул товара
                    if($key == $shiped_posts['products'][0]['sku']) {
                        $artikul = $catalot_item;
                    }

                }
                $sheet->setCellValue("A".$i, $shiped_posts['id']);
                $sheet->setCellValue("B".$i, $art_catalog[$artikul]);
                $sheet->setCellValue("C".$i, $shiped_posts['products'][0]['quantity']);
                $sheet->getStyle("C".$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                

                $sheet->setCellValue("D".$i, $artikul);
                $sheet->getStyle("D".$i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                
                $sheet->getStyle("A".$i.":D".$i)->getFont()->setSize(10); // размер текста

                $i++; // смешение по строкам
        }
        $sheet->getStyle("A".$i.":D".$i )->applyFromArray($bg);
$i++;
}
$i--;
$sheet->getStyle("A1:D".$i)->applyFromArray($border_inside); // разлинейка ячеек

$objWriter = new PHPExcel_Writer_Excel2007($xls);
$objWriter->save('list_podbora.xlsx');


// echo "<pre>";
//    print_r($array_s_item);	
// echo "<pre>";


// echo "<pre>";
// Создаем файл для с количеством товаров для Заказа-клиента 1С
foreach ($new_array_list_podbora as $items) {
    foreach ($items['products'] as $item) {
 
    // print_r($item);	
    // сумируем все товары по артикулам
 $list_tovarov[$item['vendorCode']] = @$list_tovarov[$item['vendorCode']] + $item['qty'];
 $list_tovarov_price[$item['vendorCode']] = $item['price'];
 $summa_all_tovarov = @$summa_all_tovarov + $item['qty'];
    // print_r($items);	
    
}
}
// echo "<pre>";
//    print_r($art_catalog );	
// echo "<pre>";
// print_r($summa_all_tovarov);
// echo "<pre>";
// print_r($list_tovarov_price);


// die('ddd');

$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$i=1;
foreach ($list_tovarov as $key => $items) {
    
// print_r($items);	
    $sheet->setCellValue("A".$i, $key);
            $sheet->setCellValue("C".$i, $items);
            $sheet->setCellValue("D".$i, $list_tovarov_price[$key]);
            $sheet->setCellValue("E".$i, $art_catalog[$key]);
            $i++; // смешение по строкам
}
$i=$i+2;
$sheet->setCellValue("C".$i, $summa_all_tovarov);
 

$objWriter = new PHPExcel_Writer_Excel2007($xls);
$date_time = date("Y-m-d")."-".rand(0,1000);
$objWriter->save($date_time.'1С-list_tovarov.xlsx');