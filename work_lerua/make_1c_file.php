<?php
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
$date_time = date("Y-m-d");
$link_list_tovarov = '../EXCEL/'.$date_time.'-list_tovarov.xlsx';
$objWriter->save($link_list_tovarov);

