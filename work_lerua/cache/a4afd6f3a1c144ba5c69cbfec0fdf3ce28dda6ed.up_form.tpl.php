<?php
/* Smarty version 4.1.0, created on 2023-06-09 11:35:08
  from 'C:\xampp\htdocs\lerua\templates\up_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6482f24cd6f654_70446449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '933dad8087286be4f9945768dc92e86020094938' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lerua\\templates\\up_form.tpl',
      1 => 1686297086,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_6482f24cd6f654_70446449 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid">

<div class="row">
  <div class="card shadow  mt-1 pt-1 pb-1">


 <form>

<div class="col-md-12 pb-1 mt-2">

 
      <div class="col-md-4 pb-1 mt-2">
      <label class="form-label ">Тип запроса</label>
          <select required name="type_query" >
              <option value="888">Сформировать отправление</option>
              <option value="555">Напечатать этикетки</option>
          </select>
      </div>

      <div class="col-md-4 pb-1 mt-2">
          <label class="form-label ">Дата запроса</label>
          <input required type="date" name="date_query_ozon" value="<br />
<b>Notice</b>:  Undefined index: date_query_lerua in <b>C:\xampp\htdocs\lerua\work_lerua\templates_c\933dad8087286be4f9945768dc92e86020094938_0.file.up_form.tpl.cache.php</b> on line <b>48</b><br />
<br />
<b>Notice</b>:  Trying to get property 'value' of non-object in <b>C:\xampp\htdocs\lerua\work_lerua\templates_c\933dad8087286be4f9945768dc92e86020094938_0.file.up_form.tpl.cache.php</b> on line <b>48</b><br />
">
      </div>




  <div class="col-md-10">
    <button class="col-md-4 btn btn-success" type="submit">Применить</button>
  </div>
    
  </div>   
</form>








</div><?php }
}
