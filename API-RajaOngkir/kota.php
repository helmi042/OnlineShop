<?php

$id_provinsi = $_POST['id_provinsi'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: a6b780dfe7ef30c0d9ab2e2837031834"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $res_array = json_decode($response, true);
  $res_array = $res_array['rajaongkir']['results'];
  
}

echo "<option>-- Pilih Kota --</option>";
foreach($res_array as $key => $kota){
  echo "<option 
        value='".$kota['city_id']."'
        nama_provinsi='".$kota['province']."'
        nama_kota='".$kota['city_name']."'
        type='".$kota['type']."'
        kodepos='".$kota['postal_code']."'

        >"
        .$kota['city_name']."
        </option>";
}

// echo "<pre>";
// print_r($res_array);
// echo "</pre>";