<?php
include('header.php');
if (!$_SESSION['username_admin']) movePage('index.php');	
$data = $database->query("SELECT COUNT(username) as TongUSer  FROM account")->fetchAll();
foreach ($data as $item)
{
	$TongUSer =  $item['TongUSer'];
}


?>
<!--  END NAVBAR  -->

<?php include('sidebar.php'); ?>

<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
    
	
	    <div class="content-header">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-12">
					<div class="info-box">
					  <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

					  <div class="info-box-content">
						<span class="info-box-text">Tổng thành viên</span>
						<span class="info-box-number"> <?php echo number_format($TongUSer); ?> Tổng  User</span>
					  </div>
					</div>
				</div>
			</div>
		</div>
    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Danh thành viên</h3>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Tài Khoản</th>
										<th>Mật Khẩu Cấp 2</th>
										<th>Địa Chỉ Email</th>
										<th>Số CMND</th>
										<th>Ngày Đăng Ký</th>
										<th>Số Điện Thoại</th>
										<th>Tiền Xu</th>
										<th>Hành Động</th>
										
									</tr>
								</thead>
								<tbody>
									<?php 
								
							
								$data = $database->query("SELECT *  
								FROM account
								")->fetchAll();

								foreach($data as $user) {
									
							?>
								
										<tr>
											
											<td><?php echo $user['username'] ?></td>
											<td><?php echo $user['secpassword'] ?></td>
											<td><?php echo $user['email'] ?></td>
											<td><?php echo $user['cmnd'] ?></td>
											<td><?php echo $user['dateCreate'] ?></td>
											<td><?php echo $user['phone'] ?></td>
                                            <td><?php echo number_format($user['coin']) ?></td>
								
												<td>
													<div class="btn-group">
														<a href="edit_user.php?id=<?php echo $user['username']?>"><button type="button" class="btn btn-block btn-warning">Sửa</button> </a>
													
													
														</td>
													</tr>
													
												<?php } ?>    
										</tfoot>
									</table>
								</div>
							</div>
						</div>

					</div>

				</div>
			</section>

		</div>
		<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
		<script src="plugins/select2/js/select2.full.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
		<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
		<script src="plugins/jszip/jszip.min.js"></script>
		<script src="plugins/pdfmake/pdfmake.min.js"></script>
		<script src="plugins/pdfmake/vfs_fonts.js"></script>
		<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
		<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
		<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

		
		<script>
			$(function () {
				$("#example1").DataTable({
					"responsive": true, "lengthChange": false, "autoWidth": false,
					"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
				}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
				
			});
		</script>
		
		
<?php include('footer.php'); ?>																																				