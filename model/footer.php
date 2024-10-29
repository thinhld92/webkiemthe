<!--<div class="content-right">
	<div class="inner">
		<a href="<?php echo $link_taigame; ?>" class="download a-link-download" onclick="downloadFull()"></a>
		<a href="<?php echo $link_napthe; ?>" class="hotline" target="_blank"></a>
		<a href="<?php echo $link_hotro; ?>" class="trade"></a>
		<a href="<?php echo $link_hotro; ?>" class="fanpage" target="_blank"></a>
		<a href="<?php echo $link_congdong; ?>" class="group" target="_blank"></a>

		<a href="#" class="totop" id="totop"></a>
	</div>
</div>-->

<div class="content-right">
    <div class="inner">
        <a href="<?php echo $link_taigame; ?>" class="download"></a>
        <a href="<?php echo $link_dangky; ?>" class="hotline"></a>
        <a href="<?php echo $link_hotro; ?>" class="trade"></a>
        <a href="<?php echo $link_congdong; ?>" class="fanpage" target="_blank"></a>
        <a  class="group" href="/vongquay"></a>
        <a href="#" class="totop" id="totop"></a>
    </div>
</div>



<footer>
    <p class="Intro"><a href="<?php echo $link_logoduoi; ?>"><img src="<?php echo $hinh_logoduoi; ?>"></a><br>© Bản quyền trò chơi thuộc công ty Kingsoft, công ty Cổ Phần VNG phân phối 
    duy nhất tại Việt Nam. <br>Địa chỉ 182 Lê Đại Hành, Phường 15, Quận 11, TP.HCM.</p>
	 
</footer>
<!-- Tracking copy -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			xfbml            : true,
			version          : 'v7.0'
		});
	};

	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>


<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
attribution=setup_tool
page_id="102114974876987"
theme_color="#0084ff"
logged_in_greeting="Chào đại hiệp! Tiểu nữ có thể giúp gì cho ngài? Hãy gửi nội dung cần hỗ trợ nhé!"
logged_out_greeting="Chào đại hiệp! Tiểu nữ có thể giúp gì cho ngài? Hãy gửi nội dung cần hỗ trợ nhé!">
</div>
</body>
</html>