<?php

require_once 'functions/torpen.php';
require_once 'functions/make_zakaz_new.php';
require_once "functions/func_send_inj_in_ozon.php";
require_once 'functions/get_all_waiting_send.php';
require_once 'functions/make_all_etiketki.php';

/*
Подключаем PHPExcel
*/
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';

/**
 * Лист подбора
 */
require_once 'functions/list_podbora.php';