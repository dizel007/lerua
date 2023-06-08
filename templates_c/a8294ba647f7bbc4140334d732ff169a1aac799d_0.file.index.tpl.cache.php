<?php
/* Smarty version 4.1.0, created on 2023-05-19 10:50:36
  from 'C:\xampp\htdocs\ozon_sm\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6467385cdd6826_48272626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8294ba647f7bbc4140334d732ff169a1aac799d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\index.tpl',
      1 => 1658475014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:up_form.tpl' => 1,
    'file:main_table.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6467385cdd6826_48272626 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1730716566467385cda8cb9_18846751';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:up_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
$_smarty_tpl->_subTemplateRender("file:main_table.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>'foo'), 0, false);
?>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
