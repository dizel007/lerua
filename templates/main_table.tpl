
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

{$i = 1}


 {foreach from=$new_array_create_sends item=prods}
           
          <tr class ="text14">
                <td>{$i}</td>
             
{* Нормер отправления *}
<td width="100" ><b>{$prods['id']}</b></td>
{* Дата отправления *}
<td width="100">{$prods['pickup']['pickupDate']}</td>

{* Статус отправления *}
<td width="50"> {$prods['parcelPrice']}</td>

<td>
<table class="prods_table text14">
{foreach from=$prods['products'] item=tovar}
    <tr>
   {* наименование *}
      <td width="100" ><b>{$tovar['vendorCode']}</b></td>
      {* наименование *}
      <td width="840">{$tovar['name']}</td>
      <td width="50">{$tovar['qty']}</td>
    </tr>
  {/foreach}   
 </table>
</td>

{* Собрать добавить в заказ *}
             
              
           </tr>
           {$i=$i+1}      
   {/foreach}
          </tbody>
      </table>
  </div>
<div><a href="{$link}" >{$name_link}</a></div>

</div>
 