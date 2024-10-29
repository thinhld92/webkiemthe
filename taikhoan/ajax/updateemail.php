

<?php 
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
include('../config/config.php');
$email = str_text($_REQUEST['email']);
$cmnd = str_text($_REQUEST['cmnd']);
$username = $_SESSION['username'];

if ( $email == "" || $username == "" || $cmnd == "")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}

$data = $database->update("account", [
	"email" => $email,
	"cmnd" => $cmnd
], [
	"username" => $username
]);
 
if ($data) {
$json['status'] = 0;
$json['msg'] = 'Cập nhật thành công';
$json['url'] = 'update-password-2.html';
$content =  "Cập nhật Email : $email , cmnd  : $cmnd";
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