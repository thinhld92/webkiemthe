<?php 
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{ 
	include('../../config/config.php');


	$username = $_REQUEST['username'];
	$cmnd = $_REQUEST['cmnd'];
	$email = $_REQUEST['email'];
	$xu = $_REQUEST['xu'];
	$pass1 = $_REQUEST['pass1'];
	$pass2 = $_REQUEST['pass2'];
    $md5_pass1 = md5($pass1);
	$md5_pass2 = md5($pass2);
	

	$data = $database->update("account", [
	"cmnd" => $cmnd,
	"email" => $email,
	"coin" => $xu,
	"password" => $md5_pass1,
	"secpassword" => $md5_pass2

	], [
	"username" => $username
	]);
	
	
	
	if ($data)
	{
	$admin = $_SESSION['username_admin'];
	$content = "Sửa thông tin tài khoản  : $username";
	logAdmin($admin,$content);
	$return['type'] = 0;
	$return['msg'] =  "Cập nhật thông tin thành công";	
	echo json_encode($return);
	exit();
	
	}else {
	$return['type'] = 1;
	$return['msg'] =  "Lỗi Update";	
	echo json_encode($return);
	exit();
	}
				}else {
	header('Location: index.html');
	exit();
}
	
?>