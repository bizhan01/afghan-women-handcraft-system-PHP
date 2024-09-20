<?php
  require("../session.php");
  if(isset($_GET["ProductFlag"])){
    $flagProduct = 1;
    mysqli_query($conn, "UPDATE products SET pro_flag=$flagProduct");
  }
  if(isset($_POST["pro_title"])){
    $title = $_POST["pro_title"];
    $location = $_POST["pro_location"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $desc = $_POST["pro_desc"];
    $user_ID = $_SESSION["user_id"];
    $filename = $_FILES["pro_file"]["name"];
    $file_path = "img/products/". $_FILES["pro_file"]["name"];
    move_uploaded_file($_FILES["pro_file"]["tmp_name"], $file_path);
    $publish = 0;
    $result = mysqli_query($conn, "INSERT INTO projects VALUES(NULL, '$title', '$phone', '$email', '$desc','$location',NULL,'$file_path',$publish,$user_ID)");
    if($result){
      header("location:product-list.php?insert_Product=successfuly");
    }
    else{
      header("location:products.php?error_Product=true");
    }
  }
  require("header.php");

  $select_products = mysqli_query($conn, "SELECT * FROM projects ORDER BY pro_id DESC");
  $show_products = mysqli_fetch_assoc($select_products);
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List Products</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
          </ol>
          <div class="card card-block">
                        <!-- Video Submit Content -->
                        <div class="video-submit-content mb-50 p-30 bg-white box-shadow">
                            <!-- Section Title -->
                            <div class="section-heading">
                                <h5>Submit your Products</h5>
                            </div>

                            <div class="video-info mt-30">
                                <form method="post" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="pro_title">Product Title</label>
                                          <input type="text" class="form-control" name="pro_title" placeholder="Product title ..." required="">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="location">Address</label>
                                          <input type="text" class="form-control" name="pro_location" placeholder="Product title ..." required="">

                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="pro_title">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number ..." required="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="location">E-mail Address</label>
                                            <input type="email" class="form-control" name="email" placeholder="E-mail Address ..." required="">
                                        </div>
                                      </div>
                                    <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="pro_desc">Product Description</label>
                                          <textarea name="pro_desc" class="form-control" cols="30" rows="11" placeholder="Write About Your Product ..." required=""></textarea>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="pro_desc">Product Files</label>
                                          <input type="file" id="input-file-now-custom-1" multiple class="dropify" name="pro_file" data-default-file="" / required="">
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-30"><i class="fa fa-cloud-upload"></i> Submit your Product</button>
                                </form>
                          </div>
                      </div>
                  </div>
            </div>
    </div>
<?php require("footer.php"); ?>
