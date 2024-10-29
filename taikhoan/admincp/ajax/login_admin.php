<?php 
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
	include('../../config/config.php');
$username = trim($_REQUEST['username']);
$password = trim($_REQUEST['password']);
$c_password = md5($password);

if ( $username == "" || $password == "")
{
$json['status'] = 1;
$json['msg'] = "Vui lòng nhập đầy đủ thông tin";
echo json_encode($json);
exit();
}
$isAccount = $database->has("admin", [
	"AND" => [
			"username" => $username,
			"password" => $c_password
		],
]);
 
if ($isAccount) {
	$_SESSION['username_admin'] = $username;
	$ip = getIP();
	$admin = $_SESSION['username_admin'];
	$content = "Đăng nhập tại IP : $ip";
	logAdmin($admin,$content);
	$return['type'] = 0;
	$return['msg'] =  "Đăng nhập thành công";	
	
	echo json_encode($return);
	exit();


} else {
	$return['type'] = 1;
	$return['msg'] =  "Sai thông tin đăng nhập";	
	echo json_encode($return);
	exit();
}
	
echo json_encode($json);
			}else {
	header('Location: index.html');
	exit();
}

?>