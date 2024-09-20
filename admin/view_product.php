<?php
  require("../session.php");
  $pro_id = $_GET["pro_id"];
  $select_projects = mysqli_query($conn, "SELECT * FROM projects INNER join users ON projects.user_id=users.user_id WHERE projects.pro_id=$pro_id ORDER BY pro_id DESC");
  $show_projects = mysqli_fetch_assoc($select_projects);
  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>Product details</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active"><a href="#">View</a></li>
          </ol>
          <div class="card card-block">
            <div class="box bg-white post post-1">
									<div class="p-img img-cover" style="background-image: url(<?php echo $show_projects["pro_file"] ?>)">
										<div class="p-info clearfix">
											<div class="float-xs-left">
												<span class="small text-uppercase"><?php echo $show_projects["pro_date"] ?></span>
											</div>
										</div>
									</div>
									<div class="p-content">
										<h5><a class="text-black" href="#"><?php echo $show_projects["pro_title"] ?></a></h5>
										<p class="mb-0">
                      <?php echo $show_projects["pro_desc"] ?>
                     </p>
                     <br>
                     <a href="product-list.php"><button type="button" class="btn btn-danger" name="button">Back</button></a>
                     <a href="edit_product.php?pro_id=<?php echo $pro_id; ?>"><button type="button" class="btn btn-info" name="button">Edit Product</button></a>
                     <?php if($showUserType["user_type"]=='admin' && $show_projects["publish"]==0){ ?>
                       <a href="publish.php?pro_id=<?php echo $pro_id; ?>"><button type="button" class="btn btn-success" name="button">Publish</button></a>
                     <?php } ?>
									</div>
								</div>
          </div>
      </div>
    </div>
<?php require("footer.php"); ?>
