<?php
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        include('../config/config.php');
		header('Content-Type: text/html; charset=utf-8');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		set_time_limit(0);
		$captchaUser = filter_var($_REQUEST["captcha"], FILTER_SANITIZE_STRING);
		$user = $_SESSION['username'];
        $mang = str_text($_REQUEST["chonmang"]);
        $card_value = str_text($_REQUEST["card_value"]);
        $seri = str_text($_REQUEST["txtseri"]);
        $sopin = str_text($_REQUEST["txtpin"]);
		$info = $database->get("account", [
			"username",
			"secpassword",
			"password",
			"email",
			"cmnd",
			"phone",
			"coin"
		], [
		"username" => $user
		]);
		$coin_old = $info['coin'];
		
        if ( $_SESSION['CAPTCHA_CODE'] != $captchaUser)
        {
            $json['status'] = 1;
            $json['msg'] = "Mã bảo mật sai";
            echo json_encode($json);
            exit();
        }

        if ( $mang == "" || $card_value=="" || $seri =="" || $sopin =="" || $user=="" || $captchaUser== "")
        {
            $json['status'] = 1;
            $json['msg'] = "Vui lòng nhập đầy đủ thông tin";
            echo json_encode($json);
            exit();
        }
		
		if($mang==2){
				$ten = "Mobifone";
			}
		else if($mang==1){
				$ten = "Vietel";
			}
		else $ten ="Vinaphone"; //id = 3 la mang VINA
		$arrayPost = array(
			'merchant_id'=>intval($merchant_id),
			'api_email'=>trim($api_email),
			'trans_id'=>trim($trans_id),
			'card_id'=>trim($mang),
			'card_value'=> intval($card_value),
			'pin_field'=>trim($sopin),
			'seri_field'=>trim($seri),
			'algo_mode'=>'hmac'
		);
		$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);
		$arrayPost['data_sign'] = $data_sign;
		$curl = curl_init($api_url);
		curl_setopt_array($curl, array(
			CURLOPT_POST=>true,
			CURLOPT_HEADER=>false,
			CURLINFO_HEADER_OUT=>true,
			CURLOPT_TIMEOUT=>120,
			CURLOPT_RETURNTRANSFER=>true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
		));
		$data = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$result = json_decode($data,true);
		$time = time();

	   
		if($status==200){
			$amount = $result['amount'];
			switch($amount) {
				case 10000: $xu = 1000; break;
				case 20000: $xu = 2000; break;
				case 50000: $xu= 5000; break;
				case 100000: $xu = 10000; break;
				case 200000: $xu = 20000; break;
				case 500000: $xu = 50000; break;
			}
			$totalcoin = $coin_old + $xu;
			if($result['code'] == 100){
				$data = $database->update("account", [
					"coin" => $totalcoin
				], [
					"username" => $user
				]);
				$json['status'] = 0;
                $json['msg'] = "Nạp Thẻ Thành Công Với Mệnh Giá $card_value";
                $json['url'] = "card.html";
                echo json_encode($json);
                exit();
			}else{
				$json['status'] = 1;
                $json['msg'] = "Thẻ Sai Hoặc Đã Được Sử Dụng";
                echo json_encode($json);
                exit();
			}
		}
		else{ 
			$json['status'] = 1;
            $json['msg'] = "Lỗi máy chủ , vui lòng thử lại hoặc liên hệ Admin";
            echo json_encode($json);
            exit();
		}

    }else {
        header('Location: index.html');
        exit();
    }
?>