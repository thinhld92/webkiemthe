<?php
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
include('../config/config.php');
$user = str_text($_REQUEST['username']);
$password = str_text($_REQUEST['password']);
$phone = str_text($_REQUEST['phone']);
$re_password = str_text($_REQUEST['password_confirmation']);
//$captcha = trim($_REQUEST['captcha']);
$c_password = md5($password);
$captchaUser = filter_var($_REQUEST["captcha"], FILTER_SANITIZE_STRING);



if (strlen($password) <  6 || strlen($password) > 36 )
{
$json['status'] = 1;
$json['msg'] = "Mật khẩu cần ít nhất 6 ký tự và nhỏ hơn 36 ký tự";
echo json_encode($json);
exit();
}


if ($password!= $re_password )
{
$json['status'] = 1;
$json['msg'] = "Password xác nhận sai";
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

if ( $user == "" || $password == "")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}

$isAccount = $database->has("account", [
			"username" => $user
]);
if ($isAccount)
{
$json['status'] = 1;
$json['msg'] = "Tài khoản này đã tồn tại";
echo json_encode($json);
exit();
}

$insert = $database->insert("account", [
	"username" => $user,
	"password" => $c_password,
    "dateCreate" => $date,
	"phone" => $phone,
	"rowpass" => $password,
	"coin"=> $int_xu

]);

if ($insert) {
$ip = getIP();
$json['status'] = 0;
$json['msg'] = 'Đăng ký thành công';
$json['url'] = 'index.html';
$content = "Đăng ký tài khoản $user tại IP : $ip ";
AddUserHistory($user,$content);
$_SESSION['username'] = $user;
echo json_encode($json);
exit();
} else {
$json['status'] = 1;
$json['msg'] = "Lỗi không xác định";
echo json_encode($json);
exit();
}
	
}else {
	header('Location: index.html');
	exit();
}
?>