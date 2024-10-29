<?php include_once 'model/head_w.php'; ?>
<!--==================== MAIN ====================-->
<main class="main">
	<!--==================== HOME ====================-->
	<div class="home__container container">
		<div class="detail__container">
			<div class="detail__content">
				<div class="detail-content">
					<div class="head">
						<h3><?php echo $row['postTitle']; ?></h3>
						<p class="time"><?php  echo''.date('d/m/y', strtotime($row['postDate'])).' '; ?></p>
					</div>
					<div class="body">
						<div class="content">
							<?php echo $row['postCont']; ?>
						</div>

						<div class="detail__post-related">
							<div class="post__related-list">
								<?php 
								try {
									$stmt = $db->prepare('SELECT * FROM blog_posts_seo WHERE postSlug != :postSlug LIMIT 0,4');
									$stmt->execute(array(':postSlug' => $_GET['id']));
									$articles = $stmt->fetchAll();
									foreach ($articles as $row) {
										echo "<div class='title'>
										<a class='tit' href='".$row['postSlug'].".html' title='".$row['postTitle']."' target='_blank' rel='nofollow'>".$row['postTitle']." <span class='time'>".date('d/m', strtotime($row['postDate']))."</span> </a>
										</div>  ";
									}
								} catch (Exception $e) {
									echo $e->getMessage();
								}
								?>            
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include_once 'model/footer.php'; ?>