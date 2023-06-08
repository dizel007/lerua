<?php

/*
*Функция запроса c передаваемыми данными  
*/ 

function query_with_data ($jwt_token, $link, $data_send, $message) {
$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: b1VSXCMYNYr6H3h0pBLaUczXYEATcS58',
        'Content-Type: application/json',
        'User-Agent: PostmanRuntime/7.32.2',
		"Authorization: Bearer $jwt_token"
    ));
  
  

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_send);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $res11 = curl_exec($ch);

   $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

	curl_close($ch);
	
	$res11 = json_decode($res11, true);

    echo     "Результат обмена [".$message."] : ".$http_code. "<br>";

// echo "<pre>";
//    print_r($res11);	
// echo "<pre>";
return $res11;
}

/*
*Функция запроса без данных 
*/ 

function light_query_without_data ($jwt_token, $link, $message) {
$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: b1VSXCMYNYr6H3h0pBLaUczXYEATcS58',
		'Content-Type: application/json',
		"Authorization: Bearer $jwt_token"
    ));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);

   $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код
   curl_close($ch);
	
	$res = json_decode($res, true);

    echo     "Результат обмена [".$message."] : ".$http_code. "<br>";

    return $res;
}


/*
*Функция которая в зависимости от товара разбивает его по количеству
*/ 
function make_right_posts_gruzomesta ($id_post, $post_array) {

// разбиваем товары согласно грузоместам
foreach ($post_array as $post) {
    // print_r ($post);
    $array_tovar['products'][0] = array(
          "sku" => $post['lmId'],
          "quantity" => $post['qty']
        );

$data_send[] = $array_tovar;
}

return $data_send;

};


function make_right_posts_gruzomesta_NEW ($id_post, $post_array) {
$const_K_12 = 12;
$const_K_16 = 16;
$const_K_8 = 8;

$sku_K_12 = 90502007;
$sku_K_16 = 90502006;
$sku_K_8 = 90502008;



// формируем массив для каждой позиции товара
foreach ($post_array as $products) {

    for ($i=0; $i < $products['qty']; $i++) {
        // echo "i-".$i."<br>";

/* 
  7260 >= 12 штук 
 */
  if ( ($products['lmId'] == $sku_K_12 ) AND ($products['qty'] >= $const_K_12 ) ) {
    $array_tovar['products'][0] = array(
        "sku" => $products['lmId'],
        "quantity" => $const_K_12
      );
      $data_send[] = $array_tovar;
            $i = $i - 1 ; // увеличиваем на количество товаров в упаковке
            $products['qty'] = $products['qty'] - $const_K_12;

 /* 
  7260 МЕНЕЕ 12 штук 
 */

    } elseif ( ($products['lmId'] == $sku_K_12 ) AND ($products['qty'] < $const_K_12 ) ) {

        $array_tovar['products'][0] = array(
            "sku" => $products['lmId'],
            "quantity" => $products['qty']
          );
          $data_send[] = $array_tovar;
          $i=$i + $products['qty']; // все товары закидываем в последнюю посылку
   

    /*
     *****   7245  >=16 штук  *******************************
      */
        }  elseif ( ($products['lmId'] == $sku_K_16 ) AND ($products['qty'] >= $const_K_16 ) ) {

            $array_tovar['products'][0] = array(
                "sku" => $products['lmId'],
                "quantity" => $const_K_16
              );
        $data_send[] = $array_tovar;
        $i=$i - 1; // увеличиваем на количество товаров в упаковке
        $products['qty'] = $products['qty'] - $const_K_16;


 /* 
  7245 МЕНЕЕ 16 штук 
 */

} elseif ( ($products['lmId'] == $sku_K_16 ) AND ($products['qty'] < $const_K_16 ) ) {

    $array_tovar['products'][0] = array(
        "sku" => $products['lmId'],
        "quantity" => $products['qty']
      );
      $data_send[] = $array_tovar;

  $i=$i + $products['qty']; // все товары закидываем в последнюю посылку
  
    
    /* ********************************   Смотрим есть ли у нас метровый бордюр 7280-К-8 в количество 8 штук  ******************************* */
        }      elseif ( ($products['lmId'] == $sku_K_8 ) AND ($products['qty'] >= $const_K_8 ) ) {
        
            $array_tovar['products'][0] = array(
                "sku" => $products['lmId'],
                "quantity" => $const_K_8
              );
        $data_send[] = $array_tovar;
                $i=$i - 1; // увеличиваем на количество товаров в упаковке
                $products['qty'] = $products['qty'] - $const_K_8;
                
                }
 /* 
  7245 МЕНЕЕ 16 штук 
 */

 elseif ( ($products['lmId'] == $sku_K_8 ) AND ($products['qty'] < $const_K_8 ) ) {

    $array_tovar['products'][0] = array(
        "sku" => $products['lmId'],
        "quantity" => $products['qty']
      );
      $data_send[] = $array_tovar;

  $i=$i + $products['qty']; // все товары закидываем в последнюю посылку
       
  
  // Все остальгные отправления делаем по 1 штуке
} else {
    $array_tovar['products'][0] = array(
        "sku" => $products['lmId'],
        "quantity" => 1
      );
      $data_send[] = $array_tovar;
            
        }
             }
}

// echo "<pre>";
// print_r($data_send);
// echo "<pre>";
return $data_send;
}