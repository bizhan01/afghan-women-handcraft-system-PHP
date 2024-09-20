<?php
  require("../session.php");

  require("header.php");
  $user = $_SESSION["user_id"];
  if($showUserType["user_type"]=='admin'){
    $select_projects = mysqli_query($conn, "SELECT * FROM projects INNER join users ON projects.user_id=users.user_id ORDER BY pro_id DESC");
  }else{
    $select_projects = mysqli_query($conn, "SELECT * FROM projects INNER join users ON projects.user_id=users.user_id WHERE users.user_id=$user ORDER BY pro_id DESC");
  }
  $show_projects = mysqli_fetch_assoc($select_projects);
?>
				<div class="content-area py-1">
					<div class="container-fluid">
						<div class="row row-md">
							<div class="col-lg-4 col-md-6 col-xs-12">
								<div class="box box-block bg-white tile tile-1 mb-2">
									<div class="t-icon right"><span class="bg-danger"></span><i class="ti-shopping-cart-full"></i></div>
									<?php
										$count_emp = mysqli_query($conn,"SELECT COUNT(user_id) FROM users");
										 while($emp = mysqli_fetch_array($count_emp)){$total_emp = $emp[0];}
									 ?>
									<div class="t-content">
										<h6 class="text-uppercase mb-1">Users</h6>
										<h1 class="mb-1"><?php echo $total_emp; ?></h1>
										<i class="fa fa-users text-success mr-0-5"></i>
									</div>
								</div>
							</div>
							<?php
              if($showUserType["user_type"]=='admin'){
								$count_pro = mysqli_query($conn,"SELECT COUNT(pro_id) FROM projects");
								 while($pro = mysqli_fetch_array($count_pro)){$total_pro = $pro[0];}
              }else{
								$count_pro = mysqli_query($conn,"SELECT COUNT(pro_id) FROM projects WHERE user_id=$user");
								 while($pro = mysqli_fetch_array($count_pro)){$total_pro = $pro[0];}
              }
							 ?>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<div class="box box-block bg-white tile tile-1 mb-2">
									<div class="t-icon right"><span class="bg-primary"></span><i class="ti-package"></i></div>
									<div class="t-content">
										<h6 class="text-uppercase mb-1">Products</h6>
										<h1 class="mb-1"><?php echo $total_pro; ?></h1>
										<span class="fa fa-wpforms"></span>
									</div>
								</div>
							</div>
							<?php
								$count_news = mysqli_query($conn,"SELECT COUNT(news_id) FROM news");
								 while($news = mysqli_fetch_array($count_news)){$total_news = $news[0];}
							 ?>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<div class="box box-block bg-white tile tile-1 mb-2">
									<div class="t-icon right"><span class="bg-warning"></span><i class="ti-receipt"></i></div>
									<div class="t-content">
										<h6 class="text-uppercase mb-1">News</h6>
										<h1 class="mb-1"><?php echo $total_news; ?></h1>
										<div id="sparkline1">Importable</div>
									</div>
								</div>
							</div>
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#"><b>My Products</b></a>
							</li>
						</ul>
						<div class="box box-block bg-white b-t-0 mb-2">
							<div class="card card-block">
                <div class="posts-list posts-list-1">
                  <table class="table table-hover table-bordered dataTable" id="table-1">
                      <thead>
                        <tr>
                          <th style="text-align:center;">No</th>
                          <th style="text-align:center;">Customer Name</th>
                          <th style="text-align:center;">Customer Email</th>
                          <th style="text-align:center;">Title</th>
                          <th style="text-align:center;">Address</th>
                          <th style="text-align:center;">Photo</th>
                          <th style="text-align:center;">Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; do { ?>
                        <tr>
                          <th scope="row" style="text-align:center;"><?php echo $i++; ?></th>
                          <td style="text-align:center;"><?php echo $show_projects["user_name"]; ?></td>
                          <td style="text-align:center;"><?php echo $show_projects["user_email"]; ?></td>
                          <td style="text-align:center;"><?php echo $show_projects["pro_title"]; ?></td>
                          <td style="text-align:center;"><?php echo $show_projects["pro_location"]; ?></td>
                          <td style="text-align:center;">
                            <img src="<?php echo $show_projects["pro_file"]; ?>" style="width:50px; height:40px;" alt="<?php echo $show_projects["user_name"]."'s image"; ?>">
                          </td>
                          <td style="text-align:center;"><?php echo $show_projects["pro_date"]; ?></td>

                        </tr>
                        <?php }while($show_projects = mysqli_fetch_assoc($select_projects)) ?>
                      </tbody>
                   </table>
		          </div>
					</div>
				</div>
		<?php require("footer.php"); ?>
