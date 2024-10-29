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
					// if($username ==''){
					// 	$error[] = 'Please enter the username.';
					// }
					if( strlen($password) > 0){
						if($password ==''){
							$error[] = 'Please enter the password.';
						}
						if($passwordConfirm ==''){
							$error[] = 'Please confirm the password.';
						}
						if($password != $passwordConfirm){
							$error[] = 'Passwords do not match.';
						}
					}
					if($email ==''){
						$error[] = 'Please enter the email address.';
					}
					if(!isset($error)){

						try {
							if(isset($password)){
								$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
							//update into database
								$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID') ;
								$stmt->execute(array(
									':username' => $username,
									':password' => $hashedpassword,
									':email' => $email,
									':memberID' => $memberID
								));

							} 
						// else {

						// //update database
						// 	$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID') ;
						// 	$stmt->execute(array(
						// 		':username' => $username,
						// 		':email' => $email,
						// 		':memberID' => $memberID
						// 	));
						// }

						//redirect to index page
						// <script type="text/javascript">
						// alert('học lập trình online toidicode.com');
						// </script>
						// echo 'Chuẩn bị gửi mail...<meta http-equiv="refresh" content="2;url=index.php?action=updated">';
						echo '<script type="text/javascript">swal("Thành Công","Đổi Mật Khẩu Thành Công","success");setTimeout(function(){ location.href = "logout.php" },2000);</script>';
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
						<h2>Đổi mật khẩu</h2>
					</div>
					<div class="col-lg-2">
					</div>
				</div>
				<div class="wrapper wrapper-content animated fadeInRight">
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox ">
								<div class="ibox-title">
									<h5>đổi mật khẩu</h5>
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

									$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID') ;
									$stmt->execute(array(':memberID' => $_GET['id']));
									$row = $stmt->fetch(); 

								} catch(PDOException $e) {
									echo $e->getMessage();
								}
								?>
								<div class="ibox-content">
									<form action='' method='post' name="myForm" onsubmit = "return validateForm()">
										<input type='hidden' name='memberID' value='<?php echo $row['memberID'];?>'>
										<div class="form-group  row"><label class="col-sm-2 col-form-label">Tên tài khoản</label>
											<div class="col-sm-4"><input type="text" class="form-control" name='username' value='<?php echo $row['username'];?>'Disabled>
											</div>
										</div>									
										<div class="hr-line-dashed"></div>
										<div class="form-group  row"><label class="col-sm-2 col-form-label" required="required">Mật khẩu</label>
											<div class="col-sm-4"><input class="form-control" type='password' name='password' id='password'></div>
										</div>											
										<div class="hr-line-dashed"></div>
										<div class="form-group  row"><label class="col-sm-2 col-form-label" required="required">Nhập lại mật khẩu</label>
											<div class="col-sm-4"><input class="form-control" type='password' name='passwordConfirm' id='passwordConfirm' value=''></div>
										</div>									
										<div class="hr-line-dashed"></div>
										<div class="form-group  row"><label class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-4"><input class="form-control" type='text' name='email' value='<?php echo $row['email'];?>'></div>
										</div>									

										<div class="hr-line-dashed"></div>
										<div class="form-group row">
											<div class="col-sm-4 col-sm-offset-2">
												<button class="btn btn-primary btn-sm" type='submit' name='submit'>Cập nhật</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include_once 'model/footer.php'; ?>