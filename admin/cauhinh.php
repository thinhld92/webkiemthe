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
					if($title ==''){
						$error[] = 'Please enter the title.';
					}
					if($taigame == ''){
						$error[] = 'taigame do not match.';
					}
					if($link_dangky ==''){
						$error[] = 'Please enter the link_dangky address.';
					}
					if(!isset($error)){

						try {
							//update into database
							$stmt = $db->prepare('UPDATE blog_cauhinh SET title = :title, descr = :descr, keywords = :keywords, taigame = :taigame, link_dangky = :link_dangky, link_napthe = :link_napthe, link_hotro = :link_hotro, link_congdong = :link_congdong, tips =:tips, phone = :phone, og_image =:og_image, link_huongdan =:link_huongdan, link_huongdan_nap =:link_huongdan_nap, link_datquyenvip =:link_datquyenvip, link_auto =:link_auto ') ;
							$stmt->execute(array(
								':title' => $title,
								':descr' => $descr,
								':keywords' => $keywords,
								':taigame' => $taigame,
								':link_dangky' => $link_dangky,
								':link_napthe' => $link_napthe,
								':link_hotro' => $link_hotro,
								':link_congdong' => $link_congdong,
								':tips' => $tips,
								':phone' => $phone,
								':og_image' => $og_image,
								':link_huongdan' => $link_huongdan,
								':link_huongdan_nap' => $link_huongdan_nap,
								':link_datquyenvip' => $link_datquyenvip,
								':link_auto' => $link_auto
							));


							echo '<script type="text/javascript">swal("Thành Công","Cập nhật Thành Công","success");setTimeout(function(){ location.href = "cauhinh.php" },2000);</script>';
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
						<h2>Cập nhật cấu hình<u></u></h2>
					</div>
					<div class="col-lg-2">
					</div>
				</div>
				<div class="wrapper wrapper-content animated fadeInRight">
					
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox">
								<div class="ibox-title">
									<h5>Cập nhật cấu hình <small>võ lâm truyền kỳ</small></h5>
								</div>
								<?php
								//check for any errors
								if(isset($error)){
									foreach($error as $error){
										echo "<div class='alert alert-danger alert-dismissable'><button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
										.$error</div>";
									}
								}
								$stmt = $db->prepare('SELECT * FROM blog_cauhinh') ;
								$stmt->execute();
								while ($row = $stmt->fetch())
								{							
									?>
									<div class="ibox-content">
										<p>
											Cập nhật cấu hình cho toàn bộ website.
										</p>
										<form action='' method='post' name="myForm" onsubmit = "return validateForm()">
											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Tên hiển thị của trang website</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['title'];?>" name="title" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Keywords</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['keywords'];?>" name="keywords" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Descr</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['descr'];?>" name="descr" style="display: block;">
													</div>
												</div>
											</div>

											<div class="hr-line-dashed"></div>

											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Link Đăng Ký</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_dangky'];?>	" name="link_dangky" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link nạp thẻ</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_napthe'];?>" name="link_napthe" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link Tải game</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['taigame'];?>" name="taigame" style="display: block;">
													</div>
												</div>
											</div>
											<div class="hr-line-dashed"></div>

											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Tips (thông báo)</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['tips'];?>" name="tips" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link GroupFB (cộng đồng)</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_congdong'];?>" name="link_congdong" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link Fanpage (hỗ trợ)</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_hotro'];?>" name="link_hotro" style="display: block;">
													</div>
												</div>
											</div>
											<div class="hr-line-dashed"></div>

											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Phone (SĐT hỗ trợ)</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['phone'];?>" name="phone" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Ảnh og:image</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['og_image'];?>" name="og_image" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link hướng dẫn</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_huongdan'];?>" name="link_huongdan" style="display: block;">
													</div>
												</div>
											</div>
											<div class="hr-line-dashed"></div>

											<div class="row">
												<div class="col-md-4">
													<p class="font-bold">Link hướng dẫn nạp</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_huongdan_nap'];?>" name="link_huongdan_nap" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link đặc quyền VIP</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_datquyenvip'];?>" name="link_datquyenvip" style="display: block;">
													</div>
												</div>
												<div class="col-md-4">
													<p class="font-bold">Link auto</p>
													<div class="input-group bootstrap-touchspin">
														<input class="touchspin1 form-control" type="text" value="<?php echo $row['link_auto'];?>" name="link_auto" style="display: block;">
													</div>
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