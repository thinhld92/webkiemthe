<?php $trang="doimk"; ?>
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
</head>
<body>
	<div id="wrapper">
		<?php include_once 'model/nav.php'; ?>
		<div id="page-wrapper" class="gray-bg">
			<?php include_once 'model/top.php'; ?>
			<?php
			if(isset($_POST['submit'])){

				//collect form data
				extract($_POST);

				//very basic validation
				if($baotri_Id ==''){
					$error[] = 'This post is missing a valid id!.';
				}

				if($baotri_Link ==''){
					$error[] = 'Please enter the title.';
				}

				if(!isset($error)){

					try {

						//$catSlug = url_slug($catTitle);

						//insert into database
						$stmt = $db->prepare('UPDATE blog_baotri SET baotri_Link = :baotri_Link, baotri_Img = :baotri_Img WHERE baotri_Id = :baotri_Id') ;
						$stmt->execute(array(
							':baotri_Link' => $baotri_Link,
							':baotri_Img' => $baotri_Img,
							':baotri_Id' => $baotri_Id
						));

						//redirect to index page
						header('Location: baotri_cauhinh.php?action=updated');
						exit;

					} catch(PDOException $e) {
						echo $e->getMessage();
					}
				}
			}
			?>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>Cập nhật</h2>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Cập nhật</h5>
							</div>
							<?php
							//check for any errors
							if(isset($error)){
								foreach($error as $error){
									echo "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
									.$error</div>";
								}
							}
							try {

								$stmt = $db->prepare('SELECT * FROM blog_baotri WHERE baotri_Id = :baotri_Id') ;
								$stmt->execute(array(':baotri_Id' => $_GET['id']));
								$row = $stmt->fetch(); 

							} catch(PDOException $e) {
								echo $e->getMessage();
							}
							?>
							<div class="ibox-content">
								<form action='' method='post'>
									<input type='hidden' name='baotri_Id' value='<?php echo $row['baotri_Id'];?>'>
									<div class="form-group  row"><label class="col-sm-2 col-form-label">Link</label>
										<div class="col-sm-10"><input type="text" class="form-control" name='baotri_Link' value='<?php echo $row['baotri_Link'];?>'></div>
									</div>									
									<div class="hr-line-dashed"></div>
									<div class="form-group  row"><label class="col-sm-2 col-form-label">Ảnh</label>
										<div class="col-sm-10"><input type="text" class="form-control" name='baotri_Img' value='<?php echo $row['baotri_Img'];?>'></div>
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