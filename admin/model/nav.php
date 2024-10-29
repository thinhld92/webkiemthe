<?php //include config
require_once('../includes/config.php');
require_once('func.php');
//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element">
					<!-- <img alt="image" class="rounded-circle" src="img/profile_small.jpg"/> -->
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="block m-t-xs font-bold">Admin Home</span>
					</a>
				</div>
				<div class="logo-element">
					JX
				</div>
			</li>
			<li class="<?php if($trang=='doimk'){echo 'active';} ?>">
				<a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Cấu hình</span> <span class="fa arrow"></span></a>
				<ul class="nav nav-second-level collapse">
					<li><a href="cauhinh.php">Cấu hình website</a></li>
					<li><a href="edit-user.php?id=1">Đổi mật khẩu</a></li>
					<li><a href="cauhinh_slide.php">Cấu hình slide</a></li>
					<!-- <li><a href="cauhinh_popup.php">Cấu hình Popup</a></li> -->
					<!-- <li><a href="slide_duoi.php">Cấu hình slide Footer</a></li> -->
					<!-- <li><a href="baotri.php">Bảo trì</a></li> -->
					<li><a href="baotri_cauhinh.php">Cấu hình Popup & Code</a></li>
					<li><a href="cauhinh_logo.php">Cấu hình Logo</a></li>
					
					
					<!-- <li><a href="dashboard_3.html">Dashboard v.3</a></li>
					<li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
					<li><a href="dashboard_5.html">Dashboard v.5 </a></li>  -->
				</ul>
			</li>
			<li class="<?php if($trang=='theloai'){echo 'active';} ?>">
				<a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Thể Loại</span></a>
				<ul class="nav nav-second-level">
					<li><a href="categories.php">Danh sách Thể Loại</a></li>
					<!-- <li><a href="add-category.php">Thêm Thể Loại</a></li> -->
				</ul>
			</li>				
			<!-- <li class="active"> -->
			<li class="<?php if($trang=='trangchu'){echo 'active';} ?>">
				<a href="#"><i class="fa fa-table"></i> <span class="nav-label">Bài Viết</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="index.php">Danh sách bài viết</a></li>
					<li><a href="add-post.php">Thêm Bài Viết</a></li>
				</ul>
			</li>
			<li class="<?php if($trang=='sukien'){echo 'active';} ?>">
				<a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Theo dòng Sự kiện</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="sukien.php">Danh sách sự kiên</a></li>
					<!-- <li><a href="add-sukien.php">Thêm sự kiện</a></li> -->
				</ul>
			</li>
			<li class="<?php if($trang=='gallery'){echo 'active';} ?>">
				<a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li><a href="cauhinh_gallery.php">Cấu hình gallery</a></li>
					<li><a href="add_gallery.php">Thêm gallery</a></li>
					<!-- <li><a href="add-sukien.php">Thêm sự kiện</a></li> -->
				</ul>
			</li>
		</div>
	</nav>