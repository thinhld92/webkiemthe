<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="vn">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<meta name="description" content="<?php echo $descr; ?>">
	<meta property="og:type" content="game.achievement" />
	<meta property="og:title" content="<?php echo $title_web; ?>" />
	<meta property="og:description" content="<?php echo $descr; ?>" />
	<meta property="og:image" content="<?php echo $og_image; ?>" />
	<meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
	<meta name="facebook-domain-verification" content="7a8t7rs7157w1lis5ez43zfwf0ymd1" />
	<link rel="shortcut icon" href="static/assets/imgs/favicon.ico" />
	<title><?php echo $title_web; ?> - Võ Lâm Truyền Kỳ 1 , Phiên Bản CTC 2005 </title>    
	<link rel="stylesheet" href="static/assets/css/bootstrap.min.css?v=1">
	<link rel="stylesheet" href="static/assets/css/jquery.mCustomScrollbar.min.css?v=1">
	<!-- Swiper -->
	<base href="<?php echo $url; ?>" />
	<link rel="stylesheet" href="static/assets/css/swiper-bundle.min.css?v=1">
	<link rel='stylesheet' type='text/css' media='screen' href='static/assets/css/style.css?v=109'>

	<script src="static/assets/js/swiper-bundle.min.js?v=1"></script>
	<script src='static/assets/js/jquery.min.js?v=1'></script>
	<script src='static/assets/js/jquery.cookie.js?v=1'></script>
	<script src="static/assets/js/jquery.mCustomScrollbar.js?v=1"></script>
	<!-- Swiper -->
	<script src='static/assets/js/main.js?v=1091'></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KRXNM4Y3GG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KRXNM4Y3GG');
</script>
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '659288041421281');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=659288041421281&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
		</head>
		<body class="wrapper-body">
			<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>


			<!-- Facebook Pixel Code -->
			<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
					n.callMethod.apply(n,arguments):n.queue.push(arguments)};
					if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
					n.queue=[];t=b.createElement(e);t.async=!0;
					t.src=v;s=b.getElementsByTagName(e)[0];
					s.parentNode.insertBefore(t,s)}(window, document,'script',
						'../connect.facebook.net/en_US/fbevents.js');
					fbq('init', '367479974474653');
					fbq('track', 'PageView');
				</script>

				<noscript><img height="1" width="1" style="display:none"
					src="https://www.facebook.com/tr?id=367479974474653&amp;ev=PageView&amp;noscript=1"
					/></noscript>
					<!-- End Facebook Pixel Code -->


					<!-- Google Tag Manager -->
                    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                    })(window,document,'script','dataLayer','GTM-M99G83P');</script>
                    <!-- End Google Tag Manager -->
                    <!-- Google Tag Manager (noscript) -->
                    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M99G83P"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                    <!-- End Google Tag Manager (noscript) -->
					
					<header>
					
						<div class="header">
						
							<nav class="nav container">
								<a href="<?php echo $link_logotren; ?>"><img src="<?php echo $hinh_logotren; ?>" alt="<?php echo $title_web; ?>" class="nav__logo"></a>
								<div class="nav__menu">
									<ul class="nav__list">
										<li class="nav__item"><a href="/" target="_self">Trang chủ </a></li>
										<li class="nav__item"><a href="c-tin-tuc" target="_self">Tin tức </a></li>
										<li class="nav__item"><a href="c-su-kien" target="_self">Sự kiện </a></li>
										<li class="nav__item"><a href="c-tinh-nang" target="_self">Tính Năng </a></li>
										<li class="nav__item"><a href="<?php echo $link_hotro; ?>" target="_blank">Fanpage </a></li>
										<li class="nav__item"><a href="<?php echo $link_congdong; ?>" target="_blank">Group </a></li>       
									</ul>
								</div>
								<div class="nav__menu-mobile">
									<div class="menu__mobile-content">
										<div class="menu__mobile-item">
											<a href="/"><img src="static/assets/imgs/logo.png?v=1" alt="<?php echo $title_web; ?>" class="nav__logo-mobile"></a>
										</div>
										<div class="menu__mobile-item btn-list">
											<!--<a href="#" target="_blank" class="btn btn-download btn-dropdown-dl"><span>Tải game</span></a>-->
											<a href="<?php echo $link_dangky; ?>" target="_blank" class="btn btn-account"></a>
											<a href="<?php echo $link_dangky; ?>" target="_blank" class="btn btn-payments"></a>

											<div class="menu-dropdown-list">
												<ul>
													<li><a href="<?php echo $link_taigame; ?>" class="a-link-download" onclick="downloadFull()">Bản đầy đủ 3Gb</a></li>
													<li><a href="<?php echo $link_taigame; ?>" class="a-link-download-miniclient" onclick="downloadMini()">Bản cập nhật 72Mb</a></li>
												</ul>
											</div>
										</div>
										<div class="menu__mobile-item">
											<a href="#" class="swapmenu menu__mobile-item"></a>

											<div class="menu-mobile">
												<ul>
													<li><a href="index.html" target="_self">Trang chủ </a></li>
													<li><a href="c-tin-tuc" target="_self">Tin tức </a></li>
													<li><a href="c-su-kien" target="_self">Sự kiện </a></li>
													<li><a href="c-tinh-nang" target="_self">Tinh Năng </a></li>
													<li><a href="<?php echo $link_hotro; ?>" target="_blank">Fanpage </a></li>
													<li><a href="<?php echo $link_congdong; ?>" target="_blank">Group </a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>
					</header>