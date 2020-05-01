<?php
$url = 'localhost/RekayasaWeb/RekayasaWeb/cobaget.php';

$header = array(
'nama: Ivana',
'token: c4ca4238a0b923820dcc509a6f75849b'
);


$data = array (
    'key' => '9'
    );
    
    $params = http_build_query($data);

$ch = curl_init();

//tentukan url tujuan
curl_setopt($ch, CURLOPT_URL, $url.'?'.$params );
//mengabaikan ssl sertification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//untuk masuk ke API atau autentifikasi
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);

echo $result;





