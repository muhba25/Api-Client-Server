<?php 
	header('Content-Type: application/json');

	$servername = "localhost";
	$username = "root";
	$password = "tanya ayam";
	$dbname = "gofood5";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];
	//untuk buat variabel $_PUT yang akan menyimpan $data dari curl-put yang diambil oleh parameter pertama parse str
	$headers = apache_request_headers();
	parse_str(file_get_contents('php://input'), $_PUT);
	//print_r($_PUT); die;
	//indeks harus sama dengan indeks pada curl-put.php
	//if(isset($_PUT['ID_driver'])==1){
	$nama = $headers['nama'];
	$token = $headers['token'];
	$id_driver = $_PUT['ID_driver'];
	$nama_driver = $_PUT['NAMA_driver'];
	//}

	$result = array();

	if ($smethod=='PUT') {
        	if (empty($nama)||empty($token)) {
				$result['status']['code'] = 400;
			    $result['status']['description'] = 'Error Headers';
			}
			else {

        		$sql = "SELECT COUNT(nama) as jumlah FROM `api-users` where nama = '$nama' AND token = '$token'";
        		$result1 = $conn->query($sql);
        		$cek = $result1->fetch_assoc();

       			if ($cek['jumlah'] == 0) {
						$result['status']['code'] = 400;
					    $result['status']['description'] = 'wrong Token';	        
				}
				else
				{	

		            $result['status']['code'] = 'success';
		            $result['status']['description'] = 'Request OK';
					$sql = "UPDATE driver SET NAMA_driver ='$nama_driver' WHERE ID_driver='$id_driver';";
					$conn->query($sql);
					$result['results'] = 'id '.$id_driver.' row updated';
			}
				
        }
	}
        else{
            $result['status']['code'] = 400;
            $result['status']['description'] = 'Error Request';
        }

        echo json_encode($result);
