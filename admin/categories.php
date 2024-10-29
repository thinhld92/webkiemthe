<?php $trang="theloai"; ?>
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
				window.location.href = 'categories.php?delcat=' + id;
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
					<h2>Danh Sách Thể Loại</h2>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
			<?php 

			//show message from add / edit page
			if(isset($_GET['delcat'])){ 

				$stmt = $db->prepare('DELETE FROM blog_cats WHERE catID = :catID') ;
				$stmt->execute(array(':catID' => $_GET['delcat']));

				header('Location: categories.php?action=deleted');
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
								<h5>Danh Sách Thể Loại</h5>
							</div>
							<div class="ibox-content">
								<table class="footable table table-stripped toggle-arrow-tiny">
									<thead>
										<tr>
											<th data-toggle="true">Tên Thể Loại</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										try {

											$stmt = $db->query('SELECT catID, catTitle, catSlug FROM blog_cats ORDER BY catTitle DESC');
											while($row = $stmt->fetch()){

												echo '<tr>';
												// echo '<td>'.$row['catTitle'].'</td>';
												echo '<td> <button class="btn btn-lg btn-primary" type="button">'.$row['catTitle'].'</button></td>';
												?>

												<td>
													<!-- <a href="edit-category.php?id=<?php echo $row['catID'];?>"><button class="btn btn-white btn-bitbucket"><i class="fa fa-wrench"></i></button></a>  -->
													<a href="edit-category.php?id=<?php echo $row['catID'];?>"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i> Edit</button></a> 
													<!-- <a href="javascript:delcat('<?php echo $row['catID'];?>','<?php echo $row['catSlug'];?>')"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button></a> -->
												</td>

												<?php 
												echo '</tr>';

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