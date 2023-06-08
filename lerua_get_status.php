<?php
echo "START LEROY <br>";

$id_parcel = "MP3271881-001";
$dop_link = '/statuses';
$link = 'https://api.leroymerlin.ru/marketplace/merchants/v1/parcels/'.$id_parcel.$dop_link;
$jwt_token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjE5NjU5IiwibmFtZSI6ItCX0LXQu9C40LfQutC-INCU0LzQuNGC0YDQuNC5IiwibG9naW4iOiJ0ZW5kZXJAYW5tYWtzLnJ1Iiwicm9sZXMiOlsibWVyY2hhbnQiLCJtcF9tYW5hZ2VyIl0sIm1lcmNoYW50X2lkIjoiMjYxOSIsIm1lcmNoYW50SWQiOiIyNjE5IiwiaWF0IjoxNjg1NTM5MjU1LCJqdGkiOiI3NTA2YjU1Zi1lYjNmLTQ1YWEtYmY5MS01MWExYzQ5YzcyNmUifQ.1SKrLVm_vio4Q5oksQSlFt4f6iqPdHUDCSc-w2xtW_g';

$ch = curl_init($link);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: b1VSXCMYNYr6H3h0pBLaUczXYEATcS58',
		'Content-Type: application/json',
		"Authorization: Bearer $jwt_token"
    ));
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $send_data); 

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

// $send_data_arr_js = json_encode($send_data);

   
// echo "<pre>";
//    print_r($send_data_arr_js);	
// echo "<pre>";


   die('<br>LERUA DIE');
?>
