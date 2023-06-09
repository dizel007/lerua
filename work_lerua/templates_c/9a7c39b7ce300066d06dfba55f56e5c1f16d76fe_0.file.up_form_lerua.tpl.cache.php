<?php
/* Smarty version 4.1.0, created on 2023-06-09 13:57:09
  from 'C:\xampp\htdocs\lerua\templates\up_form_lerua.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64831395e05a74_16383498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a7c39b7ce300066d06dfba55f56e5c1f16d76fe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lerua\\templates\\up_form_lerua.tpl',
      1 => 1686303358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64831395e05a74_16383498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '205633922064831395e03988_23744081';
?>

<div class="container-fluid">

<div class="row">
  <div class="card shadow  mt-1 pt-1 pb-1">


 <form>

<div class="col-md-12 pb-1 mt-2">

 
      <div class="col-md-4 pb-1 mt-2">
          <label class="form-label ">Дата запроса</label>
          <input required type="date" name="date_query_lerua" value="<?php echo $_smarty_tpl->tpl_vars['date_query_lerua']->value;?>
">
      </div>




  <div class="col-md-10">
    <button class="col-md-4 btn btn-success" type="submit">Применить</button>
  </div>
    
  </div>   
</form>








</div><?php }
}
