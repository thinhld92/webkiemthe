<?php 
include('../config/config.php');
$user = str_text($_REQUEST['user']);
$phone = str_text($_REQUEST['phone']);


$isAccount = $database->has("Account_Info", [
	"AND" => [
			"cAccName" => $user,
			"cPhone" => $c_password
		],
]);
if ($isAccount)
{
$json['status'] = 1;
$json['msg'] = "Xác thực thành công";
echo json_encode($json);
exit();
}
$insert = $database->insert("Account_Info", [
	"cAccName" => $user,
	"cPassWord" => $c_password,
	"cPhone" => $phone,
	"dRegDate" => $phone,
]);
 
if ($insert) {
$json['status'] = 0;
$json['msg'] = 'Đăng ký thành công';
$_SESSION['username'] = $user;
echo json_encode($json);
exit();
} else {
$json['status'] = 1;
$json['msg'] = "Lỗi không xác định";
echo json_encode($json);
exit();
}
	

?>