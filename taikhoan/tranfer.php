
<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">
<?php 
 $uudai = getUuDaiNap($username); 
 if ($uudai <= 0 ) { 
    exit('404!');
}
?>
		<div class="container">
			<div class="dashboard-container">
				<div class="dashboard-content">
					<div class="payment-page dashboard-panel">
						
						<hr>
						<div class="payment-card">
						<h2 class="heading">Chuyển xu cho tài khoản khác</h2>
						<p class="text-muted">
							Lưu ý : Tài khoản nhận xu phải chính xác trên hệ thống

						</p>
						 <div class="font-weight-600">
                                           Tổng  tích lũy nạp: <?php  echo number_format($tong = getSumNap($username)/1000) ; ?> Xu <b class="text-green">(+<?php echo $uudai = getUuDaiNap($username);?>%)</b>
                                          
                                        </div>
						<form action="ajax/tranfer.php" onsubmit="APIMUMOBILE.submitTarget(this,'#alertResult');return false;">

									
								<div class="form-group">
									<label for="card_serial">Số XU  đang có</label>
									<input id="gcoin" type="text" class="form-control  " readonly name="coin" value="<?php echo $data['xu'] ?> " >
								</div>

                                <div class="form-group">
									<label for="card_password">Tài khoản nhận</label>
									<input id="username_nhan" type="text" class="form-control"  name="username_nhan" value="" placeholder="Nhập vào tài khoản nhận xu">
								</div>

								<div class="form-group">
									<label for="card_password">Số xu cần chuyển</label>
									<input id="wcoin" type="number" class="form-control"  name="xu" value="" placeholder="Nhập vào số Xu cần chuyển">
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
									<input type="submit" name="topupcard" class="btn btn-primary btn-block" value="Xác nhận chuyển XU">
								</div>
						
							</form>


                            <table class="table table-responsive-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID Giao Dịch</th>
                                    <th>Người nhận</th>
                                    <th>Xu</th>                                   
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
								$data = $database->query("SELECT  * FROM `chuyenxu_log` WHERE `username` = '{$username}' LIMIT 0,20")->fetchAll();
                               // $data = $database->select("card", "*",['username'=>$username]);
								//print_r($data);
								foreach($data as $history) {
									
							?>
                                <tr>
                                    <th><?php echo $history['id']?></th>
                                     <th><?php echo $history['username_nhan']?></th>
                                    <th><?php echo number_format($history['xuchuyen']) ?></th>

                  
                                    <th><?php echo $history['thoigian']?></th>
                                </tr>
							<?php }  ?>
									
							</tbody>
                        </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php include("footer.php");?>