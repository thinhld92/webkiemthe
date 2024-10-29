<?php include_once 'model/head_tk.php';
?>
<!--==================== MAIN ====================-->
<main class="main">
	<!--==================== HOME ====================-->
	<div class="home__container container">
		<?php include_once 'model/file_felt.php';?>
		<div class="category__container category-margin">
			<div class="category__content">
				<div class="detail-content">
					<div class="head">
						<h3>Kết quả tìm kiếm: <span><?php echo $_GET['keyword']; ?></span></h3>
						<p class="breadcrums"><a href="/">Trang chủ</a> / <span>Tìm kiếm</span></p>
					</div>
					<div class="body">
						<div class="items">
							<?php
							if(isset($_GET['keyword'])){
								$Search =  xss_clean(trim($_GET['keyword']));

								$sql = "SELECT * FROM blog_posts_seo WHERE postCont LIKE :search OR postTitle LIKE :postTitle";

								$stmt = $db->prepare($sql);
								$stmt->bindValue(':search' , '%'.$Search.'%');
								$stmt->bindValue(':postTitle' , '%'.$Search.'%');
								$stmt->execute();
							}
							while ($row=$stmt->fetch()) {
								echo "<div class='item'>
								<div class='cover'>
								<a href='".$row['postSlug'].".html' target='_blank'>
								<img src='".$row['postImage']."' alt='".$row['postTitle']."' onError='this.src='//volamcotruyen.com/static/assets/imgs/no-image-cate.png''>
								</a>
								</div>
								<div class='detail'>
								<h3><a href='".$row['postSlug'].".html' target='_blank'>".$row['postTitle']."</a></h3>
								<p>".strip_tags(substr($row['postCont'],0,380))."...</p>
								</div>
								</div>
								";
							}
							echo "";
							?>
							
						</div>
					</div>
				</div>
			</div>
		</div>        </div>
	</main>

	<?php include_once 'model/footer.php'; ?>