<?php 
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
include('../config/config.php');
$pass2new = str_text($_REQUEST['pass2new']);
$repass2new = str_text($_REQUEST['repass2new']);
$username = $_SESSION['username'];
$md5Passsnew = md5($pass2new);

if ( $pass2new == "" || $username == "" || $repass2new =="")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}

if ( $pass2new !=  $repass2new)
{
$json['status'] = 1;
$json['msg'] = "Xác nhận mật khẩu không chính xác";
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
$content =  "Cập nhật Mật Khẩu Cấp 2";
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