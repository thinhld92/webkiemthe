<?php 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
include('../config/config.php');
$user = str_text($_REQUEST['username']);
$password = str_text($_REQUEST['password']);
$c_password = md5($password);

if ( $user == "" || $password == "")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}
$isAccount = $database->has("account", [
	"AND" => [
	"username" => $user,
	"password" => $c_password
		],
]);
if ($isAccount) {
$json['status'] = 0;
$json['msg'] = 'Login thành công';
$json['url'] = 'index.html';
$_SESSION['username'] = $user;
$ip = getIP();
$content =  "Đăng nhập thành công IP  : $ip";
   AddUserHistory($user,$content);
} else {
$json['status'] = 1;
$json['msg'] = "Sai thông tin đăng nhập";
}
echo json_encode($json);
exit();

}else {
	header('Location: index.html');
	exit();
}
?>