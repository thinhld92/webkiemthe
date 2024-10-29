<?php include_once 'model/head.php';?>
<!--==================== MAIN ====================-->
<main class="main">

	<!--==================== HOME ====================-->

	<div class="home__container container">
		<!--==================== LEFT CONTAINER ====================-->
		<?php include_once 'model/file_felt.php';?>
		<!--==================== CENTER CONTAINER ====================-->
		<div class="center__container">
	
			<div class="center__container-item ">
				<form action="<?php echo $url; ?>/tim-kiem?" method="get" class="search__container">
					<div class="search__content">
						<input type="text"  name="keyword" placeholder="Nhập từ khoá tìm kiếm" autofocus required>
						<button class="btn-search" type="submit"></button>
					</div>
				</form>
			</div>

			<div class="center__container-item slide__container swiper-container slide__pc">
				<div class="swiper-wrapper">

					<?php $stmt = $db->prepare('SELECT * FROM blog_slide') ;
					$stmt->execute();
					while ($row = $stmt->fetch())
					{  
						$slideimg1 = $row['slide_img1'];
						$slidelink1 = $row['slide_link1'];
						$slideimg2 = $row['slide_img2'];
						$slidelink2 = $row['slide_link2'];
						$slideimg3 = $row['slide_img3'];
						$slidelink3 = $row['slide_link3'];
						$slideimg4 = $row['slide_img4'];
						$slidelink4 = $row['slide_link4'];
					} ?>
					<div class="item">
						<a href="<?php echo $slidelink1; ?>" target="_blank">
							<img src="<?php echo $slideimg1; ?>" alt="GĐVL">
						</a>
					</div>
					<div class="item">
						<a href="<?php echo $slidelink2; ?>" target="_blank">
							<img src="<?php echo $slideimg2; ?>" alt="Promotion">
						</a>
					</div>
					<div class="item">
						<a href="<?php echo $slidelink3; ?>" target="_blank">
							<img src="<?php echo $slideimg3; ?>" alt="Đua Top">
						</a>
					</div>
					<div class="item">
						<a href="<?php echo $slidelink4; ?>" target="_blank">
							<img src="<?php echo $slideimg4; ?>" alt="goidautu_ms">
						</a>
					</div>

					<div class="slide__content grid swiper-slide">
						<a class="slide__img" href="<?php echo $slidelink1; ?>" target="_self">
							<img src="<?php echo $slideimg1; ?>" data-thumb="updatet5" data-transition="fade" onError="this.src='static/assets/imgs/slide-1.png'" alt="updatet5"/>
						</a>
					</div>
					<div class="slide__content grid swiper-slide">
						<a class="slide__img" href="<?php echo $slidelink2; ?>" target="_self">
							<img src="<?php echo $slideimg2; ?>" data-thumb="updatet5" data-transition="fade" onError="this.src='static/assets/imgs/slide-1.png'" alt="updatet5"/>
						</a>
					</div>
					<div class="slide__content grid swiper-slide">
						<a class="slide__img" href="<?php echo $slidelink3; ?>" target="_self">
							<img src="<?php echo $slideimg3; ?>" data-thumb="updatet5" data-transition="fade" onError="this.src='static/assets/imgs/slide-1.png'" alt="updatet5"/>
						</a>
					</div>
					<div class="slide__content grid swiper-slide">
						<a class="slide__img" href="<?php echo $slidelink4; ?>" target="_self">
							<img src="<?php echo $slideimg4; ?>" data-thumb="updatet5" data-transition="fade" onError="this.src='static/assets/imgs/slide-1.png'" alt="updatet5"/>
						</a>
					</div>
					
				</div>
				<div class="swiper-pagination swiper-pagination-slide"></div>
			</div>

			<div class="center__container-item slide__container swiper-container slide__mobile">
				<div class="swiper-wrapper">
					<div class="slide__content grid swiper-slide">
						<a class="slide__img" href="<?php echo $slidelink1; ?>" target="_self">
							<img src="<?php echo $slideimg1; ?>" data-thumb="tablet" data-transition="fade"/>
						</a>
					</div>
					<div class="slide__content grid swiper-slide">
						<a class="slide__img" href="<?php echo $slidelink1; ?>" target="_self">
							<img src="<?php echo $slideimg2; ?>" data-thumb="updatet5" data-transition="fade"/>
						</a>
					</div>
				</div>
				<div class="swiper-pagination swiper-pagination-slide"></div>
			</div>

			<div class="center__container-item post__container">
				<div class="post__content">
					<div class="post__tabs">
						<div class="post__button post__active" data-target='#news-tab-1' data-slug="c-tin-tuc">
							<i class="uil uil-graduation-cap post__icon"></i>Tin tức
						</div>
						<div class="post__button " data-target='#news-tab-2' data-slug="c-su-kien">
							<i class="uil uil-graduation-cap post__icon"></i>Sự kiện
						</div>
						 <div class="post__button " data-target='#news-tab-3' data-slug="c-tinh-nang">
							<i class="uil uil-graduation-cap post__icon"></i>Tính Năng
						</div>
						<div class="post__button " data-target='#news-tab-4' data-slug="c-cam-nang">
							<i class="uil uil-graduation-cap post__icon"></i>Cẩm Nang
						</div>
						<div class="post__button-more server-moi">
							<a class="more" id="btn-more" href="c-tin-tuc"></a>
						</div>
					</div>

					<div class="post__sections">
						<div class="post__content post__active " data-content id="news-tab-1">
							<div class="post__data list-news">
								<div class="tin-tuc view">
									<ul class="list custom-scrollbar">
										<li>
											<?php	
											try {
												$pages = new Paginator('1','p');
												$stmt = $db->query('SELECT postID FROM blog_posts_seo');
												$pages->set_total($stmt->rowCount());
												$stmt = $db->query('SELECT * FROM blog_posts_seo ORDER BY postDate DESC '.$pages->get_limit());
												while($row = $stmt->fetch()){
													$stmt2 = $db->prepare('SELECT catTitle, catSlug FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));
													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
													$links = array();
													foreach ($catRow as $cat)
													{

														$links = "<a class='post__title' href='".$row['postSlug'].".html' target='_blank' rel='nofollow' title='".$row['postTitle']."'>
														<span class='time'>[".date('d/m/Y', strtotime($row['postDate']))."]</span> ".$row['postTitle']."
														</a>
														<div class='cover'>
														<a href='".$row['postSlug'].".html' title='".$row['postTitle']."' >
														<img src='static/assets/imgs/logo.png' style='height:50px; border-radius: 4px;' >
														</a>
														</div>
														<p>".strip_tags(substr($row['postCont'],0,250))."...</p>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
											
										</li>
										<li>
											<?php	
											try {
												$pages = new Paginator('20','p');
												$stmt = $db->query('SELECT postID FROM blog_posts_seo');
												$pages->set_total($stmt->rowCount());
												$stmt = $db->query('SELECT * FROM blog_posts_seo ORDER BY postDate DESC '.$pages->get_limit());
												while($row = $stmt->fetch()){
													$stmt2 = $db->prepare('SELECT catTitle, catSlug FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));
													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
													$links = array();
													foreach ($catRow as $cat)
													{							
														$links = "<a class='post__title' href='".$row['postSlug'].".html' title='".$row['postTitle']."'><span class='time'>[".date('d/m/Y', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="post__content  " data-content id="news-tab-2">
							<div class="post__data list-news">
								<div class="tin-tuc view">
									<ul class="list custom-scrollbar">
										<li>
											<?php	
											try {
												$pages = new Paginator('1','p');
												$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
												$stmt->execute(array(':catID' => 4));
												$pages->set_total($stmt->rowCount());
												$stmt = $db->prepare('
													SELECT 
													blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postCont, blog_posts_seo.postDate, blog_posts_seo.postTags, blog_posts_seo.postImage 
													FROM 
													blog_posts_seo,	blog_post_cats
													WHERE
													blog_posts_seo.postID = blog_post_cats.postID
													AND blog_post_cats.catID = :catID
													ORDER BY 
													postDate DESC
													'.$pages->get_limit());
												$stmt->execute(array(':catID' => 4));
												while($row = $stmt->fetch()){
													$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));
													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
													$links = array();
													foreach ($catRow as $cat)
													{
														$links = "<a class='post__title' href='".$row['postSlug'].".html' target='_blank' rel='nofollow' title='".$row['postTitle']."'><span class='time'>[".date('d/m', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a><div class='cover'><a href='".$row['postSlug'].".html' title='".$row['postTitle']."' target='_blank'><img src='static/assets/imgs/logo.png' style='height:50px; border-radius: 4px;'></a></div><p>".strip_tags(substr($row['postCont'],0,250))."...</p>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>
										<li>
											<?php	
											try {
												$pages = new Paginator('20','p');
												$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
												$stmt->execute(array(':catID' => 4));
												$pages->set_total($stmt->rowCount());
												$stmt = $db->prepare('
													SELECT 
													blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc, blog_posts_seo.postDate, blog_posts_seo.postTags, blog_posts_seo.postImage 
													FROM 
													blog_posts_seo,	blog_post_cats
													WHERE
													blog_posts_seo.postID = blog_post_cats.postID
													AND blog_post_cats.catID = :catID
													ORDER BY 
													postDate DESC
													'.$pages->get_limit());
												$stmt->execute(array(':catID' => 4));
												while($row = $stmt->fetch()){

													$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));

													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

													$links = array();
													foreach ($catRow as $cat)
													{

														$links = "<a class='post__title' href='".$row['postSlug'].".html' title='".$row['postTitle']."'><span class='time'>[".date('d/m', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="post__content  " data-content id="news-tab-3">
							<div class="post__data list-news">
								<div class="tin-tuc view">
									<ul class="list custom-scrollbar">
										<li>
											<?php	
											try {
												$pages = new Paginator('1','p');
												$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
												$stmt->execute(array(':catID' => 2));
												$pages->set_total($stmt->rowCount());
												$stmt = $db->prepare('
													SELECT 
													blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postCont, blog_posts_seo.postDate, blog_posts_seo.postTags, blog_posts_seo.postImage 
													FROM 
													blog_posts_seo,	blog_post_cats
													WHERE
													blog_posts_seo.postID = blog_post_cats.postID
													AND blog_post_cats.catID = :catID
													ORDER BY 
													postDate DESC
													'.$pages->get_limit());
												$stmt->execute(array(':catID' => 2));
												while($row = $stmt->fetch()){
													$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));
													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
													$links = array();
													foreach ($catRow as $cat)
													{
														$links = "<a class='post__title' href='".$row['postSlug'].".html' target='_blank' rel='nofollow' title='".$row['postTitle']."'><span class='time'>[".date('d/m', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a><div class='cover'><a href='".$row['postSlug'].".html' title='".$row['postTitle']."' target='_blank'><img src='static/assets/imgs/logo.png' style='height:50px; border-radius: 4px;'></a></div><p>".strip_tags(substr($row['postCont'],0,250))."...</p>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>
										<li>
											<?php	
											try {
												$pages = new Paginator('20','p');
												$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
												$stmt->execute(array(':catID' => 2));
												$pages->set_total($stmt->rowCount());
												$stmt = $db->prepare('
													SELECT 
													blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc, blog_posts_seo.postDate, blog_posts_seo.postTags, blog_posts_seo.postImage 
													FROM 
													blog_posts_seo,	blog_post_cats
													WHERE
													blog_posts_seo.postID = blog_post_cats.postID
													AND blog_post_cats.catID = :catID
													ORDER BY 
													postDate DESC
													'.$pages->get_limit());
												$stmt->execute(array(':catID' => 2));
												while($row = $stmt->fetch()){

													$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));

													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

													$links = array();
													foreach ($catRow as $cat)
													{

														$links = "<a class='post__title' href='".$row['postSlug'].".html' title='".$row['postTitle']."'><span class='time'>[".date('d/m', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="post__content  " data-content id="news-tab-4">
							<div class="post__data list-news">
								<div class="tin-tuc view">
									<ul class="list custom-scrollbar">

										<li>
											<?php	
											try {
												$pages = new Paginator('1','p');
												$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
												$stmt->execute(array(':catID' => 1));
												$pages->set_total($stmt->rowCount());
												$stmt = $db->prepare('
													SELECT 
													blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postCont, blog_posts_seo.postDate, blog_posts_seo.postTags, blog_posts_seo.postImage 
													FROM 
													blog_posts_seo,	blog_post_cats
													WHERE
													blog_posts_seo.postID = blog_post_cats.postID
													AND blog_post_cats.catID = :catID
													ORDER BY 
													postDate DESC
													'.$pages->get_limit());
												$stmt->execute(array(':catID' => 1));
												while($row = $stmt->fetch()){
													$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));
													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
													$links = array();
													foreach ($catRow as $cat)
													{
														$links = "<a class='post__title' href='".$row['postSlug'].".html' target='_blank' rel='nofollow' title='".$row['postTitle']."'><span class='time'>[".date('d/m', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a><div class='cover'><a href='".$row['postSlug'].".html' title='".$row['postTitle']."' target='_blank'><img src='static/assets/imgs/logo.png' style='height:50px; border-radius: 4px;'></a></div><p>".strip_tags(substr($row['postCont'],0,250))."...</p>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>
										<li>
											<?php	
											try {
												$pages = new Paginator('20','p');
												$stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
												$stmt->execute(array(':catID' => 1));
												$pages->set_total($stmt->rowCount());
												$stmt = $db->prepare('
													SELECT 
													blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postDesc, blog_posts_seo.postDate, blog_posts_seo.postTags, blog_posts_seo.postImage 
													FROM 
													blog_posts_seo,	blog_post_cats
													WHERE
													blog_posts_seo.postID = blog_post_cats.postID
													AND blog_post_cats.catID = :catID
													ORDER BY 
													postDate DESC
													'.$pages->get_limit());
												$stmt->execute(array(':catID' => 1));
												while($row = $stmt->fetch()){

													$stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
													$stmt2->execute(array(':postID' => $row['postID']));

													$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

													$links = array();
													foreach ($catRow as $cat)
													{

														$links = "<a class='post__title' href='".$row['postSlug'].".html' title='".$row['postTitle']."'><span class='time'>[".date('d/m', strtotime($row['postDate']))."]</span> ".$row['postTitle']."</a>";
													}
													echo $links;
												}
											} catch(PDOException $e) {
												echo $e->getMessage();
											}
											?>
										</li>

									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="center__container-item bottom__container">
				<div class="bottom__content">
					<a href="/xu-phat-hanh-vi-post-diem-tong-kim.html" title="Xử phạt tống kim" class="bottom__tongkim-notify"></a>
					<div class="bottom__maintenance"></div>

					<div class="bottom__menu">
						<a class="bottom__menu-item-1" href="<?php echo $link_hotro; ?>" target="_blank"></a>
						<a class="bottom__menu-item-2" href="tin-tuc/chu-dong-bao-ve-tai-san-canh-giac-voi-lua-dao.html" target="_self"></a>
						<a class="bottom__menu-item-3" href="/c-tinh-nang" target="_self"></a>
						<a class="bottom__menu-item-4" href="/c-cam-nang" target="_self"></a>            
					</div>
				</div>
			</div>
		</div>

		<!--==================== RIGHT CONTAINER ====================-->
		<div class="right__containner">
			<div class="right__content">
				<a class="right__tongkim-notify" title="Xử phạt tống kim" href="/xu-phat-hanh-vi-post-diem-tong-kim.html"></a>

					
				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="haLN655F"></script>
				
<div class="fb-page" data-href="https://www.facebook.com/kiemthehanthien2009" data-tabs="timeline" data-width="210" data-height="480" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jxthiendieu/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jxthiendieu/">Võ Lâm Thiên Điểu</a></blockquote></div>				
				
				
			</div>
			<!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "675885229498444");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
		</div>        
	</div>
</main>
<?php include_once 'model/footer.php';?>