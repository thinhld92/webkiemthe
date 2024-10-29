<footer class="footer">
    <div class="footer-gosu">
    	<div class="footer-gosu-inner" itemscope="" itemtype="http://schema.org/Organization">
    		
    		<p class="footer-link-privacy">
                <a href="<?php echo $link_logoduoi; ?>" class="footer-logo-gosu" target="_blank"><img src="<?php echo $hinh_logoduoi; ?>" height="108" width="315" title="Công Thành Chiến"></a>
    			<p class="rs">Bản quyền trò chơi thuộc công ty Kingsoft.</p>
<p class="rs">Công ty Cổ phần VNG phân phối độc quyền tại Việt Nam. 182 Lê Đại Hành, Phường 15, Quận 11, TP.HCM.</p>
<p class="rs">Giấy phép phê duyệt nội dung số: 447/BTTTT-VT cấp ngày 26/9/2007 do Bộ Thông Tin Và Truyền Thông cấp</p>

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
				/*text-indent: -999em;*/
				/*background: url(https://gosucorp.vn/public/logo/logo.png) 0 0 no-repeat;*/
				/*width: 149px;
				height: 41px;*/
				left: -100px;
				top: 0px;
			}

			.footer-gosu-18 {
				position: absolute;
				right: 0;
				top: 0;
				padding-top: 10px;
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
    	</script>		
    </footer>
    </div>



    <!-- banner 2 ben -->
    <div class="banner">
    </div>


    <link rel="stylesheet" href="static/templates/frontend/first/css/screen.fancybox.css"/>
    <script type="text/javascript" src="static/templates/frontend/first/js/jquery.syotimer.js"></script>
    
    <style type="text/css">
    	.wrap-bg._le {
    		background: url(static/templates/frontend/first/images/BG-2021-05.jpg) no-repeat center top #070101;
    	}
    </style>
    
    <script type="text/javascript">

    	jQuery(document).ready(function(){

    		$('#simple_timer').syotimer({
    			year: 2021,
    			month: 5,
    			day: 3,
    			hour: 16,
    			minute: 0,
    			afterDeadline: function(timerBlock){
    				$('.wrap-bg').addClass('_le');
    			}
    		});
    	});


    	function menu(_obj){
    		jQuery(_obj).hover(function(){
    			jQuery(this).children('div').stop(true,true).slideToggle(0);
    		},function(){
    			jQuery(this).children('div').stop(true,true).slideToggle(0);
    		});
    	}
    	jQuery(document).ready(function(){
    		menu('.container .header .nav ul li');
    	});
    </script>

    <div class="fb-customerchat" page_id="396640820729782"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    	var js, fjs = d.getElementsByTagName(s)[0];
    	if (d.getElementById(id)) return;
    	js = d.createElement(s); js.id = id;
    	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=828186753941006";
    	fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
</body>