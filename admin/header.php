<?php
	require_once("../db.php");
	if(isset($_SESSION['user_id'])){
		$user_ID = $_SESSION["user_id"];
		$queryUserType = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_ID");
		$showUserType = mysqli_fetch_assoc($queryUserType);
	}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 10:20:07 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- Title -->
		<title>Admin Panel</title>
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap4/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate.css/animate.min.css">
		<link rel="stylesheet" href="vendor/jscrollpane/jquery.jscrollpane.css">
		<link rel="stylesheet" href="vendor/waves/waves.min.css">
		<link rel="stylesheet" href="vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="vendor/morris/morris.css">
		<link rel="stylesheet" href="vendor/jvectormap/jquery-jvectormap-2.0.3.css">
		<link rel="stylesheet" href="vendor/DataTables/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="vendor/DataTables/Buttons/css/buttons.dataTables.min.css">
		<link rel="stylesheet" href="vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css">
		<link rel="stylesheet" href="vendor/dropify/dist/css/dropify.min.css">
		<!-- date picker  -->
		<link rel="stylesheet" href="vendor/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
		<link rel="stylesheet" href="vendor/clockpicker/dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="vendor/bootstrap-daterangepicker/daterangepicker.css">
		<link rel="stylesheet" href="vendor/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="vendor/summernote/summernote.css">


		<!-- select 2 -->

		<link rel="stylesheet" href="vendor/select2/dist/css/select2.min.css">
		<link rel="stylesheet" href="vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="vendor/multi-select/css/multi-select.css">
		<link rel="stylesheet" href="vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
		<link rel="stylesheet" href="vendor/Magnific-Popup/dist/magnific-popup.css">


		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="fixed-sidebar fixed-header skin-default content-appear">
		<div class="wrapper">
			<!-- Preloader -->
			<div class="preloader"></div>
			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="site-sidebar">
				<div class="custom-scroll custom-scroll-light">
					<ul class="sidebar-menu">
						<li class="menu-title">Main</li>
						<li>
							<a href="home.php" class="waves-effect  waves-light">
								<span class="s-icon"><i class="ti-anchor"></i></span>
								<span class="s-text">Dashboard</span>
							</a>
						</li>
						<?php if($showUserType["user_type"]=='admin'){ ?>
							<li>
								<a href="users.php?showUser" class="waves-effect  waves-light">
									<span class="s-icon"><i class="fa fa-users"></i></span>
									<span class="s-text">User</span>
								</a>
							</li>
						<?php } ?>
						<li class="menu-title">Components</li>
						<?php
							if(isset($_SESSION['user_id'])){
								$count_email = mysqli_query($conn,"SELECT COUNT(subs_id) FROM subscribers where flag=0");
								 while($email = mysqli_fetch_array($count_email)){$total_email = $email[0];}

							}
						?>
						<li>
							<a href="products.php?projectFlag" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-book"> &nbsp&nbsp Add Products</i></span>
							</a>
						</li>
						<li>
							<a href="product-list.php?projectFlag" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-list"> &nbsp&nbsp Products List</i></span>
							</a>
						</li>
						<?php if($showUserType["user_type"]=='admin'){ ?>
						<li class="with-sub">
							<a href="#" class="waves-effect  waves-gray">
								<span class="s-caret"><i class="fa fa-angle-down"></i></span>
								<span class="s-icon"><i class="fa fa-newspaper-o"></i></span>
								<span class="s-text">News</span>
							</a>
							<ul>
								<li><a href="news.php">Post News</a></li>
								<li><a href="list_news.php">List News</a></li>
							</ul>
						</li>

						<li>
							<a href="contacts.php?flagContact" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-pencil">&nbsp &nbsp Contacts</i></span>
							</a>
						</li>
						<li>
							<a href="comments.php" class="waves-effect  waves-light">
								<span class="s-icon"><i class="fa fa-reply"></i></span>
								<span class="s-text">Comments</span>
							</a>
						</li>
						<li>
							<a href="subscribes.php?flagEmail=1" class="waves-effect nav-link  waves-light">
								<span class="s-icon"><i class="ti-email">&nbsp Subscribes Email</i></span>
								<?php if($total_email>0){ ?>
								  <div class="tag tag-warning float-xs-right"><?php echo $total_email; ?></div>
								<?php } ?>
							</a>
						</li>
							<li>
								<a href="slider.php?sliderShow" class="waves-effect  waves-light">
									<span class="s-icon"><i class="ti-gallery"></i></span>
									<span class="s-text">Slider</span>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<?php
				if(isset($_SESSION['user_id'])){
					$id = $_SESSION["user_id"];
					$query_u = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id");
					$userss = mysqli_fetch_assoc($query_u);
				}
			?>
			<!-- Header -->
			<div class="site-header">
				<nav class="navbar navbar-light">
					<div class="navbar-left">
						<a class="navbar-brand" href="home.php">
							<div class="logoo" style="color:#fff; font-size:20px;"><b><?php echo $userss["user_name"]; ?></b></div>
						</a>
						<div class="toggle-button dark sidebar-toggle-first float-xs-left hidden-md-up">
							<span class="hamburger"></span>
						</div>
						<div class="toggle-button-second dark float-xs-right hidden-md-up">
							<a href="#" data-toggle="dropdown" aria-expanded="false">
								<span class="avatar box-32">
									<img src="<?php echo $userss["user_photo"]; ?>" alt="" title="<?php echo $userss["user_name"]; ?>">
								</span>
							</a>
							<div class="dropdown-menu fadeInUp">
								<a class="dropdown-item" href="edit_user.php?user_id=<?php echo $userss["user_id"]; ?>" title="Setting">
									<i class="ti-settings mr-0-5"></i> Settings
								</a>
							  <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php"><i class="ti-power-off mr-0-5" title="Sign out"></i> Sign out</a>
							</div>
						</div>
						<div class="toggle-button dark float-xs-right hidden-md-up" data-toggle="collapse" data-target="#collapse-1">
							<span class="more"></span>
						</div>
					</div>
					<div class="navbar-right navbar-toggleable-sm collapse" id="collapse-1">
						<div class="toggle-button-second light float-xs-right hidden-sm-down">
						</div>
						<ul class="nav navbar-nav float-md-right">
							<li class="nav-item dropdown hidden-sm-down">
								<a href="#" data-toggle="dropdown" aria-expanded="false">
									<span class="avatar box-32">
										<?php if($userss["user_photo"]!=NULL){ ?>
											<img src="<?php echo $userss["user_photo"]; ?>" alt="" title="<?php echo $userss["user_name"]; ?>">
										<?php }else{ ?>
											<i class="fa fa-user" style="font-size:30px;"></i>
										<?php } ?>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right animated fadeInUp">
									<a class="dropdown-item" href="">
										<i class="ti-user mr-0-5"></i> <?php echo $userss["user_name"]; ?>
									</a>
									<a class="dropdown-item" href="edit_user.php?user_id=<?php echo $userss["user_id"]; ?>">
										<i class="ti-settings mr-0-5"></i> Settings
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="logout.php"><i class="ti-power-off mr-0-5"></i> Sign out</a>
								</div>
							</li>
						</ul>
						<ul class="nav navbar-nav">
							<li class="nav-item hidden-sm-down">
								<a class="nav-link toggle-fullscreen" href="#">
									<i class="ti-fullscreen"></i>
								</a>
							</li>
						</ul>
						<div class="header-form float-md-left ml-md-2">
							<form method="post" action="../projects.php?page=1">
								<input type="text" name="search" class="form-control b-a" placeholder="Search for..." required="">
								<button type="submit" name="submit" class="btn bg-white b-a-0">
									<i class="ti-search"></i>
								</button>
							</form>
						</div>
						<?php // echo "It's Not Any Result To Show!!!"; } ?>
					</div>
				</nav>
			</div>
			<div class="site-content">
				<!-- Content -->
