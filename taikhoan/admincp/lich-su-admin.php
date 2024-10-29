<?php
include('header.php');
if (!$_SESSION['username_admin']) movePage('index.php');


?>
<!--  END NAVBAR  -->

<?php include('sidebar.php'); ?>

<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->
	
    <!-- Main content -->
    <section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Lịch sử admin thao tác</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>cAccName</th>
										<th>Content</th>										
										<th>timeDate</th>
										
										
										
									</tr>
								</thead>
								<tbody>
									<?php 
								
								//$data = $database->query("SELECT  * FROM Account_Info")->fetchAll();
								$data = $database->select("admin_history", "*");
								//print_r($data);
								foreach($data as $history) {
									
							?>
								
										<tr>
											
											<td><?php echo $history['cAccName'] ?></td>
											<td><?php echo $history['Content'] ?></td>
											<td><?php echo $history['timeDate'] ?></td>
											
																			
													</tr>
													
												<?php } ?>    
										</tfoot>
									</table>
								</div>

								</script>
								<!-- /.card-body -->
							</div>
						</div>
						<!-- /.card -->
					</div>
					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
		<script src="plugins/select2/js/select2.full.min.js"></script>
		<!-- DataTables  & Plugins -->
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
					"order": [[ 2, "desc" ]],
					"responsive": true, "lengthChange": false, "autoWidth": false,
					"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
				}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
				
			});
		</script>
		
		
<?php include('footer.php'); ?>																																				