<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">
		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">
					<div class="payment-page dashboard-panel">
						<h3 class="heading">Thanh toán qua Momo/ZaloPay</h3>
						<p class="text-muted">Thanh toán hoàn toàn tự động và không cần đợi duyệt, ngoài ra còn nhận được các mốc khuyến mại hấp dẫn.</p>
						<hr>
						<h4 class="heading">Tỉ Lệ Nạp Thẻ:</h4>
						<table class="table table-bordered mt-3">
							<caption>Các mốc thưởng thêm Xu, áp dụng chung cho thanh toán bằng Momo/ZaloPay và Chuyển khoản</caption>
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
						<div class="mb-3">
							<h3 class="heading">Hình thức chuyển khoản</h3>
							<p class="text-muted">
								Chuyển khoản hoặc quét Momo/ZaloPay với nội dung dưới đây, nội dung cú pháp nạp không phân biệt hoa thường.
							</p>
						</div>
						<!-- <center><img src="assets/images/momo.png" class="img-responsive center-block" width="120px"></center> -->
						<div class="bg-sand-corner-light p-4 mb-4">
							<div class="row no-gutters">
								<div class="col-sm-4 col-6 mb-3">
									Tên tài khoản:
								</div>
								<div class="col-sm-8 col-6 mb-3">
									<span class="font-weight-600">Nguyễn Đức Mạnh</span>
								</div>
								<div class="col-sm-4 col-6 mb-3">
									Số điện thoại:
								</div>
								<div class="col-sm-8 col-6 mb-3">
									<span class="font-weight-600">0946436113</span>
								</div>
								<div class="col-sm-4 col-6 mb-3">
									Nội dung chuyển khoản:
								</div>
								<div class="col-sm-8 col-6 mb-3">
									<span class="font-weight-600">NAP <?php echo $username ?></span>
								</div>
								<div class="col-sm-12">
									<span>Trong đó: <strong>NAP</strong> là tên cú pháp, <strong><?php echo $username ?></strong> là tên tài khoản của bạn, nội dung không cần phân biệt hoa thường.</span>
								</div>

								<div class="font-weight-600">
                                           Tổng  tích lũy nạp: <?php  echo number_format($tong = getSumNap($username)/1000) ; ?> Xu <b class="text-green">(+<?php echo $uudai = getUuDaiNap($username);?>%)</b>
                                          
                                        </div>
							</div>
						</div>

                        <div class="payment-card">
                            <form action="ajax/momo.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">
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
		</div>
	</main>
</div></body>
</html>