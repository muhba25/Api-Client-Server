<?php
$url = 'localhost/RekayasaWeb/RekayasaWeb/cobapost.php';

$header = array(
'nama: Ivana',
'token: c4ca4238a0b923820dcc509a6f75849b'
);

$data = array(
'NAMA_driver' => 'Ivana Yuni Astari',
'No_HP' => '082348534653', 
'No_kendaraan' => 'DD1111IV',
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//menggunakan method post
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);

echo $result;