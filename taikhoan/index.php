<?php include("header.php")?>
		<div class="container-fluid account-container">
<?php include("sidebar.php");?>
    <main class="main">
        <div class="container">
            <div class="dashboard-container">
                <div class="dashboard-content">
                    <div class="profile-page settings dashboard-panel">
                        <h2 class="heading">Thông tin cá nhân</h2>
                        <hr>

                        <div class="row profile-summary">
                            <div class="col-sm-3 d-flex flex-column align-items-center">
                                <img data-toggle="modal" data-target="#changeAvatarModal" class="avatar-image rounded-circle" src="assets/images/logo.png" alt="">
                                <!--a class="mt-2 text-dark" href="javascript:void(0);" data-toggle="modal" data-target="#changeAvatarModal">Đổi ảnh đại diện</a-->
                            </div>
                            <div class="col-sm-9 mt-4">
                                <div class="info-row row no-gutters">
                                    <div class="col-sm-2 col-3">Đăng nhập</div>
                                    <div class="col-sm-10 col-9">
                                        IP: <?php echo $ip = getIP()?>       
                                        
                                        <br>
                                        <small class="text-muted">
                                            <?php 
                                              $ua=getBrowser();
                                              $yourbrowser= "Đăng nhập từ : " . $ua['name'].' từ máy tính '.$ua['platform'];
                                              print_r($yourbrowser);
                                            ?>
                                   
                                    </small>
                                    </div>
                                </div>
                                <div class="info-row row no-gutters">
                                    <div class="col-sm-2 col-3">Bảo mật</div>
                                    <div class="col-sm-10 col-9">
                                        <div class="text-primary">
											<style>
												.checked-vote {
													font-weight: 900;
												}
											</style>
											<i class="far fa-star checked-vote" aria-hidden="true"></i>
                                            <i class="far fa-star checked-vote" aria-hidden="true"></i>
                                            <i class="far fa-star checked-vote" aria-hidden="true"></i>
                                            <?php if ($data['safecode'] != 0 ){ ?>
                                                <i class="far fa-star checked-vote" aria-hidden="true"></i>
                                            <i class="far fa-star checked-vote" aria-hidden="true"></i>
                                                <?php } else { ?>
                                            <i class="far fa-star " aria-hidden="true"></i>
                                            <i class="far fa-star " aria-hidden="true"></i>     
                                            <?php } ?>                                  
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3 class="heading">Thông tin tài khoản</h3>

                        <ul class="settings-list">
							<li class="setting-item" >
                                <div class="row info">
                                    <div class="col-3"><strong>Tiền Xu Khả Dụng :</strong></div>
                                    <div class="col-5">
                                        <strong><?php echo number_format($data['coin'])?></strong>
                                    </div>
                            </li>
							<li class="setting-item" >
                                <div class="row info">
                                    <div class="col-3"><strong>Mật Khẩu Cấp 2 :</strong></div>
                                    <div class="col-5">
                                        <strong><?php echo $pass2?></strong>
                                    </div>
                            </li>
							<li class="setting-item" >
                                <div class="row info">
                                    <div class="col-3"><strong>Địa Chỉ Email :</strong></div>
                                    <div class="col-5">
                                        <strong><?php echo $email?></strong>
                                    </div>
                            </li>
							<li class="setting-item" >
                                <div class="row info">
                                    <div class="col-3"><strong>Số Điện Thoại:</strong></div>
                                    <div class="col-5">
                                        <strong><?php echo $fone?></strong>
                                    </div>
                            </li>
							<li class="setting-item" >
                                <div class="row info">
                                    <div class="col-3"><strong>Số Chứng Minh Nhân Dân:</strong></div>
                                    <div class="col-5">
                                        <strong><?php echo $cmnd?></strong>
                                    </div>
                            </li>
							
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>