<?php 
$stmt = $db->prepare('SELECT * FROM blog_sukien WHERE sukienSlug = :sukienSlug');
$stmt->execute(array(':sukienSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}
?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth;">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="1days" />
	<link href="https://nkvs2.gosu.vn/public/static/templates/frontend/first/images/favicon.ico" rel="icon">

		 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PHDQMXD');</script>
<!-- End Google Tag Manager -->


			<title>Ngạo Kiếm Vô Song 2 – Là Kiếm Hiệp, Là Anh Em </title>
<meta name="robots" content="index,follow" />
<meta name="revisit-after" content="1days" />
<!-- <link href="http://nkvs2.gosu.vn/public/static/templates/frontend/first/images/favicon.ico" rel="icon"> -->
<link href="https://nkvs2.gosu.vn/public/static/templates/frontend/first/images/favicon.ico" rel="icon">
<meta charset="utf-8">
<meta name="description" content="Đậm Chất Kiếm Hiệp Kim Dung, phù hợp với anh em trong thời đại mới, tối ưu trải nghiệm, dễ dàng chinh phục thế giới Kiếm Hiệp chuẩn chất 2017"/>
<meta name="keywords" content="ngạo kiếm vô song 2, ngạo kiếm vô song high, ngao kiem vo song 2, ngao kiem vo song high, ngạo kiếm 2, ngao kiem 2, ngao kiem high, ngạo kiếm high, game 2d, game client 2d, game online,
    game nhập vai, game online, game kiếm hiệp, game võ hiệp, game high, high đúng cách, game anh em,
    kiếm hiệp anh em, game hay, game hot, game hè, game online hè, game hay nhất hè,
     game chat, game chất, game thời đại mới, kiếm hiệp thời đại mới, võ lâm, kiếm thế, võ lâm truyền kỳ,
     võ lâm chi mộng, phi long tại thiên, thiên tử 3d, thien tu" />


<base href="https://nkvs2.gosu.vn/" />
<meta property="og:title" content="Ngạo Kiếm Vô Song 2 – Là Kiếm Hiệp, Là Anh Em" />
<meta property="og:site_name" content="Ngạo Kiếm Vô Song 2 – Là Kiếm Hiệp, Là Anh Em" />
<meta property="og:description" content="Ngạo Kiếm Vô Song 2 – Là Kiếm Hiệp, Là Anh Em" />

<link rel="image_src" href="https://nkvs2.gosu.vn/public/static/templates/frontend/intro/pbm-hoangson/assets/images/1200x628_share_hoangson.jpg" />
<meta property="og:image" href="https://nkvs2.gosu.vn/public/static/templates/frontend/intro/pbm-hoangson/assets/images/1200x628_share_hoangson.jpg" />


<meta property="og:url" content="http://nkvs2.gosu.vn" />

			
<link rel="stylesheet" type="text/css" href="https://nkvs2.gosu.vn/public/third_party/fancybox/css/jquery.fancybox.css">

<script type="text/javascript" src="https://nkvs2.gosu.vn/public/third_party/jquery/jquery-1.11.1.min.js"></script>

<script type="text/javascript" src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/js/jquery.lazyload.min.js"></script>

<script src="https://nkvs2.gosu.vn/public/third_party/fancybox/js/jquery.fancybox.js"></script>
<script src="https://nkvs2.gosu.vn/public/static/templates/frontend/common/js/gsa.js"></script>

<script type="text/javascript">
    function calltg(){
        var target = 'https://nkvs2.gosu.vn/cam-nang/tai-game.html';
        $.gsa({position:'quick_download',type:'click',object:'',from:window.location.href,target:target});
        setTimeout(function(){
            window.location.href = target;
        },200);
    }
</script>

<script>var url = "https://nkvs2.gosu.vn/public/static/templates/frontend/first/";</script>
<script src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/html5/js/easeljs-0.8.1.min.js"></script>
<script src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/html5/js/tweenjs-0.6.1.min.js"></script>
<script src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/html5/js/movieclip-0.8.1.min.js"></script>
<script src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/html5/js/preloadjs-0.6.1.min.js"></script>
<script src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/html5/129button_canvas.js"></script>

<script> var baseUrl='https://nkvs2.gosu.vn/';</script>
<style type="text/css">
	#fancybox-loading div {
	  display: none;
	}
	.fancybox-overlay._clo_home .fancybox-close{
	    top: 32px;
    	right: 13px;
	}
</style>
<script type="text/javascript" charset="utf-8">
	$(function() {
		$("img.lazy").lazyload({
			effect : "fadeIn"
		});

	});

	
	// $(document).ready(function(){
	// 	  $.fancybox.hideActivity = function() {
	// 			loading.hide();
	// 		};
	// 	});
</script>

<script>
	$('[action="login"],[action="register"]').fancybox({
		type:'iframe',
		padding:0,
		width:'330px',
		height:'381px',
		iframe: {
          preload: false // fixes issue with iframe and IE
      	}
	});

	$('[action="loggedin"]').fancybox({
		type:'iframe',
		padding:0,
		width:'384px',
		height:'265px',
		afterLoad: function () {
            if ($(this.element).hasClass("click_fan")) {
                $(".fancybox-overlay").addClass("_clo_home");
            }
        }
	});

	$('.btn-open-popup').fancybox({
		type	: 'iframe',
		width	: '502px',
		height	: '300px',
		padding	: 0,
		iframe: {
          preload: false // fixes issue with iframe and IE
      	}
	});

	$('[action="box_login"]').fancybox({
		type:'iframe',
		padding:0,
		width:'502px',
		height:'500px',
		scrolling: 'no',
		iframe: {
          preload: false // fixes issue with iframe and IE
      	}
	});

	// jQuery(document).ready(function() {
	// 	$('.nivo-controlNav a', slider).live('click', function(){
 //            if(vars.running) return false;
 //            if($(this).hasClass('active')) return false;
 //            clearInterval(timer);
 //            timer = '';
 //            slider.css('background','url("'+ vars.currentImage.attr('src') +'") no-repeat');
 //            vars.currentSlide = $(this).attr('rel') - 1;
 //            nivoRun(slider, kids, settings, 'control');
 //        });
	// });


	

	

</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1284108428289217";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
var canvas, stage, exportRoot;

function init() {
	canvas = document.getElementById("canvas");
	images = images||{};

	var loader = new createjs.LoadQueue(false);
	loader.addEventListener("fileload", handleFileLoad);
	loader.addEventListener("complete", handleComplete);
	loader.loadManifest(lib.properties.manifest);
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleComplete(evt) {
	exportRoot = new lib._129button_canvas();

	stage = new createjs.Stage(canvas);
	stage.addChild(exportRoot);
	stage.update();
	stage.enableMouseOver(24);
	createjs.Ticker.setFPS(lib.properties.fps);
	createjs.Ticker.addEventListener("tick", stage);
}
</script>

	<link rel="stylesheet" type="text/css" href="https://nkvs2.gosu.vn/public/static/templates/frontend/first/css/style-event.css">
	<link rel="stylesheet" href="https://nkvs2.gosu.vn/public/static/templates/frontend/first/css/screen.fancybox.css"/>
			


	<div class="fb-customerchat" page_id="396640820729782"></div>

</head>

<body style="">


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PHDQMXD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


	<!-- <div class="bg-header"></div> -->
	
	<div id="simple_timer" style="display: none;"></div>
	
	<!--<div id="topbar-aivo"></div> -->
	<div id="group-top_left" style="position:absolute;top:0px;left:0px;z-index:999;">
	    <div class="item-top_left abcd ff">
	        <span>
	            <img src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/images/AIVO_18+.jpg">
	        </span>
	    </div>
	</div>
	<div class="wrap-bg">

		<div class="box-banner-fly">
					</div>

		<div class="container">

			 <div class="header">
	<div class="menu-DeV">
		<ul >
	        <li><a href="https://nkvs2.gosu.vn/home.html">Trang chủ</a></li>
	        <li>|</li>
	        <li><a href="https://nkvs2.gosu.vn/news.html">Tin Tức</a></li>
	        <li>|</li>
	        <li><a href="https://nkvs2.gosu.vn/su-kien.html">Sự Kiện</a></li>
	    </ul>
    </div>
   <div class="logo DeV"><a href="https://nkvs2.gosu.vn/home.html"><img src="https://nkvs2.gosu.vn/public/static/templates/frontend/first/images/logo.png" alt="logo"></a></div>
</div>

<div class="clearfix"></div>


			<div class="maj">
				
	<style type="text/css">
		.wrap-bg {
			background: url(https://nkvs2.gosu.vn/public/static/uploads/new/2021/3/2/1920x755.jpg) no-repeat top center;
		}
		.container .header {
		    height: 326px;
		}
	</style>

	
		<div class="sidebar left">

			<div class="group _1 width evDet">
				<canvas id="canvas" width="305" height="187"></canvas>
			    			    <a href="https://id.gosu.vn/Account/Register" target="_blank"> </a>
			    <a href="https://pay.gosu.vn/Payment/Transfer?Game=nkvs2" target="_blank" ></a>
				<div class="clearfix"></div>
			</div>

			<div class="clearfix"></div>
							<div class="group _6">
					<ul class="list-category list-event">
													<li>
                                 
                                                                    
								<a  title="Nội dung" class="active" href="https://nkvs2.gosu.vn/su-kien/0603-0703-sieu-thuong-cuoi-tuan-cuc-hap-dan/noi-dung.html" >
									<p>Nội dung</p>
								</a></li>
											</ul>
				</div>
					</div>
	
	<div class="list-ne neEv">
		<div class="group _1">
			<p>[06/03 - 07/03] Siêu thưởng cuối tuần cực hấp dẫn</p>
			<p>
				<p>Diễn ra ngày 06/03/2021</p>
			</p>
		</div>

		<div class="group _2">
			<div class="event-de">
				<div class="chitiet">

					<div class="title 1">
																				<p>Nội dung </p>
						
													<p ><span style="color: #d13300;">06/03/2021</span> </p>
						
																								<div class="facebook">
								<div class="fb-like" data-href="https://nkvs2.gosu.vn/su-kien/0603-0703-sieu-thuong-cuoi-tuan-cuc-hap-dan/noi-dung.html" data-width="135px" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
							</div>
					</div>

					<div class="clearfix"></div>

																	<div class="wid 1">
														
						</div>
					
					<p><p style="text-align: justify;"><span style="font-size: 36px;"><strong>N</strong></span>hững ng&agrave;y cuối tuần sẽ rộn r&agrave;ng hơn với sự kiện Si&ecirc;u thưởng t&iacute;ch lũy cực hấp dẫn!&nbsp;</p>
<p>C&ugrave;ng kh&aacute;m ph&aacute; nh&eacute;!</p>
<p style="text-align: center;"><img src="/public/static/uploads/new/2021/3/2/665x241.jpg" alt="" width="560" /></p>
<h1 class="content-event-h1"><strong>Thời gian</strong></h1>
<ul>
<li style="text-align: justify;">Thời gian bắt đầu:&nbsp;<strong>00h00&nbsp;</strong>ng&agrave;y<strong>&nbsp;06/03/2021</strong>.</li>
<li style="text-align: justify;">Thời gian kết th&uacute;c:&nbsp;<strong>23h59&nbsp;</strong>ng&agrave;y<strong>&nbsp;07/03/2021</strong>.</li>
<li style="text-align: justify;">Phần thưởng sẽ được trao v&agrave;o ng&agrave;y:&nbsp;<strong>08/03/2021</strong>.</li>
</ul>
<h1 class="content-event-h1"><strong>Phạm vi</strong></h1>
<ul>
<li><strong>Tất cả m&aacute;y chủ NKVS2</strong>.</li>
</ul>
<h1 class="content-event-h1">Nội dung</h1>
<p style="text-align: justify;">- Trong thời gian sự kiện, đại hiệp&nbsp;quy đổi&nbsp;Nguy&ecirc;n Bảo&nbsp;v&agrave;o game&nbsp;đạt mốc n&agrave;o sẽ chỉ nhận được thưởng tại mốc đ&oacute;.</p>
<p style="text-align: justify;">- M&aacute;y chủ<strong>&nbsp;Kim Kiếm</strong>&nbsp;đến&nbsp;<strong>Kim&nbsp;Phượng</strong>&nbsp;khi đạt mốc&nbsp;<strong>270000</strong>&nbsp;sẽ nhận được thưởng&nbsp;<strong>x2</strong>&nbsp;mốc&nbsp;<strong>135000</strong>.&nbsp;</p>
<p style="text-align: justify;">- M&aacute;y chủ mới <strong>Th&aacute;i Phượng quy đổi&nbsp;đạt 54000 c&oacute; thể chọn x2 phần qu&agrave; 27000, mốc 99999 c&oacute; thể x3 phần qu&agrave; 27000 v&agrave; 2 t&uacute;i to&aacute;i phiến 3- Hiếm, sk qua ng&agrave;y sẽ được reset.</strong></p>
<ul>
<li style="text-align: justify;">M&aacute;y chủ&nbsp;Th&aacute;i&nbsp;Phượng khi quy đổi bất kỳ sẽ nhận được th&ecirc;m 1 phần qu&agrave; gồm:&nbsp;</li>
</ul>
<p>+ Ng&acirc;n Lượng 10v</p>
<p>+ Nguy&ecirc;n Bảo Kh&oacute;a 2v</p>
<p>+ Cống Hiến sư M&ocirc;n 500</p>
<fieldset class="fieldset-note"><legend><strong>Lưu &yacute;</strong></legend>
<ul>
<li style="text-align: justify;">Nếu quy đổi đạt 270000 th&igrave; người chơi vui l&ograve;ng đăng k&yacute; th&ecirc;m qu&agrave; t&ugrave;y chọn kh&aacute;c.</li>
<li style="text-align: justify;">M&aacute;y chủ <strong>Th&aacute;i Phượng</strong> sự kiện được reset h&agrave;ng ng&agrave;y.</li>
</ul>
</fieldset>
<p>+ M&aacute;y chủ<strong>&nbsp;Kim Kiếm</strong>&nbsp;đến&nbsp;<strong>Đ&ocirc;ng Giang</strong>&nbsp;khi quy đổi đạt mốc&nbsp;<strong>270000</strong>&nbsp;c&oacute; thể t&ugrave;y chọn th&ecirc;m 1 vật phẩm:</p>
<p>&nbsp;</p>
<table style="margin-left: auto; margin-right: auto; height: 232px;" width="500">
<tbody>
<tr>
<td width="210">
<p><strong>T&ecirc;n vật phẩm</strong></p>
</td>
<td width="84">
<p><strong>Số lượng</strong></p>
</td>
<td width="84">
<p><strong>Trạng th&aacute;i</strong></p>
</td>
<td width="81">
<p><strong>T&ugrave;y chọn</strong></p>
</td>
</tr>
<tr>
<td width="210">
<p>T&uacute;i hương bậc 7</p>
</td>
<td width="84">
<p>1</p>
</td>
<td rowspan="4" width="84">
<p>Kh&oacute;a</p>
</td>
<td rowspan="4" width="81">
<p>T&ugrave;y chọn 1 trong c&aacute;c vật phẩm</p>
</td>
</tr>
<tr>
<td width="210">
<p>Đ&aacute; R&egrave;n 8</p>
</td>
<td width="84">
<p>150</p>
</td>
</tr>
<tr>
<td width="210">
<p>Ch&acirc;n Kh&iacute; 418 vạn</p>
</td>
<td width="84">
<p>1</p>
</td>
</tr>
<tr>
<td width="210">
<p>T&uacute;i chọn mảnh truyền thuyết</p>
</td>
<td width="84">
<p>400</p>
</td>
</tr>
</tbody>
</table>
<p style="text-align: justify;">+ M&aacute;y chủ&nbsp;<strong>Hỏa Phượng</strong>&nbsp;khi quy đổi đạt mốc&nbsp;<strong>270000</strong>&nbsp;c&oacute; thể t&ugrave;y chọn th&ecirc;m 1 vật phẩm:&nbsp;</p>
<table style="margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="210">
<p><strong>T&ecirc;n vật phẩm</strong></p>
</td>
<td width="84">
<p><strong>Số lượng</strong></p>
</td>
<td width="84">
<p><strong>Trạng th&aacute;i</strong></p>
</td>
<td width="81">
<p><strong>T&ugrave;y chọn</strong></p>
</td>
</tr>
<tr>
<td width="210">
<p>Kim Thạch sử thi bậc 7</p>
</td>
<td width="84">
<p>1</p>
</td>
<td rowspan="6" width="84">
<p>Kh&oacute;a</p>
</td>
<td rowspan="6" width="81">
<p>T&ugrave;y chọn 1 trong c&aacute;c vật phẩm</p>
</td>
</tr>
<tr>
<td width="210">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="84">
<p>400</p>
</td>
</tr>
<tr>
<td width="210">
<p>Ch&acirc;n kh&iacute; 418 vạn</p>
</td>
<td width="84">
<p>1</p>
</td>
</tr>
<tr>
<td width="210">
<p>T&uacute;i chọn mảnh truyền thuyết</p>
</td>
<td width="84">
<p>300</p>
</td>
</tr>
<tr>
<td width="210">
<p>T&uacute;i hương bậc 6</p>
</td>
<td width="84">
<p>1</p>
</td>
</tr>
<tr>
<td width="210">
<p>Đ&aacute; r&egrave;n 7</p>
</td>
<td width="84">
<p>100</p>
</td>
</tr>
</tbody>
</table>
<p style="text-align: justify;">+ M&aacute;y chủ&nbsp;<strong>Kim</strong>&nbsp;<strong>Phượng</strong>&nbsp;khi quy đổi đạt mốc&nbsp;<strong>270000</strong>&nbsp;c&oacute; thể t&ugrave;y chọn th&ecirc;m 1 vật phẩm:&nbsp;</p>
<table style="margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="210">
<p style="text-align: center;"><strong>T&ecirc;n vật phẩm</strong></p>
</td>
<td style="text-align: center;" width="84">
<p><strong>Số lượng</strong></p>
</td>
<td style="text-align: center;" width="84">
<p><strong>Trạng th&aacute;i</strong></p>
</td>
<td style="text-align: center;" width="81">
<p><strong>T&ugrave;y chọn</strong></p>
</td>
</tr>
<tr style="text-align: center;">
<td width="210">
<p>Đ&aacute; R&egrave;n 5</p>
</td>
<td width="84">
<p>600</p>
</td>
<td rowspan="6" width="84">
<p>Kh&oacute;a</p>
</td>
<td rowspan="6" width="81">
<p>T&ugrave;y chọn 1 trong c&aacute;c vật phẩm</p>
</td>
</tr>
<tr style="text-align: center;">
<td width="210">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="84">
<p>300</p>
</td>
</tr>
<tr style="text-align: center;">
<td width="210">
<p>Ch&acirc;n kh&iacute; 418 vạn</p>
</td>
<td width="84">
<p>1</p>
</td>
</tr>
<tr style="text-align: center;">
<td width="210">
<p>T&uacute;i chọn&nbsp;Danh Vọng 10 điểm</p>
</td>
<td width="84">
<p>50</p>
</td>
</tr>
<tr style="text-align: center;">
<td width="210">
<p>T&uacute;i hương bậc 4</p>
</td>
<td width="84">
<p>2</p>
</td>
</tr>
<tr style="text-align: center;">
<td width="210">
<p>Cống Hiến sư m&ocirc;n 5v</p>
</td>
<td width="84">
<p>10</p>
</td>
</tr>
</tbody>
</table>
<p style="text-align: justify;"><strong>Đại hiệp nạp đủ mốc t&iacute;ch lũy h&atilde;y cập nhật th&ocirc;ng tin nhận thưởng để BQT trao qu&agrave;:</strong>&nbsp;</p>
<p style="text-align: center;"><strong><a href="https://docs.google.com/forms/d/e/1FAIpQLSc4u-P8k3CV3jxmxE2XQEnU863RjYN_iR4EAwTCreNXk44vAg/viewform?usp=sf_link" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="/public/static/uploads/button/button(1).gif" alt="" width="180" height="85" /></a></strong></p>
<fieldset class="fieldset-note"><legend><strong>Xem th&ecirc;m</strong></legend>
<ul>
<li style="text-align: justify;"><strong><a href="https://nkvs2.gosu.vn/su-kien/su-kien-phu-gia-bat-phuong/noi-dung.html">Ph&uacute; Giả B&aacute;t Phương</a></strong></li>
<li style="text-align: justify;"><a href="https://nkvs2.gosu.vn/news/tin-tuc/huong-dan-nap-gosu-nguyen-bao-vao-game.html" target="_blank">Xem hướng dẫn c&aacute;ch nạp&nbsp;GOSU, đổi Nguy&ecirc;n Bảo&nbsp;v&agrave;o game tại đ&acirc;y</a></li>
</ul>
</fieldset>
<h1 class="content-event-h1">Phần thưởng&nbsp;</h1>
<p><strong><span style="font-size: 18px;">Th&aacute;i Phượng</span></strong></p>
<table style="margin-left: auto; margin-right: auto;" width="519">
<tbody>
<tr>
<td width="108">
<p>mốc nạp</p>
</td>
<td width="283">
<p>Vật Phẩm</p>
</td>
<td width="64">
<p>Số lượng</p>
</td>
<td width="64">
<p>Trạng Th&aacute;i</p>
</td>
</tr>
<tr>
<td rowspan="4" width="108">
<p>5400</p>
</td>
<td width="283">
<p>Ng&acirc;n Lượng 20v</p>
</td>
<td width="64">
<p>1</p>
</td>
<td rowspan="13" width="64">
<p>Kh&oacute;a</p>
</td>
</tr>
<tr>
<td width="283">
<p>Nguy&ecirc;n Bảo kh&oacute;a 2.5v</p>
</td>
<td width="64">
<p>2</p>
</td>
</tr>
<tr>
<td width="283">
<p>Thẻ Đồng Đội Ngẫu Nhi&ecirc;n</p>
</td>
<td width="64">
<p>5</p>
</td>
</tr>
<tr>
<td width="283">
<p>Cống Hiến 1000 điểm</p>
</td>
<td width="64">
<p>2</p>
</td>
</tr>
<tr>
<td rowspan="4" width="108">
<p>13500</p>
</td>
<td width="283">
<p>Ng&acirc;n Lượng 20v</p>
</td>
<td width="64">
<p>2</p>
</td>
</tr>
<tr>
<td width="283">
<p>Nguy&ecirc;n Bảo kh&oacute;a 2.5v</p>
</td>
<td width="64">
<p>4</p>
</td>
</tr>
<tr>
<td width="283">
<p>Thẻ Đồng Đội Ngẫu Nhi&ecirc;n</p>
</td>
<td width="64">
<p>10</p>
</td>
</tr>
<tr>
<td width="283">
<p>Cống Hiến 1000 điểm</p>
</td>
<td width="64">
<p>4</p>
</td>
</tr>
<tr>
<td rowspan="5" width="108">
<p>27000</p>
</td>
<td width="283">
<p>Ng&acirc;n Lượng 20v</p>
</td>
<td width="64">
<p>5</p>
</td>
</tr>
<tr>
<td width="283">
<p>Nguy&ecirc;n Bảo kh&oacute;a 2.5v</p>
</td>
<td width="64">
<p>8</p>
</td>
</tr>
<tr>
<td width="283">
<p>Thẻ Đồng Đội Ngẫu Nhi&ecirc;n</p>
</td>
<td width="64">
<p>20</p>
</td>
</tr>
<tr>
<td width="283">
<p>Cống Hiến 1000 điểm</p>
</td>
<td width="64">
<p>8</p>
</td>
</tr>
<tr>
<td width="283">
<p>Đ&aacute; Tẩy Thuộc t&iacute;nh</p>
</td>
<td width="64">
<p>20</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<h2 class="content-event-h2">Hỏa Phượng - Kim&nbsp;Phượng</h2>
<p>&nbsp;</p>
<table style="margin-left: auto; margin-right: auto;" width="519">
<tbody>
<tr>
<td width="108">
<p>mốc nạp</p>
</td>
<td width="283">
<p>Vật Phẩm</p>
</td>
<td width="64">
<p>Số lượng</p>
</td>
<td width="64">
<p>Trạng Th&aacute;i</p>
</td>
</tr>
<tr>
<td rowspan="4" width="108">
<p>5400</p>
</td>
<td width="283">
<p>Ng&acirc;n Lượng 20v</p>
</td>
<td width="64">
<p>1</p>
</td>
<td rowspan="13" width="64">
<p>Kh&oacute;a</p>
</td>
</tr>
<tr>
<td width="283">
<p>Nguy&ecirc;n Bảo kh&oacute;a 2.5v</p>
</td>
<td width="64">
<p>2</p>
</td>
</tr>
<tr>
<td width="283">
<p>Thẻ Đồng Đội Ngẫu Nhi&ecirc;n</p>
</td>
<td width="64">
<p>5</p>
</td>
</tr>
<tr>
<td width="283">
<p>Cống Hiến 1000 điểm</p>
</td>
<td width="64">
<p>2</p>
</td>
</tr>
<tr>
<td rowspan="4" width="108">
<p>13500</p>
</td>
<td width="283">
<p>Ng&acirc;n Lượng 20v</p>
</td>
<td width="64">
<p>2</p>
</td>
</tr>
<tr>
<td width="283">
<p>Nguy&ecirc;n Bảo kh&oacute;a 2.5v</p>
</td>
<td width="64">
<p>4</p>
</td>
</tr>
<tr>
<td width="283">
<p>Thẻ Đồng Đội Ngẫu Nhi&ecirc;n</p>
</td>
<td width="64">
<p>10</p>
</td>
</tr>
<tr>
<td width="283">
<p>Cống Hiến 1000 điểm</p>
</td>
<td width="64">
<p>4</p>
</td>
</tr>
<tr>
<td rowspan="5" width="108">
<p>27000</p>
</td>
<td width="283">
<p>Ng&acirc;n Lượng 20v</p>
</td>
<td width="64">
<p>5</p>
</td>
</tr>
<tr>
<td width="283">
<p>Nguy&ecirc;n Bảo kh&oacute;a 2.5v</p>
</td>
<td width="64">
<p>8</p>
</td>
</tr>
<tr>
<td width="283">
<p>Thẻ Đồng Đội Ngẫu Nhi&ecirc;n</p>
</td>
<td width="64">
<p>20</p>
</td>
</tr>
<tr>
<td width="283">
<p>Cống Hiến 1000 điểm</p>
</td>
<td width="64">
<p>8</p>
</td>
</tr>
<tr>
<td width="283">
<p>Đ&aacute; Tẩy Thuộc t&iacute;nh</p>
</td>
<td width="64">
<p>20</p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h2 class="content-event-h2">Hỏa Phượng - Kim&nbsp;Phượng</h2>
<table style="margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="81">
<p><strong>Mốc nạp</strong></p>
</td>
<td width="370">
<p><strong>Vật phẩm</strong></p>
</td>
<td width="43">
<p><strong>Số lượng</strong></p>
</td>
<td width="43">
<p><strong>Trạng th&aacute;i</strong></p>
</td>
</tr>
<tr>
<td rowspan="5" width="81">
<p>5400</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>400</p>
</td>
<td rowspan="35" width="43">
<p>Kh&oacute;a</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>10</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td rowspan="6" width="81">
<p>13500</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>600</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>40</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>5</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td rowspan="7" width="81">
<p>27000</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>800</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>30</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="43">
<p>150</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>80</p>
</td>
</tr>
<tr>
<td width="370">
<p>Danh Vọng Lệnh Sử Thi ( 10 điểm)</p>
</td>
<td width="43">
<p>15</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>10</p>
</td>
</tr>
<tr>
<td rowspan="8" width="81">
<p>54000</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>1000</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>120</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>80</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>15</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="43">
<p>200</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng ch&iacute; T&ocirc;n</p>
</td>
<td width="43">
<p>15</p>
</td>
</tr>
<tr>
<td width="370">
<p>Danh Vọng Lệnh Sử Thi ( 10 điểm)</p>
</td>
<td width="43">
<p>40</p>
</td>
</tr>
<tr>
<td rowspan="9" width="81">
<p>135000</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>1500</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng ch&iacute; T&ocirc;n</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>150</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>15</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; R&egrave;n7</p>
</td>
<td width="43">
<p>200</p>
</td>
</tr>
<tr>
<td width="370">
<p>Danh vọng sử thi x50 hoặc 200 mảnh Truyền thuyết</p>
</td>
<td width="43">
<p>1</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng đội 6 sao t&ugrave;y chọn hoặc 2 đồng đội 5 sao&nbsp;t&ugrave;y chọn</p>
</td>
<td width="43">
<p>1</p>
</td>
</tr>
</tbody>
</table>
<h2 class="content-event-h2" style="text-align: left;">Kim Kiếm đến Đ&ocirc;ng Giang</h2>
<table style="margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td width="81">
<p><strong>Mốc nạp</strong></p>
</td>
<td width="370">
<p><strong>Vật phẩm</strong></p>
</td>
<td width="43">
<p><strong>Số lượng</strong></p>
</td>
<td width="43">
<p><strong>Trạng th&aacute;i</strong></p>
</td>
</tr>
<tr>
<td rowspan="5" width="81">
<p>5400</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>500</p>
</td>
<td rowspan="36" width="43">
<p>Kh&oacute;a</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>15</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td rowspan="6" width="81">
<p>13500</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>600</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; r&egrave;n 6</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>70</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>3</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td rowspan="7" width="81">
<p>27000</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>800</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>40</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>30</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>10</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; R&egrave;n6</p>
</td>
<td width="43">
<p>200</p>
</td>
</tr>
<tr>
<td width="370">
<p>Huyệt Vị ẩn mạch (chưa gi&aacute;m định)</p>
</td>
<td width="43">
<p>7</p>
</td>
</tr>
<tr>
<td rowspan="8" width="81">
<p>54000</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>1000</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>80</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Đội Ngẫu nhi&ecirc;n</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>50</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; R&egrave;n7</p>
</td>
<td width="43">
<p>150</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ng&acirc;n Ch&acirc;m x10 hoặc Huyệt Vị ẩn mạch (chưa gi&aacute;m định) x10</p>
</td>
<td width="43">
<p>10</p>
</td>
</tr>
<tr>
<td width="370">
<p>Mảnh trang bị truyền thuyết</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td rowspan="10" width="81">
<p>135000</p>
</td>
<td width="370">
<p>Đồng Quần H&ugrave;ng</p>
</td>
<td width="43">
<p>1500</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng Kiều Sở</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đồng ch&iacute; T&ocirc;n</p>
</td>
<td width="43">
<p>30</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ng&acirc;n Ch&acirc;m x20 hoặc Huyệt Vị ẩn mạch (chưa gi&aacute;m định) x20</p>
</td>
<td width="43">
<p>20</p>
</td>
</tr>
<tr>
<td width="370">
<p>V&otilde; Kỹ Thi&ecirc;n Kiều Lệnh</p>
</td>
<td width="43">
<p>100</p>
</td>
</tr>
<tr>
<td width="370">
<p>T&uacute;i chọn ẩn mạch x1</p>
</td>
<td width="43">
<p>1</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ch&acirc;n Kh&iacute; 5v</p>
</td>
<td width="43">
<p>30</p>
</td>
</tr>
<tr>
<td width="370">
<p>Đ&aacute; R&egrave;n7</p>
</td>
<td width="43">
<p>300</p>
</td>
</tr>
<tr>
<td width="370">
<p>Ngũ Sắc Thủy Tinh</p>
</td>
<td width="43">
<p>6</p>
</td>
</tr>
<tr>
<td width="370">
<p>300 mảnh TT t&ugrave;y chọn hoặc 1500 Mảnh H&ograve;a Thị B&iacute;ch</p>
</td>
<td width="43">
<p>300</p>
</td>
</tr>
</tbody>
</table> </p>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="bnt-top">
				<p onclick="return_top()" style="display:none;     top: 733px;"></p>
			
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('.chitiet img').each(function() {
				//alert($(this).attr('src'));
				var old_link = $(this).attr('src');
				// var strNewString = old_link.slice(2);
				var strNewString = 'https://nkvs2.gosu.vn/' + old_link;
				jQuery(this).attr('src', strNewString);
			});
		});

	

	var wid = $('body').width();
            $('.bnt-top p').css('right',wid/2-537);
            $('.like-share').css('right',wid/2-537);

            function return_top() {
	            $("html, body").animate({ scrollTop: 0 }, 1000);
	            return false;
	        }

	         $(window).scroll(function() {

		        if ($(this).scrollTop() > 400)
		        {
		            $('.bnt-top p').show();
		        }else{
		            $('.bnt-top p').hide();
		        }
		    });


	         init();
	</script>

				<div class="clearfix"></div>
			</div>

		</div>
		
		<footer class="footer">
				


<!-- <div id="footer">
        <div class="footer-wrapper">
            <div class="footer-logo _1"><a href="#"></a></div>
            <div class="copyright">
                <ul class="footer-menu luan">
                    <li><a href="https://nkvs2.gosu.vn/direct.html?url=https%3A%2F%2Fid.gosu.vn%2FNews%2FDetails%2F17" target="_blank">Điều khoản sử dụng</a></li>
                    <li class="line"></li>
                    <li><a href="https://nkvs2.gosu.vn/direct.html?url=https%3A%2F%2Fid.gosu.vn%2FNews%2FPolicy" target="_blank">Bảo mật tài khoản</a></li>
                    <li class="line"></li>
                    <li><a href="https://id.gosu.vn/Payment?game=nkvs2" target="_blank">Thanh toán</a></li>
                </ul>

                <p style="clear:both; padding:0px;     margin-top: 7px;">
                    © Bản quyền trò chơi thuộc Ixinyou, GOSU độc quyền phát hành tại Việt Nam
                    <br>
                    85 Nguyễn Chí Thanh, Phường Láng Hạ, Quận Đống Đa, Hà Nội
                </p>

            </div>
            <div class="footer-logo _2"><a href="#"></a></div>
        </div>
        <div class="clearfix"></div>
      </div> -->


<div class="footer-gosu">
    <div class="footer-gosu-inner" itemscope="" itemtype="http://schema.org/Organization">
        <a href="https://gosucorp.vn/" title="GOSU" class="footer-logo-gosu" target="_blank"><span itemprop="legalName">GOSU</span></a>
        <p class="footer-link-privacy">
            <a href="http://hotro.gosu.vn/" title="Hỗ Trợ" class="bs" target="_blank">Hỗ Trợ</a>
            |
            <a href="https://nkvs2.gosu.vn/direct.html?url=https%3A%2F%2Fid.gosu.vn%2FNews%2FPolicy" target="_blank" class="bs">Cài Đặt</a>
          |
            <a href="https://nkvs2.gosu.vn/direct.html?url=https%3A%2F%2Fid.gosu.vn%2FNews%2FDetails%2F17" title="Điều Khoản" class="bs" target="_blank">Điều Khoản</a></p>
        <p class="rs">Chơi quá 180 phút một ngày sẽ ảnh hưởng xấu đến sức khỏe</p>
      
        <p class="rs" itemprop="name">Công ty cổ phần trực tuyến GOSU</p>
    <p class="rs" itemprop="address">Địa chỉ: Tầng 3, Tòa nhà HH2 - Bắc Hà, Số 15 Tố Hữu, Phường Nhân Chính, Quận Thanh Xuân, TP. Hà Nội</p>
    <p class="rs" itemprop="telephone">Điện thoại: (+84) 24 6686 0058</p>
    <p class="rs" itemprop="hotline">Hotline: CSKH 1900 7189</p>
    <p class="rs">Thời gian: 8:00 - 22:00 các ngày (GMT+7)</p>
    
        <img src="https://gosucorp.vn/public/logo/eighteen.jpg" width="70" height="101" class="footer-gosu-18">
    </div>
</div>

<style>
  * {
  margin: 0;
  padding: 0;
}
.footer-gosu {
    width: 100%;
    padding: 40px 0 30px;
    text-align: center;
    color: #fff;
    background: #181818;
      font-family: Tahoma, Arial, Helvetica, sans-serift;
    font-size: 14px;
      line-height: 1.5;
}
  .footer-link-privacy {
    margin-bottom: 10px;
  }
  .footer-link-privacy a {
    color: #fff;
    text-decoration: none;
  }
  .footer-link-privacy a:hover {
    color: #ffa000;
  }
.footer-gosu p {
    margin-bottom: 6px;
    color: #fff;
}
.footer-gosu-inner {
  width: 100%;
  max-width: 1000px;
  color: #fff;
    font-size: 13px;
    text-align: center;
    position: relative;
    margin: 0 auto
}

.footer-logo-gosu {
  position: absolute;
    display: block;
    text-indent: -999em;
    background: url(https://gosucorp.vn/public/logo/logo.png) 0 0 no-repeat;
    width: 149px;
    height: 41px;
    left: 0;
    top: -10px;
}

.footer-gosu-18 {
    position: absolute;
    right: 0;
    top: 0;
}

/*media */
@media (max-width: 768px) {
  .footer-logo-gosu {
    position: inherit;
    top: 0;
    margin: 0 auto 10px;
  }
  .footer-gosu-18 {
     display: none;
  }
}
</style>


<script>
	</script>		</footer>
	</div>



	<!-- banner 2 ben -->
	<div class="banner">
		 	</div>

	
	<script type="text/javascript">
	function menu(_obj){
		jQuery(_obj).hover(function(){
            jQuery(this).children('div').stop(true,true).slideToggle(200);
        },function(){
            jQuery(this).children('div').stop(true,true).slideToggle(200);
        });
	}
	jQuery(document).ready(function(){
		menu('.container .header .nav ul li');
	});
</script>
</body>
