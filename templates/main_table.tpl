
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

{$i = 1}
 {foreach from=$posts item=post}
           
          <tr class ="text14">
                <td>{$i}</td>
             
{* Нормер отправления *}
   <td>{$post['posting_number']}</td> 
{* Дата отправления *}
    <td>{$post['shipment_date']}</td>

{* Статус отправления *}
<td>{$post['status']}</td>

<td>
<table class="prods_table text14">
{foreach from=$post['products'] item=prods}
    <tr>
   {* наименование *}
      <td width="100" ><b>{$prods['offer_id']}</b></td>
      {* наименование *}
      <td width="840">{$prods['name']}</td>
      <td width="50"> {$prods['quantity']}</td>
    </tr>
    

 {/foreach} 
 </table>
</td>

{* Собрать добавить в заказ *}
                <td><a href = "make_one_zakaz.php?date_query_ozon={$date_query_ozon}&posting_number={$post['posting_number']}">CC</a></td>
              
           </tr>
           {$i=$i+1}      
   {/foreach}
          </tbody>
      </table>
  </div>

  <h2><a href = "make_all_zakaz.php?date_query_ozon={$date_query_ozon}">Собрать все заказы</a></h2>
</div>
 