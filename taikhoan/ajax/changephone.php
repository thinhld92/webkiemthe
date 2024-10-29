<?php 
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
	{ 
		include('../config/config.php');
		$newphone = str_text($_REQUEST['newphone']);
		$pass1 = str_text($_REQUEST['pass1']);
		$email = str_text($_REQUEST['email']);
		$pass2 = str_text($_REQUEST['pass2']);
		$username = $_SESSION['username'];
		$c_password = md5($pass1);
		if ( $newphone == "" || $pass1 == "" || $email == "" || $pass2 == "" || $username == "")
		{
			$json['status'] = 1;
			$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
			echo json_encode($json);
			exit();
		}
		$isAccount = $database->has("Account_Info", [
		"AND" => [
		"cAccName" => $username,
		"cPassWord" => $c_password,
		"Email" => $email,
		"Pass2" => $pass2,
		],
		]);
		
		if (!$isAccount)
		{
			$json['status'] = 1;
			$json['msg'] = "Thông tin nhập vào không chính xác";
			echo json_encode($json);
			exit();
		}
		else{ $data = $database->update("Account_Info", [
			"cPhone" => $newphone
			], [
			"cAccName" => $username
			]);
			
			if ($data) {
				$json['status'] = 0;
				$json['msg'] = 'Cập nhật thành công';
				$json['url'] = 'thong-tin-tai-khoan.html';
				
				$insert = $database->insert("History", [
				"cAccName" => $username,
				"Content" => "Thay đổi số điện thoại  : $newphone ",
				"timeDate" => $date
				]);
				
				} else {
				$json['status'] = 1;
				$json['msg'] = "Lỗi không xác định";
			}
		}
		
		echo json_encode($json);
		}else {
		header('Location: index.html');
		exit();
	}
?>