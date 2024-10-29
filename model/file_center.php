	<div class="content-center">
		<div class="slide">
			<div class="owl-carousel">

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
			</div>
		</div>        
		<div class="news">
			<div class="nav">
				<ul>
					<?php
					$stmt = $db->query('SELECT catTitle, catSlug FROM blog_cats ORDER BY catID DESC LIMIT 3');
					while($row = $stmt->fetch()){
						echo '<li><a href="c-'.$row['catSlug'].'">'.$row['catTitle'].'</a></li>';
					}
					?>
				</ul>
				<!--  <form class="search-lite">
                    <input type="text" placeholder="Nhập từ khóa tìm kiếm1" />
                    <button type="submit">+</button>
                </form> -->
				<form id="box-search" method="get" action="<?php echo $url; ?>/tim-kiem?" class="search-lite">
					<input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" />
					<button type="submit" value="">+</button>
				</form>
				<!-- <form id="box-search" method="get" action="<?php echo $url; ?>/tim-kiem?" class="box-search">
					<input type="text" class="search" name="keyword" placeholder="Nhập từ khóa tìm kiếm ">
					<input type="submit" class="submit-search" value="">
				</form>	 -->
			</div>
			<div class="list-news">

				<div class="item hot">
					<?php	
					try {
						$pages = new Paginator('1','p');
						$stmt = $db->query('SELECT postID FROM blog_posts_seo');
						$pages->set_total($stmt->rowCount());
						$stmt = $db->query('SELECT * FROM blog_posts_seo ORDER BY postID DESC '.$pages->get_limit());
						while($row = $stmt->fetch()){
							$stmt2 = $db->prepare('SELECT catTitle, catSlug FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
							$stmt2->execute(array(':postID' => $row['postID']));
							$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
							$links = array();
							foreach ($catRow as $cat)
							{
								$links = "<div class='cover'><a  href='".$row['postSlug'].".html' target='_blank' title='".$row['postTitle']."'><img src='".$row['postImage']."' onError='this.src='st/mainsite/imgs/no-image-2.jpg''></a></div><div class='detail'><a  href='".$row['postSlug'].".html' target='_blank' alt='".$row['postTitle']."'><h3 title='".$row['postTitle']."'>".$row['postTitle']."</h3></a><span class='time'>'".$row['postDate']."'</span><p class='desc'>".strip_tags(substr($row['postCont'],0,380))."...</p><a  href='".$row['postSlug'].".html' target='_blank' class='viewmore'>Xem thêm &raquo;</a></div>";
							}
							echo $links;
						}
					} catch(PDOException $e) {
						echo $e->getMessage();
					}
					?>
				</div>
				<div class="list">
					<?php	
					try {
						$pages = new Paginator('15','p');
						$stmt = $db->query('SELECT postID FROM blog_posts_seo');
						$pages->set_total($stmt->rowCount());
						$stmt = $db->query('SELECT * FROM blog_posts_seo ORDER BY postID DESC '.$pages->get_limit());
						while($row = $stmt->fetch()){
							$stmt2 = $db->prepare('SELECT catTitle, catSlug FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
							$stmt2->execute(array(':postID' => $row['postID']));
							$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
							$links = array();
							foreach ($catRow as $cat)
							{							
								$links = "<div class='item'><div class='cover'><a href='".$row['postSlug'].".html' target='_blank' title='".$row['postTitle']."'><img src='".$row['postImage']."' alt='".$row['postTitle']."'></a></div><div class='detail'><a  href='".$row['postSlug'].".html' target='_blank' alt='".$row['postTitle']."'><h3 title='".$row['postTitle']."'>".$row['postTitle']."</h3></a><span class='time'>".date('d-m-y', strtotime($row['postDate']))."</span><a href='".$row['postSlug'].".html' target='_blank' class='viewmore'>Xem thêm &raquo;</a></div></div>";
							}
							echo $links;
						}
					} catch(PDOException $e) {
						echo $e->getMessage();
					}
					?>
				</div>
			</div>
		</div>
		<div class="support">
			<div class="llllll">
                <div class="block-support">
                    <h3>Hỗ trợ</h3>
                    <div class="info-support">
                        <p>Hotline</p>
                        <p class="fone-number"><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                        <p class="border-bottom">(Cước phí: 2000 VND/phút)</p>
                        <p>Trung tâm hỗ trợ</p>
                    </div>
                </div>
               <!--  <div class="block-event">
                	<img src="st/files/uploads/files/thumb/Untitled-2.png" alt="Bảo trì định kỳ">
                </div> -->
                <div class="block-event">
                	<img src="st/files/uploads/files/BNer/b%e1%ba%a3o-tr%c3%ac03.png" alt="Bảo trì định kỳ">
                </div>
                <div class="block-video">
                	<a href="tin-tuc/cap-nhat-tinh-nang.html" data-fancybox><img src="st/files/uploads/files/thumb/updated1.png" alt="Trailer"></a>
                </div>
            </div>
            <div class="rrrrrr">
            	<div class="block-social">
            		<h3>Facebook</h3>
            		<div class="social">
            			<div class="fb-page" data-href="<?php echo $link_hotro; ?>" data-tabs="timeline" data-width="328" data-height="457" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $link_hotro; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $link_hotro; ?>">Võ Lâm</a></blockquote></div>
            		</div>
            	</div>
            </div>
            
        </div>
    </div>