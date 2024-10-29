		<?php 
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
		{ 	
		
		include('../config/config.php');
		$captchaUser = filter_var($_REQUEST["captcha"], FILTER_SANITIZE_STRING);
		$username = $_SESSION['username'];
		$date = date("Y-m-d h:i:sa");
		$coin = intval(str_text($_REQUEST["coin"]));
		$xu = intval(str_text($_REQUEST["xu"]));

		$dataUser = $database->get("account", [
			"loginName",
			"password_hash",
			"email",
			"cmnd",
			"safecode",
			"pass2",
			"fone",
			"xu"
		], [
		"loginName" => $username
		]);


		
		if ($dataUser['xu'] <  $xu)
		{
		$json['status'] = 1;
		$json['msg'] = "Tài khoản bạn không đủ XU để đổi";
		echo json_encode($json);
		exit();
		}
		
		if ( $_SESSION['CAPTCHA_CODE'] != $captchaUser)
		{
		$json['status'] = 1;
		$json['msg'] = "Mã bảo mật sai";
		echo json_encode($json);
		exit();
		}
		
		if ( !is_numeric($coin) || !is_numeric($xu) || $coin <= 0 || $xu <= 0 )
		{
		$json['status'] = 1;
		$json['msg'] = "Cần nhập vào số lớn hơn 0";
		echo json_encode($json);
		exit();
		}

		if ( $coin == "" || $xu=="" || $captchaUser== "")
		{
		$json['status'] = 1;
		$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
		echo json_encode($json);
		exit();
		}
        $tyle = 1000;
        $coinEx = $xu * $tyle;
		 /// update coin
		$updateUser = $database->update("account", [
			"xu[-]" => $xu,
		],
            [
                "loginName" => $username
            ]);
		
		$ExCoin = $database->insert("jxsf8_paycoin", [
				"account" => $username,
				"jbcoin" => $coinEx
			]);	

		$content  = "Đổi $xu Xu  vào game nhận $coinEx";
		
		AddUserHistory($username,$content);
		$json['status'] = 0;
		$json['msg'] = "Đổi $xu Xu  vào game nhận $coinEx";
		$json['url'] = "recharge.html";
		echo json_encode($json);
		exit();
			
		}else {
		header('Location: index.html');
		exit();
		}
		?>