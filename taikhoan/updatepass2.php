<?php include("header.php");?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
	<main class="main">
		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">

				<?php if ($data['email'] == "" || $data['cmnd']== "")
				{
				?>
					<div class="settings dashboard-panel">
						<div class="px-3">
							<h2 class="heading">Cập nhật thông tin bảo mật </h2>
							<p class="text-muted">Bạn cần cập nhật đầy đủ thêm thông tin Email , CMND  để cập nhật mật khẩu cấp 2</p>
						</div>
						<hr>
                        <form action="ajax/updateemail.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">
	
							<div class="form-group">
								<label for="current_password">Email</label>
								<input class="form-control" placeholder="Email" name="email" type="text" value="">
							</div>
							<div class="form-group">
								<label for="password">CMND</label>
								<input class="form-control" placeholder="CMND" name="cmnd" type="text" value="">
							</div>

							<div class="form-group">
								<input type="submit" name="changepass" class="btn btn-primary btn-block" value="Cập nhật thông tin">
							</div>
						</form>
					</div>

					<?php }else { ?>
					<div class="settings dashboard-panel">
						<div class="px-3">
							<h2 class="heading">Cập nhật mật khẩu cấp 2</h2>
							<p class="text-muted">Mật khẩu cần có 6 ký tự trở lên, nên sử dụng cả ký tự, chữ cái và số để tăng tính bảo mật</p>
						</div>
						<hr>
                        <form action="ajax/updatepass2.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">
	
							<div class="form-group">
								<label for="current_password">Mật khẩu cấp 2</label>
								<input class="form-control" placeholder="Mật khẩu cấp 2" name="pass2new" type="password" value="">
							</div>
							<div class="form-group">
								<label for="password">Xác nhận lại Mật khẩu cấp 2</label>
								<input class="form-control" placeholder="Xác nhận lại mật khẩu cấp 2" name="repass2new" type="password" value="">
							</div>

							<div class="form-group">
								<input type="submit" name="changepass" class="btn btn-primary btn-block" value="Cập nhật mật khẩu cấp 2">
							</div>
						</form>
					</div>

					<?php } ?>
				</div>
			</div>
		</div>
	</main>
</div>
</body>
</html>