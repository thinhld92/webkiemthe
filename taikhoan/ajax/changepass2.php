<?php 
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
include('../config/config.php');
$oldpassword2 = str_text($_REQUEST['oldpassword2']);
$email = str_text($_REQUEST['email']);
$cmnd = str_text($_REQUEST['cmnd']);
$newpassword2 = str_text($_REQUEST['newpassword2']);
$renewpassword2 = str_text($_REQUEST['renewpassword2']);
$username = $_SESSION['username'];

$md5Passsold = md5($oldpassword2);
$md5Passsnew = md5($newpassword2);

$info = $database->get("account", [
    "username",
    "secpassword",
    "password",
    "email",
    "cmnd",
    "phone",
    "coin"
], [
"username" => $username
]);

if ( $oldpassword2 == "" || $newpassword2 == "" || $renewpassword2 == "" || $username == ""  || $cmnd == "" || $email == "")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}
$oldpasss2 = $info['secpassword'];
if ( $md5Passsold != $oldpasss2 )
{
$json['status'] = 1;
$json['msg'] = "Mật khẩu cấp 2 cũ không đúng";
echo json_encode($json);
exit();
}

$email_db = $info['email'];
$cmnd_db = $info['cmnd'];
if ( $email != $email_db || $cmnd_db != $cmnd )
{
$json['status'] = 1;
$json['msg'] = "Thông tin tài khoản không đúng";
echo json_encode($json);
exit();
}

if ( $newpassword2 != $renewpassword2 )
{
$json['status'] = 1;
$json['msg'] = "Mật khẩu xác nhận không trùng khớp";
echo json_encode($json);
exit();
}


$data = $database->update("account", [
	"secpassword" => $md5Passsnew
], [
	"username" => $username
]);
 
if ($data) {
$json['status'] = 0;
$json['msg'] = 'Cập nhật thành công';
$json['url'] = 'index.html';
$content =  "Đổi mật khẩu cấp 2 : $newpassword2";
   AddUserHistory($username,$content);

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