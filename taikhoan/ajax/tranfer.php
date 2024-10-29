<?php 
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
		{ 	
		
		include('../config/config.php');
		$captchaUser = filter_var($_REQUEST["captcha"], FILTER_SANITIZE_STRING);
		$username = $_SESSION['username'];
		$date = date("Y-m-d h:i:sa");
		$coin = intval(str_text($_REQUEST["coin"]));
		$xu = intval(str_text($_REQUEST["xu"])); // so xu chuyen
        $username_nhan = str_text($_REQUEST["username_nhan"]); // tai khoan nhan

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
       
        $isAccount = $database->has("account", [
            "loginName" => $username_nhan
        ]);

        if(!$isAccount)
        {
            $json['status'] = 1;
            $json['msg'] = "Tài khoản không tồn tại trong hệ thống";
            echo json_encode($json);
            exit();     
        }


        if ($username ==  $username_nhan)
		{
		$json['status'] = 1;
		$json['msg'] = "Không thể tự chuyển xu cho mình";
		echo json_encode($json);
		exit();
		}

		if ($dataUser['xu'] <  $xu)
		{
		$json['status'] = 1;
		$json['msg'] = "Tài khoản bạn không đủ XU để chuyển";
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

		if ( $coin == "" || $xu=="" || $captchaUser== "" || $username_nhan == "")
		{
		$json['status'] = 1;
		$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
		echo json_encode($json);
		exit();
		}

    
		 /// update coin user chuyển
		$updateUser = $database->update("account", [
			"xu[-]" => $xu,
		],
            [
                "loginName" => $username
            ]);

            /// update coin user chuyển
		$updateUserNhan = $database->update("account", [
			"xu[+]" => $xu,
		],
            [
                "loginName" => $username_nhan
            ]);
		


		$content  = "Chuyển $xu Xu  sang tài khoản $username_nhan";

        $insert_log = $database->insert("chuyenxu_log", [
            "username" => $username,
            "xuchuyen" => $xu,
            "username_nhan" => $username_nhan,
            "thoigian" => $date
        ]);
		
		AddUserHistory($username,$content);
		$json['status'] = 0;
		$json['msg'] = "Chuyển $xu Xu  sang tài khoản $username_nhan";
		$json['url'] = "tranfer.html";
		echo json_encode($json);
		exit();
			
		}else {
		header('Location: index.html');
		exit();
		}
		?>