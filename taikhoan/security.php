<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<style>
    h4.text-red {
    color: red;
}
</style>
    <main class="main">
        <div class="container">
            <div class="dashboard-container">
                <div class="dashboard-content">
                    <div class="security-page dashboard-panel">
                        <hr>

                    <?php if($data['email'] == "" || $data['email'] == null ) {
                        ?>
                       <h4 class="text-red">Bạn chưa cập nhật thông tin email</h4>
                        <?php } ?>

                  
                        <h3 class="heading">Đổi Mật Khẩu</h3>
                        
                        <div class="row mt-4 py-4">
                            <div class="col-sm-4 col-6 mb-4">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="change-password.html" title="Đổi mật khẩu">
                                        <div class="protect-item">
                                            <i class="icon-key"></i>
                                        </div>
                                    </a>
                                    <div class="protect-name">
                                        Đổi mật khẩu
                                    </div>
                                </div>
                            </div>
                                <?php if($data['pass2'] == null) {
                        ?>
                               <div class="col-sm-4 col-6 mb-4">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="update-password-2.html" title="Đổi mật khẩu">
                                        <div class="protect-item">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </a>
                                    <div class="protect-name">
                                        Cập nhật mật khẩu cấp 2
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>

                            <div class="col-sm-4 col-6 mb-4">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="change-password-2.html" title="Đổi mật khẩu">
                                        <div class="protect-item">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </a>
                                    <div class="protect-name">
                                       Đổi mật khẩu cấp 2
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                    
                            <div class="col-sm-4 col-6 mb-4">
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