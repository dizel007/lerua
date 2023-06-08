<?php
/* Smarty version 4.1.0, created on 2023-05-31 15:07:05
  from 'C:\xampp\htdocs\ozon_sm\templates\1c_zakaz.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6477467998a820_46628263',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc4038c37644e515916e1bcb1f61679ee383c65d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\1c_zakaz.tpl',
      1 => 1684496684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6477467998a820_46628263 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4380221786477467997d645_01483410';
?>
<div class="row">
        <div class="card col-md-12 shadow mt-3 pt-1">

        
        <table class="tab_50 table table-striped ">
          <thead>
            <tr class ="text-center">
              <th width="10">пп</th>
             
              <th width="20">Артикул </th>
              <th scope="col" width="20">Количество</th>
              
                 
            </tr>
         </thead>
      <tbody>

<?php $_smarty_tpl->_assignInScope('i', 1);?>
 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_art']->value, 'posts', false, 'key');
$_smarty_tpl->tpl_vars['posts']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['posts']->value) {
$_smarty_tpl->tpl_vars['posts']->do_else = false;
?>
           
          <tr class ="text14">
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
             
   <td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td> 
    <td><?php echo $_smarty_tpl->tpl_vars['posts']->value;?>
</td>
<?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>      
   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
   <tr class ="text-center">
   <td></td>
   <td><b>Всего товаров</b></td>
   <td><b><?php echo $_smarty_tpl->tpl_vars['kolvo_tovarov']->value;?>
<b></td>
   
   </tr>
          </tbody>
      </table>
  </div>
</div><?php }
}
