<?php
$url = 'localhost/RekayasaWeb/RekayasaWeb/cobaput.php';

$header = array(
'nama: Ivana',
'token: c4ca4238a0b923820dcc509a6f75849b'
);

$data = array(
'ID_driver' => '9',
'NAMA_driver' => 'Ivana Yuni Astari'
);

$ch = curl_init();
//tentukan url tujuan
curl_setopt($ch, CURLOPT_URL, $url);
//mengabaikan ssl sertification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//request yang diterima di cobaput, ubah jadi PUT tapi tetap POST cara pengirimannya
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
//untuk masuk ke API atau autentifikasi karena kalau tidak server bisa down
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//berisi body atau data dalam array
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//jalankan semua fungsi curl 
$result = curl_exec($ch);

echo $result;