<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">
		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">
					<div class="payment-page dashboard-panel">
						<div class="mb-3">
							<h3 class="heading">Thanh toán qua chuyển khoản ATM, Internet Banking</h3>
							<p class="text-muted">Hệ thống sẽ tự động cộng Xu vào tài khoản của bạn ngay sau khi nhận được khoản thanh toán.</p>
						</div>
						<hr>
						<h4 class="heading">Tỉ Lệ Nạp Thẻ</h4>
						<table class="table table-bordered mt-3">
							<caption>Các mốc thưởng thêm Xu, áp dụng chung cho thanh toán bằng Momo và Chuyển khoản</caption>
							<thead>
								<tr>
									<th scope="col" class="w-50">Mệnh giá</th>
									<th scope="col">Xu nhận được</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>	100.000 <sup>VNĐ</sup>
									</td>
									<td>
										<span class="text-success font-weight-600">120 Xu <i class="icon-energy"></i> (+20%)</span>
									</td>
								</tr>
							</tbody>
						</table>
						<h4 class="heading">Thông tin chuyển khoản</h4>
						<table class="table table-bordered mt-3">
							<thead>
								<tr>
									<th scope="col">Ngân hàng</th>
									<th scope="col">Chủ tài khoản</th>
									<th scope="col">Số tài khoản</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Vietinbank)</td>
									<td>Nguyen Duc Manh</td>
									<td>103006947087</td>
								</tr>
							</tbody>
						</table>
						<div class="text-hint">
							Chuyển khoản theo thông tin bảng trên và copy <strong>chính xác</strong> nội dung dưới đây vào mục nội dung chuyển khoản:
						</div>
						<div class="bg-sand-corner-light text-account">NAP <?php echo $username?> </div>
						<div class="mt-4 font-weight-600 text-danger">
							Lưu ý: Nếu bạn không nhập nội dung chuyển khoản, Xu sẽ không tự cộng vào tài khoản mà phải đợi quản trị viên duyệt.
						</div>
						<div class="font-weight-600">
                                           Tổng  tích lũy nạp: <?php  echo number_format($tong = getSumNap($username)/1000) ; ?> Xu <b class="text-green">(+<?php echo $uudai = getUuDaiNap($username);?>%)</b>
                                          
                                        </div>
					</div>
                    <div class="payment-card">
                        <form action="ajax/atm.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">
                            <div class="form-group">
                                <label for="card_password">Số tiền nạp</label>
                                <input id="sotien" type="number" class="form-control"  name="sotien" value="" placeholder="Nhập số tiền chuyển khoản">
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
                                <input type="submit" name="topupcard" class="btn btn-primary btn-block" value="Xác nhận đã chuyển khoản">
                            </div>

                        </form>
                    </div>
				</div>
			</div>
		</div>
	</main>
</div></body>
</html>