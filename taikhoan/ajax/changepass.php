<?php 
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
include('../config/config.php');
$oldpassword = str_text($_REQUEST['oldpassword']);
$newpassword = str_text($_REQUEST['newpassword']);
$renewpassword = str_text($_REQUEST['renewpassword']);
$username = $_SESSION['username'];

$md5oldpass = md5($oldpassword);

$info = $database->get("account", [
    "username",
    "password",
    "email",
    "cmnd",
    "secpassword",
    "phone",
    "coin"
], [
"username" => $username
]);

$oldpass = $info['password'];
if ( $oldpassword == "" || $newpassword == "" || $renewpassword == "" || $username == "")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}

if ( $oldpass != $md5oldpass )
{
$json['status'] = 1;
$json['msg'] = "Mật khẩu cũ không đúng";
echo json_encode($json);
exit();
}

if ( $newpassword != $renewpassword )
{
$json['status'] = 1;
$json['msg'] = "Mật khẩu xác nhận không trùng khớp";
echo json_encode($json);
exit();
}

$md5newpass = md5($newpassword);
$data = $database->update("account", [
	"password" => $md5newpass
], [
	"username" => $username
]);
 
if ($data) {
$json['status'] = 0;
$json['msg'] = 'Cập nhật thành công';
$json['url'] = 'index.html';

$insert = $database->insert("account_history", [
	"username" => $username,
	"Content" => "Đổi mật khẩu cấp 1",
	"timeDate" => $date
]);

} else {
$json['status'] = 1;
$json['msg'] = "Lỗi không xác định";
}
	
echo json_encode($json);
}else {
	header('Location: index.html');
	exit();
}
?>