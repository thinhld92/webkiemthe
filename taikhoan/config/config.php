<?php 
header("Content-type:text/html; charset=utf8");
error_reporting(1);
session_start();
require  "Medoo.php";
use Medoo\Medoo;
$database = new Medoo([
	// [required]
	'type' => 'mysql',
	'host' => 'localhost',
	'database' => 'kiemthe_demo',
	'username' => 'root',
	'password' => '123456',
 
	// [optional]
	'charset' => 'utf8mb4',
	'collation' => 'utf8mb4_general_ci',
	'port' => 3306,
 
	// Read more from https://www.php.net/manual/en/pdo.error-handling.php.
	'error' => PDO::ERRMODE_SILENT,
 
	// [optional]
	// The driver_option for connection.
	// Read more from http://www.php.net/manual/en/pdo.setattribute.php.
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	],
 
	// [optional] Medoo will execute those commands after connected to the database.
	'command' => [
		'SET SQL_MODE=ANSI_QUOTES'
	]
]);


$url_site = 'http://localhost/'; // url site
$title = 'Võ Lâm Truyền Kỳ 2005  - Công Thành Chiến'; // title web
$des_site = "Võ Lâm Truyền Kỳ 2005  - Công Thành Chiến"; 
$gamename = 'Võ Lâm Truyền Kỳ 2005  - Công Thành Chiến';  // ten game
$hotline = '0988888888'; // sdt hotline 
$url_trangchu = '/taikhoan/'; // link trang chu
$url_napthe= '';
$url_fanpage = 'http://fb.com';  // fanpage
$url_taigame = '#tin-tuc/Huong-Dan-Tai-Va-Cai-dat-Game.html';  // link tai game


//Mã MerchantID dang kí trên napthengay.com
$merchant_id = '5961';
//Api email, email tai khoan dang ky tren napthengay.com
$api_email = 'bachcanhky0803@gmail.com';
//mat khau di kem ma website dang kí trên  napthengay.com
$secure_code = 'aa56b5b6f2c0508f9effe4b7eef2189e';
//mã giao dịch
$trans_id = time();  //mã giao dịch do bạn gửi lên, Napthengay.com sẽ trả về 
$api_url = 'http://api.napthengay.com/v2/';








$int_xu = 0;
$int_email  = "testsrc@gmail.com";
//api key TheSieuToc.Net
$apikey = "7D723AAF46CB6CB8C83FB0CAE1F17902";  // key thesieutoc.net
function movePage($url) {
	die('<script type="text/javascript">window.location="'.$url.'"</script>');
}
$date = date("Y-m-d h:i:sa");
function logOut() {
	unset($_SESSION['username']);

}

function getIP() {
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
		$ip = $_SERVER["HTTP_CLIENT_IP"];
	else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	else if(!empty($_SERVER["REMOTE_ADDR"]))
		$ip = $_SERVER["REMOTE_ADDR"];
	else
		$ip = "Không tồn tại !";
	return $ip;
}


function string_var($string) {
    $filtered_string = $string;
    $filtered_string = str_replace("--","",$filtered_string);
    $filtered_string = str_replace(";","",$filtered_string);
    $filtered_string = str_replace("/*","",$filtered_string);
    $filtered_string = str_replace("*/","",$filtered_string);
    $filtered_string = str_replace("//","",$filtered_string);
    $filtered_string = str_replace(" ","",$filtered_string);
    $filtered_string = str_replace("#","",$filtered_string);
    $filtered_string = str_replace("||","",$filtered_string);
    $filtered_string = str_replace("admin'","",$filtered_string);
    $filtered_string = str_replace("UNION","",$filtered_string);
    $filtered_string = str_replace("COLLATE","",$filtered_string);
    $filtered_string = str_replace("DROP","",$filtered_string);
    return $filtered_string;
}


function str_text($text) {
	global $conn;
	//$text = mysqli_real_escape_string($conn, $text);
	$text = addslashes($text);
	$text = strip_tags($text);
	
	$text = str_replace([':', ';', ',', '<', '>', '{', '}'], '', $text);
	return $text;
}
 function AddUserHistory($username,$content)
 {
	 global $database;
	 global $date;
		 $insert = $database->insert("account_history", [
		 "username" => $username,
		 "Content" => $content,
		 "timeDate" => $date
	 ]);

 }

 function logAdmin($username,$content)
 {
	 global $database;
	 global $date;

	 $insert = $database->insert("admin_history", [
		 "cAccName" => $username,
		 "Content" => $content,
		 "timeDate" => $date
	 ]);

 }

 function getSumNap($username) {
	global $database;
	global $date;
	$getTong = $database->query("SELECT SUM(menhgia) as TongTien FROM card WHERE username='{$username}'")->fetchAll();
	$tong  = $getTong[0]["TongTien"];
	return  $tong;

 }
 function getUuDaiNap($username) {
	$tongnap = intval(getSumNap($username));
	$tongnap = $tongnap/1000;
	if ($tongnap >= 150000 )
	{
		$uudai = 30;
	}elseif ( $tongnap >= 125000)
	{
		$uudai = 25;
	}elseif( $tongnap >= 100000)
	{
		$uudai = 20;
	}elseif($tongnap >= 75000)
	{
		$uudai = 15;
	}elseif($tongnap >= 50000)
	{
		$uudai = 10;
	}elseif($tongnap >= 25000)
	{
		$uudai = 5;
	}else {
		$uudai = 0;
	}
	
	return $uudai;
	
 }

 function getTyLeNapKhuyenMai($username,$amount)
 {
	$uudai = getUuDaiNap($username);

	$sotien = (($amount*$uudai)/100)/1000;

	return $sotien;
 }
function getBrowser() { 
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";
  
	//First get the platform?
	if (preg_match('/linux/i', $u_agent)) {
	  $platform = 'linux';
	}elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
	  $platform = 'mac';
	}elseif (preg_match('/windows|win32/i', $u_agent)) {
	  $platform = 'windows';
	}
  
	// Next get the name of the useragent yes seperately and for good reason
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
	  $bname = 'Internet Explorer';
	  $ub = "MSIE";
	}elseif(preg_match('/Firefox/i',$u_agent)){
	  $bname = 'Mozilla Firefox';
	  $ub = "Firefox";
	}elseif(preg_match('/OPR/i',$u_agent)){
	  $bname = 'Opera';
	  $ub = "Opera";
	}elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
	  $bname = 'Google Chrome';
	  $ub = "Chrome";
	}elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
	  $bname = 'Apple Safari';
	  $ub = "Safari";
	}elseif(preg_match('/Netscape/i',$u_agent)){
	  $bname = 'Netscape';
	  $ub = "Netscape";
	}elseif(preg_match('/Edge/i',$u_agent)){
	  $bname = 'Edge';
	  $ub = "Edge";
	}elseif(preg_match('/Trident/i',$u_agent)){
	  $bname = 'Internet Explorer';
	  $ub = "MSIE";
	}
  
	// finally get the correct version number
	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
  ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
	  // we have no matching number just continue
	}
	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
	  //we will have two since we are not using 'other' argument yet
	  //see if version is before or after the name
	  if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
		  $version= $matches['version'][0];
	  }else {
		  $version= $matches['version'][1];
	  }
	}else {
	  $version= $matches['version'][0];
	}
  
	// check if we have a number
	if ($version==null || $version=="") {$version="?";}
  
	return array(
	  'userAgent' => $u_agent,
	  'name'      => $bname,
	  'version'   => $version,
	  'platform'  => $platform,
	  'pattern'    => $pattern
	);
  } 
  



?>

