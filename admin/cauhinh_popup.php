<?php 
$trang="doimk";
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
	<script src="js/sweetalert.min.js"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php include_once 'model/nav.php'; ?>
			<div id="page-wrapper" class="gray-bg">
				<?php include_once 'model/top.php'; ?>
				<?php
			//if form has been submitted process it
				if(isset($_POST['submit'])){
				//collect form data
					extract($_POST);
				//very basic validation
					if($popup_link ==''){
						$error[] = 'Please enter the popup link.';
					}
					if($popup_ing == ''){
						$error[] = 'Please enter the popup ing.';
					}
					
					if(!isset($error)){

						try {
							//update into database
							$stmt = $db->prepare('UPDATE blog_popup SET popup_link = :popup_link, popup_ing = :popup_ing') ;
							$stmt->execute(array(
								':popup_link' => $popup_link,
								':popup_ing' => $popup_ing
							));

							echo '<script type="text/javascript">swal("Thành Công","Cập nhật Thành Công","success");setTimeout(function(){ location.href = "cauhinh_slide.php" },2000);</script>';
						// header('Location: index.php?action=updated');
							exit;

						} catch(PDOException $e) {
							echo $e->getMessage();
						}
					}
				}
				?>
				<div class="row wrapper border-bottom white-bg page-heading">
					<div class="col-lg-10">
						<h2>Cập nhật Popup<u></u></h2>
					</div>
					<div class="col-lg-2">
					</div>
				</div>
				<div class="wrapper wrapper-content animated fadeInRight">
					
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox">
								<div class="ibox-title">
									<h5>Cập nhật Popup <small>võ lâm truyền kỳ</small></h5>
								</div>
								<?php
								//check for any errors
								if(isset($error)){
									foreach($error as $error){
										echo "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
										.$error</div>";
									}
								}
								$stmt = $db->prepare('SELECT * FROM blog_popup') ;
								$stmt->execute();
								while ($row = $stmt->fetch())
								{							
									?>
									<div class="ibox-content">
										<p>
											Cập nhật Popup ảnh trang chủ.
										</p>
										<form action='' method='post' name="myForm">
											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Link đường dẫn khi click vào Popup</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['popup_link'];?>" name="popup_link" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link Ảnh 1</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['popup_ing'];?>" name="popup_ing" style="display: block;">
													</div>
												</div>
											</div>
											<div class="hr-line-dashed"></div>
											<div class="form-group row">
												<div class="col-sm-4 col-sm-offset-2">
													<button class="btn btn-primary btn-sm" type='submit' name='submit'>Cập nhật</button>
												</div>
											</div>
										</form>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php include_once 'model/footer.php'; ?>