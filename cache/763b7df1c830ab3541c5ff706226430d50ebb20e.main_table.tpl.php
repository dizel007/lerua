<?php
/* Smarty version 4.1.0, created on 2023-05-31 15:07:05
  from 'C:\xampp\htdocs\ozon_sm\templates\main_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64774679ab3599_51301043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '885d2f4acb17dad81b8008c89e7230f0df087235' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\main_table.tpl',
      1 => 1684490692,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_64774679ab3599_51301043 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
        <div class="card col-md-12 shadow mt-3 pt-1">
        <table class="table table-striped table-sm">
          <thead>
            <tr class ="text-center">
              <th width="10">пп</th>
             
              <th width="20">Нормер отправления</th>
              <th scope="col" width="20">Дата отправления</th>
              <th scope="col" width="10">Статус отправления</th>
              <th scope="col" width="900">Продукция</th>
              <th scope="col" width="60">Собрать</th>
                 
            </tr>
         </thead>
      <tbody>

            
          <tr class ="text14">
                <td>1</td>
             
   <td>0120791983-0014-1</td> 
    <td>2023-06-01T11:00:00Z</td>

<td>awaiting_packaging</td>

<td>
<table class="prods_table text14">
    <tr>
         <td width="100" ><b>1940-10</b></td>
            <td width="840">Крепящий якорь к бордюру ANMAKS Кантри. Оцинкованная сталь. 10 штук, арт. 1940-10</td>
      <td width="50"> 1</td>
    </tr>
    

  
 </table>
</td>

                <td><a href = "make_one_zakaz.php?date_query_ozon=2023-06-01&posting_number=0120791983-0014-1">CC</a></td>
              
           </tr>
                 
             </tbody>
      </table>
  </div>

  <h2><a href = "make_all_zakaz.php?date_query_ozon=2023-06-01">Собрать все заказы</a></h2>
</div>
 <?php }
}
