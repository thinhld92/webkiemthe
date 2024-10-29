<nav class="left-menu">
        <ul class="nav flex-column dashboard-menu-left">
        <li class="nav-item">
                <a class="nav-link " href="/">
                    <i class="icon-home"></i>&nbsp;Trang Chủ
                </a>
        </li>
            <li class="nav-item">
                <a class="nav-link " href="/">
                    <i class="icon-home"></i>&nbsp;Thông Tin Tài Khoản
                </a>
            </li>
            
			<li class="nav-item">
                <a class="nav-link " href="change-password.html">
                    <i class="icon-home"></i>&nbsp;Đổi Mật Khẩu Cấp 1
                </a>
            </li>
            
			<?php if($data['secpassword'] == null) {
                        ?>
			<li class="nav-item">
                <a class="nav-link " href="update-password-2.html">
                    <i class="icon-lock"></i>&nbsp;Cập nhật Mật Khẩu Cấp 2
                </a>
            </li>

            <?php } else { ?>
			<li class="nav-item">
                <a class="nav-link " href="change-password-2.html">
                    <i class="icon-lock"></i>&nbsp;Đổi mật khẩu cấp 2
                </a>
            </li>

             <?php } ?>

            <li class="nav-item">
                <a class="nav-link " href="topup.html">
                    <i class="icon-wallet"></i>&nbsp;Nạp thẻ               
                 </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="history.html">
                    <i class="icon-clock"></i>&nbsp;Lịch sử giao dịch                
                </a>
            </li>
			<li class="nav-item">
                <a class="nav-link " href="logout.html">
                    <i class="icon-logout"></i>&nbsp;Đăng xuất                
                </a>
            </li>
        </ul>
    </nav>