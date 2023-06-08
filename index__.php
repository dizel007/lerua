<?php
require 'libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->force_compile = true;
$smarty->debugging =  false; // старт консоли отладчика
$smarty->caching = true;
$smarty->cache_lifetime = 120;

require_once 'include_funcs.php';


$smarty->display('header.tpl');





if (isset($_GET['type_query'])) {
    if (($_GET['type_query']) == 555) {
        require_once 'make_etikeks_for_all.php';
        die('');
    }    
}


if (isset($_GET['date_query_ozon'])) {
    $smarty->assign('date_query_ozon', $_GET['date_query_ozon']);
} else {
    $smarty->assign('date_query_ozon', '');
}
$smarty->display('up_form.tpl');


// если есть Дата поиска, то начинаем вычитывать данные с сайта ОЗОН
if (isset($_GET['date_query_ozon'])) {
    if ($_GET['date_query_ozon'] <> '') {
   $date_query_ozon = $_GET['date_query_ozon'];
   $smarty->assign('date_query_ozon', $date_query_ozon);

   // получаем массив всех отправления на эту дату
   $res = get_all_waiting_posts_for_need_date($token, $client_id, $date_query_ozon, "awaiting_packaging");
   
// 

// Из полученного массива формируем массив данных,$array_art   для создания Заказа в 1С.
$kolvo_tovarov = 0;
   foreach ($res['result']['postings'] as $posts) {
      foreach ($posts['products'] as $prods) 
        {
           $array_art[$prods['offer_id']]= @$array_art[$prods['offer_id']] + $prods['quantity'];
           $kolvo_tovarov = $kolvo_tovarov + $prods['quantity'];
        //    echo $prods['price']."<br>";
          $array_art_price[$prods['offer_id']] = $prods['price'];
        }
 }

//    echo "<pre>";
//    print_r($array_art);	
//    echo "<pre>";

//    echo "<pre>";
//    print_r($array_art_price);	
//    echo "<pre>";

foreach ($array_art as $key => $kolvo) {
    foreach ($array_art_price as $key_price => $price) {
        if ($key == $key_price) {
            $new_array_data[$key]['kolvo']=$kolvo;
            $new_array_data[$key]['price']=$price;
        }

   }
}

// echo "<pre>";
// print_r($new_array_data);	
// echo "<pre>";


if (isset($array_art)) {

// отправялем в шаблонизатор массив для заказ 1С 
$smarty->assign('kolvo_tovarov', $kolvo_tovarov);
$smarty->assign('array_art', $array_art);
$smarty->display('1c_zakaz.tpl');

// Создаем файл для 1С
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$i=1;
echo "<pre>";
foreach ($new_array_data as $key => $items) {


print_r($items);	


    $sheet->setCellValue("A".$i, $key);
    $sheet->setCellValue("C".$i, $items['kolvo']);
    $sheet->setCellValue("D".$i, round($items['price'], 2));

    $i++; // смешение по строкам

}

 

$objWriter = new PHPExcel_Writer_Excel2007($xls);
$objWriter->save('file.xlsx');




// отправялем в шаблонизатор массив с отправлениями
 $smarty->assign('posts', $res['result']['postings']);
 $smarty->display('main_table.tpl');
} else {
    echo "НЕТ ДАННЫХ ДЛЯ Вывода";
}
    }
}



// echo "<pre>";
// print_r($type_products);
// echo "<pre>";


$smarty->display('footer.tpl');

// $arr_list_podbo['obmen'] = list_podbora(1);
// echo "******************************************************************<br>";
// echo "<pre>";
// print_r($arr_list_podbo['obmen']['additional_data']);
// echo "<pre>";

// Создаем файл Лист подбора








?>