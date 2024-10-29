<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">
        <div class="container">
            <div class="dashboard-container">
                <div class="dashboard-content">
                    <div class="payment-page dashboard-panel">
                        <h2 class="heading">Thanh toán</h2>
                        <p class="text-muted">
                            Cổng thanh toán hiện hỗ trợ các kênh nạp ví Momo, thanh toán chuyển khoản ATM hoặc hình thức thẻ cào.
                        </p>
						<hr>
                        <div class="row current-credit mb-4">
                            <div class="col-sm-6 mb-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="credit-icon d-flex flex-column align-items-center pt-2">
                                            <img src="assets/images/icon-coin-recharge.png" alt="Xu">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h4 class="text-green"><strong>Xu</strong></h4>
                                        <div class="font-weight-600">
                                            Số Xu còn lại: <?php echo number_format($data['coin'])?> Xu                                        </div>
                                      
                                        <table style="border-collapse: collapse; width: 100%; height: 126px; text-align: center;" border="1">
<tbody>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;"><b>Giá Trị (VNĐ)</b></td>
<td style="width: 50%; height: 18px;"><b>Tiền Xu</b></td>
</tr>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">100.000 VNĐ</td>
<td style="width: 50%; height: 18px;">10.000 Xu</td>
</tr>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">200.000 VNĐ</td>
<td style="width: 50%; height: 18px;">20.000 Xu</td>
</tr>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">500.000 VNĐ</td>
<td style="width: 50%; height: 18px;">50.000 Xu</td>
</tr>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">1.000.000 VNĐ</td>
<td style="width: 50%; height: 18px;">100.000 Xu (+15%)</td>
</tr>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">2.000.000 VNĐ</td>
<td style="width: 50%; height: 18px;">200.000 Xu (+20%)</td>
</tr>
<tr style="height: 18px;">
<td style="width: 50%; height: 18px;">5.000.000 VNĐ</td>
<td style="width: 50%; height: 18px;">500.000 Xu (+30%)</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>

                                    </div>
                                </div>
                            </div>
							
							
                            <div class="col-sm-6 mb-4">
                                <h4 class="text-green"><strong>Lưu Ý:</strong></h4>
                                <div class="font-weight-600">
                                   1. Nên Nạp Qua Các Hình Thức Chuyển Khoản ATM Hoặc Ví Điện Tử Để Nhận Được Nhiều Ưu Đãi Hơn 
                                </div>
                                <div class="font-weight-600">
                                   2. Tỉ Lệ Nạp Thẻ Là : 100.000<sup>đ</sup> = 10.000 Xu
                                </div><br><hr>
                               <h4 class="heading">Chọn phương thức thanh toán</h4>
								<div class="row mt-4 py-4 select-payment-method">
									<div class="col-sm-3 col-6 mb-4">
										<div class="d-flex flex-column align-items-center">
											<a href="card.html" title="Thẻ cào">
												<div class="payment-item">
													<i class="far fa-credit-card"></i>
												</div>
											</a>
											<div class="payment-name">
												Thẻ cào
											</div>
										</div>
									</div>
									<div class="col-sm-3 col-6 mb-4">
										<div class="d-flex flex-column align-items-center">
											<a href="momo.html" title="Momo">
												<div class="payment-item">
													<img class="img-fluid p-4" src="assets/images/logo-momo.png" alt="Momo">
												</div>
											</a>
											<div class="payment-name">
												Momo/ZaloPay
											</div>
										</div>
									</div>
									<div class="col-sm-3 col-6 mb-4">
										<div class="d-flex flex-column align-items-center">
											<a href="atm.html" title="Chuyển khoản">
												<div class="payment-item">
													<i class="fas fa-university"></i>
												</div>
											</a>
											<div class="payment-name">
												Chuyển khoản
											</div>
										</div>
									</div>
									
								</div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div></body>
</html>