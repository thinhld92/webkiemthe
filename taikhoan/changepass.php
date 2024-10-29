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
                        <form action="ajax/changepass.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">

                            <div class="form-group">
                                <label for="password">Mật khẩu cũ</label>
                                <input class="form-control" placeholder="Mật khẩu cũ" name="oldpassword" type="password" value="">
                            </div>
							<div class="form-group">
								<label for="password">Mật khẩu mới</label>
								<input class="form-control" placeholder="Mật khẩu mới" name="newpassword" type="password" value="">
							</div>
							<div class="form-group">
								<label for="password_confirmation">Xác nhận mật khẩu mới</label>
								<input class="form-control" placeholder="Xác nhận mật khẩu mới" name="renewpassword" type="password" value="">
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