<?php 
	header('Content-Type: application/json');

	$servername = "localhost";
	$username = "root";
	$password = "tanya ayam";
	$dbname = "gofood5";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$smethod = $_SERVER['REQUEST_METHOD'];
	$headers = apache_request_headers();
	if(isset($_POST['NAMA_driver'])==1){
		$nama = $headers['nama'];
		$token = $headers['token'];
		$nama_driver = $_POST['NAMA_driver'];
		$no_hp = $_POST['No_HP'];
		$no_kendaraan = $_POST['No_kendaraan'];	
	}
	
	$result = array();

	if ($smethod=='POST') {
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
					$sql = "INSERT INTO driver (NAMA_driver, No_HP, No_kendaraan) VALUES ('$nama_driver', '$no_hp', '$no_kendaraan');";
					$conn->query($sql);
					$result['results'] = '1 row inserted';
			}
				
        }
	}
        else{
            $result['status']['code'] = 400;
            $result['status']['description'] = 'Error Request';
        }

        echo json_encode($result);
