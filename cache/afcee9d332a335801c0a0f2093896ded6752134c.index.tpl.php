<?php
/* Smarty version 4.1.0, created on 2023-05-19 10:50:36
  from 'C:\xampp\htdocs\ozon_sm\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6467385ce24037_93334106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8294ba647f7bbc4140334d732ff169a1aac799d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\index.tpl',
      1 => 1658475014,
      2 => 'file',
    ),
    'bc5ec43ade806ba097a06e7e4e88799a8dd5b446' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\header.tpl',
      1 => 1684483566,
      2 => 'file',
    ),
    '5564e4483bb74ade34f8380ad7918412148f2426' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\up_form.tpl',
      1 => 1684483976,
      2 => 'file',
    ),
    '885d2f4acb17dad81b8008c89e7230f0df087235' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\main_table.tpl',
      1 => 1684486177,
      2 => 'file',
    ),
    'cb3087ca67e3ac623c40ca97ac42deece0a32093' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ozon_sm\\templates\\footer.tpl',
      1 => 1644179667,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_6467385ce24037_93334106 (Smarty_Internal_Template $_smarty_tpl) {
?><HTML>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <script type="text/javascript" src="bootstrap.min.js"></script>

  <link href="css/orders.css" rel="stylesheet">
  <link href="css/main_table.css" rel="stylesheet">
  

<TITLE>OZON - zon zon</TITLE>

</head>

<BODY bgcolor="#ffffff">



<div class="container-fluid">

<div class="row">
  <div class="card shadow  data-windows mt-4 pt-2 pb-2">



  <form class="row gy-2 gx-3">


  <div class="col-md-1 pb-1 mt-2">
    <label class="form-label ">Тип продукции</label>
  <input type="date" name=date_query_ozon>
    
  </div>




  <div class="col-md-10">
    <button class="col-md-1 btn btn-success" type="submit">Применить</button>
  </div>
    
</form>







</div>
</div>
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

 <br />
<b>Notice</b>:  Undefined index: posts in <b>C:\xampp\htdocs\ozon_sm\templates_c\885d2f4acb17dad81b8008c89e7230f0df087235_0.file.main_table.tpl.cache.php</b> on line <b>46</b><br />
<br />
<b>Notice</b>:  Trying to get property 'value' of non-object in <b>C:\xampp\htdocs\ozon_sm\templates_c\885d2f4acb17dad81b8008c89e7230f0df087235_0.file.main_table.tpl.cache.php</b> on line <b>46</b><br />
          </tbody>
      </table>
  </div>
</div>
 

</BODY>
</HTML>
<?php }
}
