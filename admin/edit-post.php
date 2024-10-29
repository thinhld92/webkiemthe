<?php 
$trang="trangchu"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admincp</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- FooTable -->
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<script src='https://cdn.tiny.cloud/1/1xm8m069jo8ydkaxm5insw7f8s4v58d4uv9415fy2hzwhyjd/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>
	<script src="js/ckeditor/ckeditor.js"></script>
	<script src="js/ckfinder/ckfinder.js"></script>

<!-- 	<script>
		tinymce.init({
			selector: '#mytextarea'
		});
	</script>  -->
</head>
<body>
	<div id="wrapper">
		<?php include_once 'model/nav.php'; ?>
		<div id="page-wrapper" class="gray-bg">
			<?php include_once 'model/top.php'; ?>
			<?php
			//if form has been submitted process it
			if(isset($_POST['submit'])){

				// location where initial upload will be moved to
				// $date_uploaded=date("Y-m-d");
				// $target = "static/uploads/images/" .$date_uploaded.$_FILES['postImage']['name'];
				// $path = '../'.$target;

				//collect form data
				extract($_POST);
				//very basic validation
				if($postID ==''){
					$error[] = 'This post is missing a valid id!.';
				}
				if($postTitle ==''){
					$error[] = 'Please enter the title.';
				}
				if($postCont ==''){
					$error[] = 'Please enter the content.';
				}
				// if(isset($_FILES['postImage'])){

				// // find thevtype of image
				// 	switch ($_FILES["postImage"]["type"]) {
				// 		case $_FILES["postImage"]["type"] == "image/gif":
				// 		move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
				// 		break;
				// 		case $_FILES["postImage"]["type"] == "image/jpeg":
				// 		move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
				// 		break;
				// 		case $_FILES["postImage"]["type"] == "image/pjpeg":
				// 		move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
				// 		break;
				// 		case $_FILES["postImage"]["type"] == "image/png":
				// 		move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
				// 		break;
				// 		case $_FILES["postImage"]["type"] == "image/x-png":
				// 		move_uploaded_file($_FILES["postImage"]["tmp_name"], $path);
				// 		break;

				// 		default:
				// 		$error[] = 'Wrong image type selected. Only JPG, PNG or GIF accepted!.';
				// 	}

				// }
				if(!isset($error)){

					try {
						$postSlug = url_slug($postTitle);
						//insert into database
						// if(isset($_FILES['postImage'])){

						// 	$stmt = $db->prepare('UPDATE blog_posts_seo SET postImage = :image WHERE postID = :postID') ;
						// 	$stmt->execute(array(
						// 		':image' => $target,
						// 		':postID' => $postID
						// 	));
						// }
						$stmt = $db->prepare('UPDATE blog_posts_seo SET postDate = :postDate, postTitle = :postTitle, postSlug = :postSlug,  postCont = :postCont, postImage = :postImage WHERE postID = :postID') ;
						$stmt->execute(array(
							':postTitle' => $postTitle,
							':postSlug' => $postSlug,
							':postCont' => $postCont,
							':postImage' => $postImage,
							':postDate' => date('Y-m-d H:i:s'),	
							':postID' => $postID
						));

						
						//delete all items with the current postID
						$stmt = $db->prepare('DELETE FROM blog_post_cats WHERE postID = :postID');
						$stmt->execute(array(':postID' => $postID));

						if(is_array($catID)){
							foreach($_POST['catID'] as $catID){
								$stmt = $db->prepare('INSERT INTO blog_post_cats (postID,catID)VALUES(:postID,:catID)');
								$stmt->execute(array(
									':postID' => $postID,
									':catID' => $catID
								));
							}
						}
						//redirect to index page
						header('Location: index.php?action=updated');
						exit;

					} catch(PDOException $e) {
						echo $e->getMessage();
					}
				}
			}
			?>
			
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>Chỉnh sửa bài viết</h2>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>All form elements <small>With custom checbox and radion elements.</small></h5>
							</div>
							<?php
							//check for any errors
							if(isset($error)){
								foreach($error as $error){
									echo "<div class='alert alert-danger alert-dismissable'>
									<button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
									.$error</div>";
								}
							}

							try {

								$stmt = $db->prepare('SELECT postID, postTitle, postCont, postImage FROM blog_posts_seo WHERE postID = :postID') ;
								$stmt->execute(array(':postID' => $_GET['id']));
								$row = $stmt->fetch(); 

							} catch(PDOException $e) {
								echo $e->getMessage();
							}

							?>
							<div class="ibox-content">
								<form action='' method='post' enctype="multipart/form-data">
									<!-- <form action='' method='post'> -->
										<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>
										<div class="form-group  row"><label class="col-sm-2 col-form-label">Tên Bài viết</label>
											<div class="col-sm-10"><input type="text" class="form-control" name='postTitle' value='<?php echo $row['postTitle'];?>'></div>
										</div>
										<div class="form-group  row"><label class="col-sm-2 col-form-label">hình ảnh</label>

											<div class="col-sm-10">
												<!-- <input class="Ad_i2 submit" type="submit" value="Chọn" onclick="Api()"> -->
												<!-- <input type="file" class="form-control" name='postImage'> -->
												<input type="text" class="form-control" name='postImage' value='<?php echo $row['postImage'];?>'>
												<!-- <?php if ($row['postImage'] !=''){ ?>
													<p><img width="10%" height="10%" src="<?=$url.$row['postImage'];?>"></p>
												<?php } ?> -->
											</div>

										</div>

										<div class="hr-line-dashed"></div>
										<div class="form-group row"><label class="col-sm-2 col-form-label">Nội Dung</label>
											<div class="col-sm-10">											
												<textarea id="editor" class="form-control" name='postCont' cols='30' rows='25'><?php echo $row['postCont'];?></textarea>
											</div>
										</div>

										<div class="hr-line-dashed"></div>
										<div class="form-group row"><label class="col-sm-2 col-form-label">Thể Loại <br/></label>
											<div class="col-sm-10">	
												<?php

												$stmt2 = $db->query('SELECT catID, catTitle FROM blog_cats ORDER BY catTitle');
												while($row2 = $stmt2->fetch()){

													$stmt3 = $db->prepare('SELECT catID FROM blog_post_cats WHERE catID = :catID AND postID = :postID') ;
													$stmt3->execute(array(':catID' => $row2['catID'], ':postID' => $row['postID']));
													$row3 = $stmt3->fetch(); 

													if($row3['catID'] == $row2['catID']){
														$checked = 'checked=checked';
													} else {
														$checked = null;
													}

												// echo "<input type='checkbox' name='catID[]' value='".$row2['catID']."' $checked> ".$row2['catTitle']."<br />";
													echo "<div class='i-checks'><label> <input type='radio' name='catID[]' value='".$row2['catID']."' $checked> <i></i> ".$row2['catTitle']." </label></div>";
												}
												?>																													
											</div>
										</div>
										<div class="hr-line-dashed"></div>
										<div class="form-group row">
											<div class="col-sm-4 col-sm-offset-2">
												<button class="btn btn-primary btn-sm" type='submit' name='submit'>Cập Nhật</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include_once 'model/footer.php'; ?>