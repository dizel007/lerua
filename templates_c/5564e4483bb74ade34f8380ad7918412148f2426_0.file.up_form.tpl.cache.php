<?php
/* Smarty version 4.1.0, created on 2023-06-01 09:30:34
  from 'C:\xampp\htdocs\ozon_sm\templates\up_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6478491a8fc0c2_02376896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5564e4483bb74ade34f8380ad7918412148f2426' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\up_form.tpl',
      1 => 1684659944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6478491a8fc0c2_02376896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15244747976478491a8f4a46_39898254';
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
          <input required type="date" name="date_query_ozon" value="<?php echo $_smarty_tpl->tpl_vars['date_query_ozon']->value;?>
">
      </div>




  <div class="col-md-10">
    <button class="col-md-4 btn btn-success" type="submit">Применить</button>
  </div>
    
  </div>   
</form>








</div><?php }
}
