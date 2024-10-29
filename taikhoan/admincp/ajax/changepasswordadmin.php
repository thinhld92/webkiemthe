<?php 
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
	include('../../config/config.php');
	$user = $_REQUEST['user'];
	$password = $_REQUEST['password'];
	$repassword = $_REQUEST['repassword'];
	$cpass = md5($password);
	if ( $password != $repassword)
	{
	$return['type'] = 1;
	$return['msg'] =  "Nhập lại mật khẩu không đúng";	
	echo json_encode($return);
	exit();
	}
	$data = $database->update("admin", [
	"password" => $cpass
	], [
	"username" => $user
	]);
	
	$admin = $_SESSION['username_admin'];
	$content ="Đổi mật khẩu tài khoản  : $user";
	logAdmin($admin,$content);
	
	$return['type'] = 0;
	$return['msg'] =  "Đổi mật khẩu thành công";	
	echo json_encode($return);
	exit();
	
		}else {
	header('Location: index.html');
	exit();
}
	
?>