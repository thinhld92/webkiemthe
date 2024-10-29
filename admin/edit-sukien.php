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
				$date_uploaded=date("Y-m-d");
				$target = "static/uploads/images/" .$date_uploaded. $_FILES['sukienImg']['name'];
				$path = '../'.$target;

				//collect form data
				extract($_POST);
				//very basic validation
				if($sukienId ==''){
					$error[] = 'This post is missing a valid id!.';
				}
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
						$stmt = $db->prepare('UPDATE blog_sukien SET sukienTen = :sukienTen, sukienSlug = :sukienSlug,  sukienCont = :sukienCont WHERE sukienId = :sukienId') ;
						$stmt->execute(array(
							':sukienTen' => $sukienTen,
							':sukienSlug' => $sukienSlug,
							':sukienCont' => $sukienCont,
							':sukienId' => $sukienId
						));

						if(isset($_FILES['sukienImg'])){

							$stmt = $db->prepare('UPDATE blog_sukien SET sukienImg = :image WHERE sukienId = :sukienId') ;
							$stmt->execute(array(
								':sukienId' => $sukienId,
								':image' => $target
							));
						}
						
						//redirect to index page
						header('Location: sukien.php?action=updated');
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

								$stmt = $db->prepare('SELECT sukienId, sukienTen, sukienCont, sukienImg FROM blog_sukien WHERE sukienId = :sukienId') ;
								$stmt->execute(array(':sukienId' => $_GET['id']));
								$row = $stmt->fetch(); 

							} catch(PDOException $e) {
								echo $e->getMessage();
							}

							?>
							<div class="ibox-content">
								<form action='' method='post' enctype="multipart/form-data">
									<input type='hidden' name='sukienId' value='<?php echo $row['sukienId'];?>'>
									<div class="form-group  row"><label class="col-sm-2 col-form-label">Tên Bài viết</label>
										<div class="col-sm-10"><input type="text" class="form-control" name='sukienTen' value='<?php echo $row['sukienTen'];?>'></div>
									</div>
									<div class="form-group  row"><label class="col-sm-2 col-form-label">hình ảnh</label>
										<div class="col-sm-10"><input type="file" class="form-control" name='sukienImg'></div>
										<?php if ($row['sukienImg'] !=''){ ?>
											<p><img width="150" height="200" src="<?=$url.$row['sukienImg'];?>"></p>
										<?php } ?>
									</div>

									<div class="hr-line-dashed"></div>
									<div class="form-group row"><label class="col-sm-2 col-form-label">Link sự kiện</label>
										<div class="col-sm-10">	
										<input type="text" class="form-control" name='sukienCont' value='<?php echo $row['sukienCont'];?>'></div>													
											<!-- <textarea id="editor" class="form-control" name='sukienCont' cols='30' rows='25'><?php echo $row['sukienCont'];?></textarea> -->
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