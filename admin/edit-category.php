<?php $trang="theloai"; ?>
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
				if($catID ==''){
					$error[] = 'This post is missing a valid id!.';
				}

				if($catTitle ==''){
					$error[] = 'Please enter the title.';
				}

				if(!isset($error)){

					try {

						$catSlug = url_slug($catTitle);

						//insert into database
						$stmt = $db->prepare('UPDATE blog_cats SET catTitle = :catTitle, catSlug = :catSlug WHERE catID = :catID') ;
						$stmt->execute(array(
							':catTitle' => $catTitle,
							':catSlug' => $catSlug,
							':catID' => $catID
						));

						//redirect to index page
						header('Location: categories.php?action=updated');
						exit;

					} catch(PDOException $e) {
						echo $e->getMessage();
					}
				}
			}
			?>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>Thêm Thể Loại</h2>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Thêm Thể Loại</h5>
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

								$stmt = $db->prepare('SELECT catID, catTitle FROM blog_cats WHERE catID = :catID') ;
								$stmt->execute(array(':catID' => $_GET['id']));
								$row = $stmt->fetch(); 

							} catch(PDOException $e) {
								echo $e->getMessage();
							}
							?>
							<div class="ibox-content">
								<form action='' method='post'>
									<input type='hidden' name='catID' value='<?php echo $row['catID'];?>'>
									<div class="form-group  row"><label class="col-sm-2 col-form-label">Tên Thể Loại</label>
										<div class="col-sm-10"><input type="text" class="form-control" name='catTitle' value='<?php echo $row['catTitle'];?>'></div>
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