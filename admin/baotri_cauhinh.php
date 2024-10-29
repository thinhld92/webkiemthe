<?php $trang="doimk"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admincp</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<!-- FooTable -->
	<link href="css/plugins/footable/footable.core.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script language="JavaScript" type="text/javascript">
		function delcat(id, title)
		{
			if (confirm("Are you sure you want to delete '" + title + "'"))
			{
				window.location.href = 'baotri_cauhinh.php?delcat=' + id;
			}
		}
	</script>
</head>
<body>
	<div id="wrapper">
		<?php include_once 'model/nav.php'; ?>
		<div id="page-wrapper" class="gray-bg">
			<?php include_once 'model/top.php'; ?>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-lg-10">
					<h2>Danh Sách Popup & Code</h2>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<?php 

			//show message from add / edit page
			if(isset($_GET['delcat'])){ 

				$stmt = $db->prepare('DELETE FROM blog_baotri WHERE baotri_Id = :baotri_Id') ;
				$stmt->execute(array(':baotri_Id' => $_GET['delcat']));

				header('Location: baotri_cauhinh.php?action=deleted');
				exit;
			} 
			?>
			<?php 
			//show message from add / edit page
			if(isset($_GET['action'])){ 
				echo '<h3>Category '.$_GET['action'].'.</h3>'; 
			} 
			?>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox ">
							<div class="ibox-title">
								<h5>Danh Sách Popup & Code</h5>
							</div>
							<div class="ibox-content">
								<table class="footable table table-stripped toggle-arrow-tiny">
									<thead>
										<tr>
											<th data-toggle="true">Tên</th>
											<th data-toggle="true">Link</th>
											<th data-toggle="true">Hình ảnh</th>
											<th data-toggle="true">Hiển thị</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										try {

											$stmt = $db->query('SELECT * FROM blog_baotri ORDER BY baotri_Id DESC');
											while($row = $stmt->fetch()){

												// echo '<tr>';
												// echo '<td>'.$row['catTitle'].'</td>';
												// echo '<td> <button class="btn btn-lg btn-primary" type="button">'.$row['baotri_Link'].'</button></td>';
												?>
												<tr>
													<td><button class="btn btn-lg btn-info" type="button"><?php echo $row['baotri_Ten']; ?></button></td>
													<td><button class="btn btn-lg btn-primary" type="button"><?php echo $row['baotri_Link']; ?></button></td>
													<td><img width="130" height="100" src="<?php echo $row['baotri_Img']; ?>"></td>
													<td><a href="kiemtra.php?id=<?php echo $row['baotri_Id'] ?>" class="btn btn-w-m <?php echo $row['baotri_kichhoat'] == 1 ? 'btn-primary  btn-outline' : 'btn-danger' ?>">
                                                            <span><strong><?php echo $row['baotri_kichhoat'] == 1 ? '<i class="fa fa-check"></i> Hiện' : '<i class="fa fa-warning"></i> Ẩn' ?></strong></span>           
                                                        </a></td>
													<td><a href="edit-baotri.php?id=<?php echo $row['baotri_Id'];?>"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i> Edit</button></a> 
														<!-- <a href="javascript:delcat('<?php echo $row['baotri_Id'];?>','<?php echo $row['catSlug'];?>')"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button></a> -->
													</td>
												</tr>

												<?php 
												// echo '</tr>';

											}

										} catch(PDOException $e) {
											echo $e->getMessage();
										}
										?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="5">
												<ul class="pagination float-right"></ul>
											</td>
										</tr>
									</tfoot>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include_once 'model/footer.php'; ?>