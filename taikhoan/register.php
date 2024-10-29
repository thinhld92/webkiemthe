<?php 
include("config/config.php");
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
    <meta name="title" content="<?php echo $title?>" />
    <meta name="description" content="<?php echo $des_site?>" />
    <meta name="google-site-verification" content="" />
    <link rel="shortcut icon" href="/assets/images/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css">
    <link rel="stylesheet" href="assets/css/app.css?v=2103943108">
    

    <link rel="stylesheet" href="assets/css/styles.v2.css">
   <script src="assets/js/jquery.min.js" type="text/javascript"></script>
   <script src="assets/js//bootstrap.min.js" type="text/javascript"></script>
   <script src="assets/js/app.js" type="text/javascript"></script>
   <script src="assets/js/main.js" type="text/javascript"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js" type="text/javascript"></script>


</head>

<body >
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
		<nav class="navbar navbar-expand-sm navbar-light bg-white">
        <div class="container" style="border-bottom: 1px solid red;">
            <a class="navbar-brand-sm" href="<?php echo $url_trangchu ?>">
                <img src="assets/images/logo.png" alt="Võ Lâm 2 Hùng Bá">
                <!--h3 class="mb-0">Võ Lâm 2 Hùng Bá</h3-->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Đăng Nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">Đăng Ký</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
		<main class="wrapper py-4">
    <div id="recaptcha-container"></div>
    <div class="container auth-layout">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">
                    <h3 class="card-title">Đăng ký</h3>
                    <form action="ajax/register.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">
                    
                        <div class="form-group">
                            <label for="username">Tên người dùng</label>
                            <input id="username" type="text" class="form-control  " name="username" aria-describedby="usernameHelp" value="" placeholder="Tên người dùng">
                            <small id="usernameHelp" class="form-text text-muted">Tên đăng nhập dài 6-16 ký tự chỉ được phép chứa chữ cái hoặc số</small>
                        </div>

                        <div class="form-group">
                            <label for="username">Số điện thoại</label>
                            <input id="phone" type="number" class="form-control  " name="phone" aria-describedby="usernameHelp" value="" placeholder="Số điện thoại">
                            <small id="usernameHelp" class="form-text text-muted">Số điện thoại gồm 10 - 11 số  dùng để bảo mật tài khoản</small>
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input id="password" type="password" class="form-control  " name="password" aria-describedby="passwordHelp" value="" placeholder="Mật khẩu">
                            <small id="passwordHelp" class="form-text text-muted">Mật khẩu cần có 6 ký tự trở lên</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Xác nhận mật khẩu</label>
                            <input id="password_confirmation" type="password" class="form-control  " name="password_confirmation" value="" placeholder="Xác nhận lại mật khẩu">
                        </div>

						<div class="form-group">
							<label for="email">Captcha</label><br/>
							<input id="captcha" class="form-control  " name="captcha" placeholder="Captcha" type="text" value="" style="display: inline; width:40%">
							<a href="javascript:changeCaptcha();" id="refreshCaptcha">
							<img src="get_captcha.php" alt="Captcha">
                                
							</a>
							<label for="captcha" alt="Captcha" placeholder="Captcha"></label>
						</div>
                        <div class="form-group">
							<input type="submit" name="register" class="btn btn-primary btn-block" value="Đăng ký">
                        </div>
                        <p class="text-center">
                            Khi nhấn nút đăng ký đồng nghĩa với việc bạn đã chấp nhận
                            <br><a href="/">Điều khoản dịch vụ</a>
                        </p>
                        <hr>
                        <div class="text-center">
                            <a href="login.html" class="text-gray">Đã có tài khoản? <strong class="text-primary">Đăng nhập</strong></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main></body>
</html>