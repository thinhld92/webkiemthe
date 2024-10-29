<?php 
include("config/config.php");
$username = $_SESSION['username'];
if (!$_SESSION['username']) movePage('login.html');	
	
$data = $database->get("account", [
    "username",
    "password",
    "email",
    "cmnd",
    "coin",
    "secpassword",
    "phone"
], [
"username" => $username
]);


$pass2 = null;
if ($data['secpassword'] == null ){
	$pass2 = '<span style="color:#e90600;">Chưa Cập Nhật</span>';
}else{
	$leng21 = explode("@", $data['secpassword']);
    $leng2 = strlen($leng21[0]);
	$pass2 = str_repeat ('*',  $leng2);
}
$fone = null;
if ($data['phone'] == null ){
	$fone = '<span style="color:#e90600;">Chưa Cập Nhật</span>';
}else{
    $fone = $data['phone'];
}

$cmnd = null;
if ($data['cmnd'] == null ){
	$cmnd = '<span style="color:#e90600;">Chưa Cập Nhật</span>';
	
}else{
    $cmnd = $data['cmnd'];
}

$email = null;
if ($data['email'] == null ){
	$email = '<span style="color:#e90600;">Chưa Cập Nhật</span>';
}else{
	$leng21 = explode("@", $data['email']);
	$leng2 = strlen($leng21[0])/1;
	$email = "******".substr($leng21[0],$leng2,50)."@".$leng21[1];
}

//var_dump($data);
?>
<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="jg0aMEdvyglZMgqfTAyPbDwjsNPofmw8mMCwvwnW">
    <meta name="app.content_locale" content="vi">
    <meta name="app.env" content="production">
    <meta name="app.lang" content="vi">
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="1 days">
    <title><?php echo $title?></title>
    <meta name="title" content="<?php echo $des_site ?>" />
    <meta name="description" content="<?php echo $des_site ?>" />
    <meta name="google-site-verification" content="" />
    <script src="assets/js/app.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="http://id.volamhungba.vn/assets/images/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app.css?v=1265456903">
	<link rel="stylesheet" href="assets/css/dashboard.css?v=1690614011">
	<script src="assets/js/main.js" type="text/javascript"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FBRLPP0PX2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-FBRLPP0PX2');
</script>
</head>

<body class="dashboard ">
    <script type="text/javascript">
	$(document).ready(function() {
		//$(window).on("load resize", function() {
			//console.log($(window).width());
			if ($(window).width() <= 500) {
				$(".dashboard").addClass("menu-closed");
			} else {
				$(".dashboard").removeClass("menu-closed");
			}
		//});
	});


	</script>
		<header class="navbar navbar-expand-md navbar-light bg-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="assets/images/logo.png" alt="<?php echo $title ?>">
                <!--h3 class="mb-0">Võ Lâm 2 Hùng Bá</h3-->
            </a>
            <button class="navbar-toggler left-menu-btn-control" type="button" data-toggle="collapse" data-target="#left-menu" aria-controls="left-menu" aria-expanded="false" aria-label="Left menu navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">

                </ul>

                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item dropdown user-action-header">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="icon-user setting-action" style="font-weight: bold;color: #d4156b;"></i> <?php echo $_SESSION['username']?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout.html">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>