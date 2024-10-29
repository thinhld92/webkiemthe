
<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">

		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">
					<div class="payment-page dashboard-panel">
						
						<hr>
						<div class="payment-card">
						<h2 class="heading">Đổi tiền tệ</h2>
						<p class="text-muted">
							Lưu ý : Cần thoát khỏi game trước khi tiến hành đổi tiền tệ

						</p>
						<strong><font color='red'> Tỷ lệ quy đổi : 1Xu  = 1000 Đồng </font></strong>
						<form action="ajax/recharge.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">

									
								<div class="form-group">
									<label for="card_serial">Số XU  đang có</label>
									<input id="gcoin" type="text" class="form-control  " readonly name="coin" value="<?php echo $data['xu'] ?> " >
								</div>
								<div class="form-group">
									<label for="card_password">Xu cần đổi</label>
									<input id="wcoin" type="number" class="form-control"  name="xu" value="" placeholder="Nhập vào số Xu cần đổi">
								</div>
								<div class="form-group">
									<label for="topup">Captcha</label><br/>
									<input id="captcha" class="form-control  " name="captcha" placeholder="Captcha" type="text" value="" style="display: inline; width:40%">
									<a href="javascript:changeCaptcha();" id="refreshCaptcha">
									<img src="get_captcha.php" alt="Captcha">
                                
									</a>
									<label for="captcha" alt="Captcha" placeholder="Captcha"></label>
								</div>
			
								<div class="form-group">
									<input type="submit" name="topupcard" class="btn btn-primary btn-block" value="Xác nhận đổi XU">
								</div>
						
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include("footer.php");?>