<?php
echo "START LE111ROY <br>";

// $id_parcel = "MP3240165-001";
$id_parcel = "MP3281993-001";

$dop_link = '/boxes';
$link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;
$jwt_token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE5NjU5IiwibmFtZSI6ItCX0LXQu9C40LfQutC-INCU0LzQuNGC0YDQuNC5IiwibG9naW4iOiJ0ZW5kZXJAYW5tYWtzLnJ1Iiwicm9sZXMiOlsibWVyY2hhbnQiLCJtcF9tYW5hZ2VyIl0sIm1lcmNoYW50X2lkIjoiMjYxOSIsIm1lcmNoYW50SWQiOiIyNjE5IiwiaWF0IjoxNjg1NTM5MjU1LCJqdGkiOiI3NTA2YjU1Zi1lYjNmLTQ1YWEtYmY5MS01MWExYzQ5YzcyNmUifQ.1SKrLVm_vio4Q5oksQSlFt4f6iqPdHUDCSc-w2xtW_g';







$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: b1VSXCMYNYr6H3h0pBLaUczXYEATcS58',
		"Authorization: Bearer $jwt_token"
    ));
//   curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data); 

//    curl_setopt($ch, CURLOPT_POST, 1);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$res = curl_exec($ch);

   $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

	curl_close($ch);
	
	$res = json_decode($res, true);

   echo     'Результат обмена : '.$http_code. "<br>";

echo "<pre>";
   print_r($res);	
echo "<pre>";
// *********************************************************************************
// $new_res[0] = array(
//    'id'=> $id_parcel
//      );

// $new_res[1] = array(
//       'id'=> $id_parcel
//         );
$item1 = array (
   'sku' => 90502006,
   'quantity' => 5

  );
  $item2 = array (
   'sku' => 90502006,
   'quantity' => 7

  );

$pppp = '
[
     {
       "products": [{
               "sku": "90502006",
               "quantity": 6
           }]
     },
     {
       "products": [{
               "sku": "90502006",
               "quantity": 6
           }]

         }
   ]
';
$pppp11 = json_decode($pppp, true);


   $new_res[]['products'] = array($item1);
   $new_res[]['products'] = array($item2);
// *********************************************************************************
   //  $new_res[0]['products'][] = $item1;

   //  $new_res[0]['products'][] = $item2;
   //  $new_res[0]['products'][] = $item3;
   //  $new_res[0]['products'][] = $item4;
 

    //  $new_res[] = $item1;
    //  $new_res[] = $item2;
 
//     echo "НОВЫЙ МАССИВ<br>";
// print_r($pppp);
// echo "НОВЫЙ МАССИВ JSON <br>";
// $send_data_arr_js =json_encode($new_res);

// $send_data_arr_js = http_build_query($new_res, '', '&');

// echo($send_data_arr_js);	


echo("<br>ЭТАЛО");	
echo($pppp);	

die();

echo "<br>";

$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: b1VSXCMYNYr6H3h0pBLaUczXYEATcS58',
        'Content-Type: application/json',
        'User-Agent: PostmanRuntime/7.32.2',
		"Authorization: Bearer $jwt_token"
    ));
  
  

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $pppp);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $res11 = curl_exec($ch);

   $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Получаем HTTP-код

	curl_close($ch);
	
	$res11 = json_decode($res11, true);

   echo     '<b>Результат обмена : '.$http_code. "</b><br>";

echo "<pre>";
   print_r($res11);	
echo "<pre>";









   die('<br>LERUA DIE');
?>
