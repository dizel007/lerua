<?php
require_once "include_funcs.php"; // все функции
$smarty->display('header.tpl');
$new_array_create_sends = get_create_spisok_from_lerua($jwt_token, $smarty, $art_catalog, 'created');




$smarty->assign('link', "work_lerua/make_gruzomesta.php");
$smarty->assign('name_link', "Сформировать все отправления по грузоместам");

$smarty->assign('new_array_create_sends', $new_array_create_sends);
$smarty->display('main_table.tpl');
