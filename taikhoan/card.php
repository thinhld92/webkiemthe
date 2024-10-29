<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">
		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">
					<div class="payment-page dashboard-panel">
						<h2 class="heading">Nạp thẻ cào</h2>
						<p class="text-muted">
							Nạp thẻ cào sẽ không nhận được bất kỳ khuyến mại nào, đây là kênh nạp không được khuyến khích sử dụng.
						</p>
						<hr>
						<div class="payment-card">
						<form action="ajax/napthe.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">
								<div class="form-group">
									<label for="card-provider"><strong>Chọn loại thẻ</strong></label>
									<div class="col-lg-10">
									  <select class="form-control" name="chonmang">
										  <?php 
										  $mang_option = file_get_contents("http://api.napthengay.com/v2/AllowedNetworks.php");
										  echo $mang_option;
										  ?>
										</select>
									</div>
								</div>
								<div class="form-group card-select-amount">
									<label for="recharge-selected-value"><strong>Chọn mệnh giá thẻ</strong></label>
										<div class="col-lg-10">
										  <select class="form-control" name="card_value">
											  <option value="">Chọn đúng mệnh giá</option>
											  <option value="10000">10,000</option>
											  <option value="20000">20,000</option>
											  <option value="50000">50,000</option>
											  <option value="100000">100,000</option>
											  <option value="200000">200,000</option>
											  <option value="500000">500,000</option>
											</select>
											<div id="cardValueHelp" class="form-text text-danger">
											<strong>Lưu ý: Chọn chính xác mệnh giá, Chọn sai mệnh giá sẽ không nhận được tiền</strong>
											</div>
										</div>

								</div>
								<div class="form-group">
									<label for="txtseri"><strong>Số seri của thẻ</strong></label>
									<div class="col-lg-10">
									<input id="txtseri" type="text" class="form-control" name="txtseri" value="" placeholder="Nhập vào số seri của thẻ">
									</div>
								</div>
								<div class="form-group">
									<label for="txtpin"><strong>Mật mã của thẻ</strong></label>
									<div class="col-lg-10">
									<input id="txtpin" type="text" class="form-control" name="txtpin" value="" placeholder="Nhập vào mật mã của thẻ">
									</div>
								</div>
								<div class="form-group">
									<label for="topup"><strong>Captcha</strong></label><br/>
									<input id="captcha" class="form-control  " name="captcha" placeholder="Captcha" type="text" value="" style="display: inline; width:35%">
									<a href="javascript:changeCaptcha();" id="refreshCaptcha">
									<img src="get_captcha.php" alt="Captcha">
                                
									</a>
									<label for="captcha" alt="Captcha" placeholder="Captcha"></label>
								</div>
								<div class="form-group">
									<div class="form-help text-hint">Bạn cũng có thể thanh toán qua
										<a href="momo.html">Momo</a> hoặc <a href="atm.html">ATM</a> để được hưởng các khuyến mại.
									</div>
								</div>
								<div class="form-group">
									<div class="col-lg-10">
										<input type="submit" name="topupcard" class="btn btn-primary btn-block" value="Nạp thẻ">
									</div>
								</div>
								<hr>	

			<h2 class="heading">Lịch sử</h2>
						<table class="table table-responsive-sm table-bordered table-hover">
                            <thead>
                                <tr>
									<th>Loại</th>
                                    <th>Mênh Giá</th>
                                    <th>Seri</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
							<tbody>
                            <?php
								$data = $database->query("SELECT  * FROM `card` WHERE `username` = '{$username}' LIMIT 0,5")->fetchAll();
                               // $data = $database->select("card", "*",['username'=>$username]);
								//print_r($data);
								foreach($data as $history) {
									
							?>
                                <tr>
                                     <th><?php echo $history['loaithe']?></th>
                                    <th><?php echo $history['menhgia']?></th>
                                    <th><?php echo $history['seri']?></th>
                                    <th>
                                        <?php
                                            switch ($history['trangthai']) {
                                                case 4:
                                                    echo "<font color='blue'>Đang chờ sử lý</font>";
                                                    break;
                                                case 3:
                                                    echo "<font color='red'>Thẻ sai</font>";
                                                    break;
                                                case 2:
                                                    echo "<font color='#006400'>Đã duyệt</font>";
                                                    break;
                                            }
                                        ?>


                                    </th>
                                    <th><?php echo $history['created_at']?></th>
                                </tr>
							<?php }  ?>
									
							</tbody>
						</table>
						
						
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div></body>
</html>