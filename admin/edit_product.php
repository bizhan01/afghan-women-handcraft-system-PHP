<?php
  require("../session.php");
  $pro_id=$_GET["pro_id"];
  $select_products = mysqli_query($conn, "SELECT * FROM projects INNER JOIN users ON projects.user_id=users.user_id WHERE projects.pro_id=$pro_id ORDER BY pro_id DESC");
  $show_products = mysqli_fetch_assoc($select_products);

  if(isset($_POST["pro_title"])){

    $title = $_POST["pro_title"];
    $location = $_POST["pro_location"];
    $desc = $_POST["pro_desc"];
    $user_ID = $_SESSION["user_id"];

    $filename = $_FILES["pro_file"]["name"];
    $file_path = "img/products/". $_FILES["pro_file"]["name"];
    move_uploaded_file($_FILES["pro_file"]["tmp_name"], $file_path);

    if($_FILES["pro_file"]["name"] != ""){
      $file_path = "img/products/". $_FILES["pro_file"]["name"];
      move_uploaded_file($_FILES["pro_file"]["tmp_name"], $file_path);
    }else{
      $file_path = $show_products["pro_file"];
    }
    $result = mysqli_query($conn, "UPDATE projects SET pro_title='$title', pro_location='$location', pro_desc='$desc', pro_file='$file_path' WHERE pro_id=$pro_id");
    if($result){
      header("location:product-list.php?update_Product=successfuly");
    }
    else{
      header("location:edit_product.php?pro_id=$pro_id && error_update");
    }
  }
  require("header.php");

?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>Edit Products</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active"><a href="#">Edit Product</a></li>
          </ol>
          <div class="card card-block">
                        <!-- Video Submit Content -->
                        <div class="video-submit-content mb-50 p-30 bg-white box-shadow">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Edit your product</h5>
                            </div>

                            <div class="video-info mt-30">
                                <form method="post" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="pro_title">Product Title</label>
                                          <input type="text" class="form-control" value="<?php echo $show_products["pro_title"]; ?>" name="pro_title" placeholder="Product title ..." required="">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="location">Address</label>
                                          <select id="select2-demo-1" class="form-control" data-plugin="select2" name="pro_location" required="">
                                            <option value="<?php echo $show_products["pro_location"]; ?>"><?php echo $show_products["pro_location"]; ?></option>
                                          </select>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="pro_desc">Product Description</label>
                                          <textarea name="pro_desc" class="form-control" cols="30" rows="11" placeholder="Write About Your Product ..." required=""><?php echo $show_products["pro_desc"]; ?></textarea>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="pro_desc">Product Files</label>
                                          <input type="file" id="input-file-now-custom-1" multiple class="dropify" name="pro_file" data-default-file="<?php echo $show_products["pro_file"]; ?>">
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-30"><i class="fa fa-cloud-upload"></i> Update your Product</button>
                                    <a href="product-list.php"><button class="btn btn-danger mt-30">Back</button></a>
                                </form>
                          </div>
                      </div>
                  </div>
            </div>
    </div>
<?php require("footer.php"); ?>
