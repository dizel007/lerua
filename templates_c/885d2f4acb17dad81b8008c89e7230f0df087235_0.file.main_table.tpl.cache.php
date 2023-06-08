<?php
/* Smarty version 4.1.0, created on 2023-05-31 15:07:05
  from 'C:\xampp\htdocs\ozon_sm\templates\main_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_64774679aab6e6_47477471',
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
  'includes' => 
  array (
  ),
),false)) {
function content_64774679aab6e6_47477471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '85950405564774679aa39e6_76469722';
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

<?php $_smarty_tpl->_assignInScope('i', 1);?>
 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
           
          <tr class ="text14">
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
             
   <td><?php echo $_smarty_tpl->tpl_vars['post']->value['posting_number'];?>
</td> 
    <td><?php echo $_smarty_tpl->tpl_vars['post']->value['shipment_date'];?>
</td>

<td><?php echo $_smarty_tpl->tpl_vars['post']->value['status'];?>
</td>

<td>
<table class="prods_table text14">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['products'], 'prods');
$_smarty_tpl->tpl_vars['prods']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prods']->value) {
$_smarty_tpl->tpl_vars['prods']->do_else = false;
?>
    <tr>
         <td width="100" ><b><?php echo $_smarty_tpl->tpl_vars['prods']->value['offer_id'];?>
</b></td>
            <td width="840"><?php echo $_smarty_tpl->tpl_vars['prods']->value['name'];?>
</td>
      <td width="50"> <?php echo $_smarty_tpl->tpl_vars['prods']->value['quantity'];?>
</td>
    </tr>
    

 <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
 </table>
</td>

                <td><a href = "make_one_zakaz.php?date_query_ozon=<?php echo $_smarty_tpl->tpl_vars['date_query_ozon']->value;?>
&posting_number=<?php echo $_smarty_tpl->tpl_vars['post']->value['posting_number'];?>
">CC</a></td>
              
           </tr>
           <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>      
   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </tbody>
      </table>
  </div>

  <h2><a href = "make_all_zakaz.php?date_query_ozon=<?php echo $_smarty_tpl->tpl_vars['date_query_ozon']->value;?>
">Собрать все заказы</a></h2>
</div>
 <?php }
}
