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
	<script type = "text/javascript">

		function validateForm()  {
             // Get form via form name:
             var myForm = document.forms["myForm"];

             var u = myForm["passwordConfirm"].value;
             var p = myForm["password"].value;

             if(u== "") {
             	// alert("Vui Lòng nhập đầy đủ thông tin");
             	swal("Thất bại","Vui Lòng nhập đầy đủ thông tin","error");
                 myForm["passwordConfirm"].focus(); // Focus
                 return false;
             }
             if(p == "") {
             	alert("Vui Lòng nhập đầy đủ thông tin");
                 myForm["password"].focus(); // Focus
                 return false;
             }
				// swal("Thành Công","Đã thay đổi thành công","success");setTimeout(function(){ location.href = "index.php" },5000);
             // alert("Đã thay đổi thành công")

             return true;
         }
     </script>
	<!-- <script type="text/javascript">
		 alert("All datas are valid!, send it to the server!")
		</script> -->
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
					if($slide_duoi_img ==''){
						$error[] = 'Please enter the slide.';
					}
					if($slide_duoi_img1 == ''){
						$error[] = 'Please enter the slide.';
					}
					if($slide_duoi_img2 ==''){
						$error[] = 'Please enter the slide.';
					}
					if(!isset($error)){

						try {
							//update into database
							$stmt = $db->prepare('UPDATE blog_slide_duoi SET slide_duoi_img = :slide_duoi_img, slide_duoi_img1 = :slide_duoi_img1, slide_duoi_img2 = :slide_duoi_img2, slide_duoi_img3 = :slide_duoi_img3, slide_duoi_img4 = :slide_duoi_img4') ;
							$stmt->execute(array(
								':slide_duoi_img' => $slide_duoi_img,
								':slide_duoi_img1' => $slide_duoi_img1,
								':slide_duoi_img2' => $slide_duoi_img2,
								':slide_duoi_img3' => $slide_duoi_img3,
								':slide_duoi_img4' => $slide_duoi_img4
							));

							echo '<script type="text/javascript">swal("Thành Công","Cập nhật Thành Công","success");setTimeout(function(){ location.href = "slide_duoi.php" },2000);</script>';
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
						<h2>Cập nhật slide ảnh dưới<u></u></h2>
					</div>
					<div class="col-lg-2">
					</div>
				</div>
				<div class="wrapper wrapper-content animated fadeInRight">
					
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox">
								<div class="ibox-title">
									<h5>Cập nhật slide ảnh dưới<small>võ lâm truyền kỳ</small></h5>
								</div>
								<?php
								//check for any errors
								if(isset($error)){
									foreach($error as $error){
										echo "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
										.$error</div>";
									}
								}
								$stmt = $db->prepare('SELECT * FROM blog_slide_duoi') ;
								$stmt->execute();
								while ($row = $stmt->fetch())
								{							
									?>
									<div class="ibox-content">
										<p>
											Cập nhật cấu hình Slide ảnh Footer.
										</p>
										<form action='' method='post' name="myForm" onsubmit = "return validateForm()">
											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Link Slide 1</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['slide_duoi_img'];?>" name="slide_duoi_img" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link Slide 2</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['slide_duoi_img1'];?>" name="slide_duoi_img1" style="display: block;">
													</div>
												</div>
											</div>

											<div class="hr-line-dashed"></div>

											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Link Slide 3</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['slide_duoi_img2'];?>" name="slide_duoi_img2" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link Slide 4</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['slide_duoi_img3'];?>" name="slide_duoi_img3" style="display: block;">
													</div>
												</div>
											</div>
											<div class="hr-line-dashed"></div>

											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Link Slide 5</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['slide_duoi_img4'];?>" name="slide_duoi_img4" style="display: block;">
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