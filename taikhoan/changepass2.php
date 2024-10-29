<?php include("header.php");?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
	<main class="main">
		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">
					<div class="settings dashboard-panel">
						<div class="px-3">
							<h2 class="heading">Thay đổi mật khẩu</h2>
							<p class="text-muted">Mật khẩu cần có 6 ký tự trở lên, nên sử dụng cả ký tự, chữ cái và số để tăng tính bảo mật</p>
						</div>
						<hr>
                        <form action="ajax/changepass2.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">

							<div class="form-group">
								<label for="password">Mật khẩu cấp 2 cũ</label>
								<input class="form-control" placeholder="Mật khẩu cấp 2" name="oldpassword2" type="password" value="">
							</div>
							<div class="form-group">
								<label for="password_confirmation">Email</label>
								<input class="form-control" placeholder="Email" name="email" type="email" value="">
							</div>
							<div class="form-group">
								<label for="password_confirmation">CMND</label>
								<input class="form-control" placeholder="Số CMND" name="cmnd" type="text" value="">
							</div>

							<div class="form-group">
								<label for="password">Mật khẩu cấp 2 mới</label>
								<input class="form-control" placeholder="Mật khẩu cấp 2" name="newpassword2" type="password" value="">
							</div>

							<div class="form-group">
								<label for="password">Xác nhận mật khẩu cấp 2 mới</label>
								<input class="form-control" placeholder="Xác nhận mật khẩu cấp 2 mới" name="renewpassword2" type="password" value="">
							</div>

							<div class="form-group">
								<input type="submit" name="changepass" class="btn btn-primary btn-block" value="Thay đổi mật khẩu">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
</body>
</html>