<?php
$origin = 326;
$destination = $_POST['kota'];
$weight = $_POST['berat'];
$courier = $_POST['kurir'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=". $origin ."&destination=". $destination ."&weight=". $weight ."&courier=". $courier,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
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
  $res_array = $res_array['rajaongkir']['results'][0];
  
}

$kurir = $res_array['name'];

foreach($res_array['costs'] as $r){
  echo "<option value='". $r['cost'][0]['value'] ."'>" . $r['service'] . " Rp.". number_format($r['cost'][0]['value']) .  " " . $r['cost'][0]['etd'] .  "Hari </option>";
}

echo "<pre>";
print_r($res_array);
echo "</pre>";