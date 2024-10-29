<?php include("header.php"); ?>
		<div class="container-fluid account-container">
<?php include("sidebar.php"); ?>
<main class="main">
        <div class="container">
            <div class="dashboard-container">
                <div class="dashboard-content">
                    <div class="payment dashboard-panel">
                        <h2 class="heading">Lịch sử giao dịch</h2>
                        <p class="text-muted">
                            Bao gồm các khoản thanh toán hoặc các giao dịch nạp vào game của bạn.
                        </p>
                        <hr>
                        <p>
                            Mặc định hiển thị 10 giao dịch gần nhất.
                        </p>
                        <table class="table table-responsive-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID Giao Dịch</th>
                                    <th>Loại</th>
                                    <th>Mênh Giá</th>
                                    <th>Seri</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
								$data = $database->query("SELECT  * FROM `card` WHERE `username` = '{$username}' LIMIT 0,10")->fetchAll();
                               // $data = $database->select("card", "*",['username'=>$username]);
								//print_r($data);
								foreach($data as $history) {
									
							?>
                                <tr>
                                    <th><?php echo $history['id']?></th>
                                     <th><?php echo $history['loaithe']?></th>
                                    <th><?php echo number_format($history['menhgia']) ?></th>
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
						<ul class="pagination" style="float: right; padding-right: 3px;">
												</ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div></body>
</html>


