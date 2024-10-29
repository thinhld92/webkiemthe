<?php
	include('header.php');
	if (!$_SESSION['username_admin']) movePage('index.php');
	//var_dump($data);
	?>
<!--  END NAVBAR  -->

<?php include('sidebar.php'); ?>

<!-- jQuery UI -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 

<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->
<link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">

<style>
	
	.list-group-item {
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    background-color: #dbedff;
    border: 1px solid rgba(0,0,0,.125);
	}
	.list-group-item-action {
    width: 100%;
    color: #ff0404;
    text-align: inherit;
	}
	
	li.list-group-item.primary.list-group-item-action:hover {
    /* color: black; */
    background-color: #17a2b8;
	}
	
	
	#cameraFileInput {
	display: none;
	}
	
	#pictureFromCamera {
	width: 50%;
	height: auto;
	margin-top: 16px;
	}
	
	.btn {
	display: inline-block;
	background-color: #00b531;
	color: white;
	padding: 8px 12px;
	border-radius: 4px;
	font-size: 16px;
	cursor: pointer;
	}
	
	.btn:hover {
	filter: brightness(0.9);
	}
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
		
	</div>
    <!-- /.content-header -->
	
    <!-- Main content -->
    <section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			
			
			<div class="row">
				<div class="col-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Đổi mật khẩu Admin</h3>
						</div>
						
						<form id="changepassadmin" method="post" action="">
							<div class="card-body">
								
								<div class="form-group">
									<label for="exampleInputEmail1">Tài khoản</label>
									<input type="text" class="form-control" id="user" readonly  value="<?php echo $_SESSION['username_admin'] ?>" placeholder="">
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Mật khẩu</label>
									<input type="text" class="form-control" id="password"  type="password"  placeholder="">
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1">Nhập lại Mật khẩu</label>
									<input type="text" class="form-control" id="repassword"   type="password"  placeholder="">
								</div>
								
								
								
								
							</div>
							<!-- /.card-body -->
							
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Cập nhật</button>
							</div>
						</form>
						<script>
							
							$( "#changepassadmin" ).submit(function( event ) {
							var user = $('#user').val();
							var password = $('#password').val();
							var repassword = $('#repassword').val();
							
							
							$.ajax({					
							url: "ajax/changepasswordadmin.php",
							method: 'POST',
							dataType: 'json',
							data: {
							user: user,
							password: password,
							repassword: repassword
						},
						success: function (resp) {
							if(resp.type == 0){
								swal({
									title: 'Success',
									text: resp.msg,
									type: 'success',
									padding: '2em'
								})
								
								window.setTimeout(function(){
									location.reload();
								}, 1000);
								
								}else{
								
								swal({
									title: 'Error',
									text: resp.msg,
									type: 'error',
									padding: '2em'
								})
								
							}
							
						}
					});
					return false;
					event.preventDefault();
					});
					
				</script>
			</div>
		</div>
		
		
	</div>
	<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>



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

<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script>
$(function () {
// Summernote
$('#summernote').summernote()

// CodeMirror
CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
mode: "htmlmixed",
theme: "monokai"
});
})
</script>



<?php include('footer.php'); ?>																																									