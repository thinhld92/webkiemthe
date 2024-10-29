<?php 
$trang="sukien"; 
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
	<!-- <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> -->
	<!-- <script src="https://nightly.ckeditor.com/21-05-09-06-04/full/samples/js/sample.js"></script> -->

	<!-- <script>
		tinymce.init({
			selector: '#mytextarea'
		});
	</script> --> 

</head>
<body>
	<div id="wrapper">
		<?php include_once 'model/nav.php'; ?>
		<div id="page-wrapper" class="gray-bg">
			<?php include_once 'model/top.php'; ?>
			<?php
			error_reporting(0);
			//if form has been submitted process it
			if(isset($_POST['submit'])){
				// location where initial upload will be moved to
				$date_uploaded=date("Y-m-d");
				$target = "static/uploads/images/" .$date_uploaded. $_FILES['sukienImg']['name'];
				$path = '../'.$target;
			//collect form data
				extract($_POST);
				//very basic validation
				if($sukienTen ==''){
					$error[] = 'Please enter the title.';
				}
				if($sukienCont ==''){
					$error[] = 'Please enter the content.';
				}
				if(isset($_FILES['sukienImg'])){

				// find thevtype of image
					switch ($_FILES["sukienImg"]["type"]) {
						case $_FILES["sukienImg"]["type"] == "image/gif":
						move_uploaded_file($_FILES["sukienImg"]["tmp_name"], $path);
						break;
						case $_FILES["sukienImg"]["type"] == "image/jpeg":
						move_uploaded_file($_FILES["sukienImg"]["tmp_name"], $path);
						break;
						case $_FILES["sukienImg"]["type"] == "image/pjpeg":
						move_uploaded_file($_FILES["sukienImg"]["tmp_name"], $path);
						break;
						case $_FILES["sukienImg"]["type"] == "image/png":
						move_uploaded_file($_FILES["sukienImg"]["tmp_name"], $path);
						break;
						case $_FILES["sukienImg"]["type"] == "image/x-png":
						move_uploaded_file($_FILES["sukienImg"]["tmp_name"], $path);
						break;

						default:
						$error[] = 'Wrong image type selected. Only JPG, PNG or GIF accepted!.';
					}

				}
				if(!isset($error)){

					try {
						$sukienSlug = url_slug($sukienTen);

						//insert into database
						$stmt = $db->prepare('INSERT INTO blog_sukien (sukienTen,sukienSlug,sukienCont,sukienDate) VALUES (:sukienTen, :sukienSlug, :sukienCont,  :sukienDate)') ;
						$stmt->execute(array(
							':sukienTen' => $sukienTen,
							':sukienSlug' => $sukienSlug,							
							':sukienCont' => $sukienCont,							
							':sukienDate' => date('Y-m-d H:i:s')							
						));
						$postID = $db->lastInsertId();

						if(isset($_FILES['sukienImg'])){

							$stmt = $db->prepare('UPDATE blog_sukien SET sukienImg = :image WHERE sukienId = :postID') ;
							$stmt->execute(array(
								':postID' => $postID,
								':image' => $target
							));
						}
						//redirect to index page
						header('Location: sukien.php?action=added');
						exit;
					} catch(PDOException $e) {
						echo $e->getMessage();
					}
				}
			}
			?>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>Thêm Bài viết</h2>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Thêm Bài viết</h5>
							</div>
							<?php
							//check for any errors
							if(isset($error)){
								foreach($error as $error){
									echo "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
									.$error</div>";
								}
							}
							?>
							<div class="ibox-content">
								<form action='' method='post' enctype="multipart/form-data">
									<div class="form-group  row"><label class="col-sm-2 col-form-label">Tên Bài viết</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name='sukienTen' value='<?php if(isset($error)){ echo $_POST['sukienTen'];}?>'></div>
									</div>
									<div class="form-group  row"><label class="col-sm-2 col-form-label">Hình Ảnh</label>
										<div class="col-sm-10"><input type="file" class="form-control" name='sukienImg'></div>
									</div>

									<div class="hr-line-dashed"></div>
									<div class="form-group row"><label class="col-sm-2 col-form-label">Link sự kiện</label>
										<div class="col-sm-10">	
										<input type="text" class="form-control" name='sukienCont' value='<?php if(isset($error)){ echo $_POST['sukienCont'];}?>'></div>										
											<!-- <textarea id="editor" class="form-control" name='sukienCont' cols='30' rows='25'><?php if(isset($error)){ echo $_POST['sukienCont'];}?></textarea> -->
										</div>
									</div>

									<div class="hr-line-dashed"></div>
									<div class="form-group row">
										<div class="col-sm-4 col-sm-offset-2">
											<button class="btn btn-primary btn-sm" type='submit' name='submit'>Thêm</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include_once 'model/footer.php'; ?>