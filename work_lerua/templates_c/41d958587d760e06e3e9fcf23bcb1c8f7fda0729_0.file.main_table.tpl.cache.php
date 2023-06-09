<?php
/* Smarty version 4.1.0, created on 2023-06-09 13:57:09
  from 'C:\xampp\htdocs\lerua\templates\main_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64831395dee7b5_87593909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41d958587d760e06e3e9fcf23bcb1c8f7fda0729' => 
    array (
      0 => 'C:\\xampp\\htdocs\\lerua\\templates\\main_table.tpl',
      1 => 1686298101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64831395dee7b5_87593909 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '147346545164831395dd93d2_14955157';
?>

<div class="row">
        <div class="card col-md-12 shadow mt-3 pt-1">
        <table class="table table-striped table-sm">
          <thead>
            <tr class ="text-center">
              <th width="10">пп</th>
             
              <th width="20">Нормер отправления</th>
              <th scope="col" width="20">Дата отправления</th>
              <th scope="col" width="10">Сумма отправления</th>
              <th scope="col" width="900">Продукция</th>
             
                 
            </tr>
         </thead>
      <tbody>

<?php $_smarty_tpl->_assignInScope('i', 1);?>


 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_array_create_sends']->value, 'prods');
$_smarty_tpl->tpl_vars['prods']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prods']->value) {
$_smarty_tpl->tpl_vars['prods']->do_else = false;
?>
           
          <tr class ="text14">
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
             
<td width="100" ><b><?php echo $_smarty_tpl->tpl_vars['prods']->value['id'];?>
</b></td>
<td width="100"><?php echo $_smarty_tpl->tpl_vars['prods']->value['pickup']['pickupDate'];?>
</td>

<td width="50"> <?php echo $_smarty_tpl->tpl_vars['prods']->value['parcelPrice'];?>
</td>

<td>
<table class="prods_table text14">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prods']->value['products'], 'tovar');
$_smarty_tpl->tpl_vars['tovar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tovar']->value) {
$_smarty_tpl->tpl_vars['tovar']->do_else = false;
?>
    <tr>
         <td width="100" ><b><?php echo $_smarty_tpl->tpl_vars['tovar']->value['vendorCode'];?>
</b></td>
            <td width="840"><?php echo $_smarty_tpl->tpl_vars['tovar']->value['name'];?>
</td>
      <td width="50"><?php echo $_smarty_tpl->tpl_vars['tovar']->value['qty'];?>
</td>
    </tr>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
 </table>
</td>

             
              
           </tr>
           <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>      
   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </tbody>
      </table>
  </div>
<div><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
" ><?php echo $_smarty_tpl->tpl_vars['name_link']->value;?>
</a></div>

</div>
 <?php }
}
