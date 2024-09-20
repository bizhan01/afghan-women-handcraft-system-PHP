<?php
  require("../session.php");
  if(isset($_POST["history"])){
    $history = $_POST["history"];
		$photo = "img/slider/".$_FILES["slider_photo"]["name"];
    move_uploaded_file($_FILES["slider_photo"]["tmp_name"], $photo);

    $count_pic = mysqli_query($conn,"SELECT COUNT(slider_id) FROM sliders");
     while($pic = mysqli_fetch_array($count_pic)){$total_pic = $pic[0];}
     if($total_pic >= 1){
       $flagSlider = 0;
     }else{
       $flagSlider = 1;
     }
    $result = mysqli_query($conn, "INSERT INTO sliders VALUES(NULL,'$history','$photo',$flagSlider)");
    if($result){
      header("location:slider.php?sliderShow= insert_slider_successfuly");
    }
    else{
      header("location:slider.php?sliderShow= error slider");
    }
  }

  if(isset($_SESSION['user_id'])){
    $userID = $_SESSION["user_id"];
    $queryUser = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$userID");
    $showUser = mysqli_fetch_assoc($queryUser);
  }

  require("header.php");
  if(isset($_GET["sliderShow"])){
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List Slider</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Slider</a></li>
              <?php if($showUserType["user_type"]=='admin'){ ?>
                <button type="button" class="btn btn-secondary w-min-sm mb-0-25 waves-effect waves-light" data-toggle="modal" data-target="#addUser" data-whatever="@mdo"
                  style="float:right;margin-top:-13px;">Add Slider <i class="fa fa-plus"></i>
                </button>
              <?php } ?>
          </ol>
          <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
  										<div class="modal-header">
  											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  												<span aria-hidden="true">&times;</span>
  											</button>
                        <h4 class="modal-title" id="exampleModalLabel">Add New Slider PIC</h4>
   										</div>
										<div class="modal-body">
											<form method="post" enctype="multipart/form-data">
												<div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Your History:</label>
    													<input type="text" class="form-control" id="recipient-name" name="history" placeholder="Your history . . ." required="" autofocus="">
    												</div>
  												</div>
                          <div class="col-md-12">
                            <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Photo:</label>
    													<input type="file" id="input-file-now-custom-1" class="dropify" name="slider_photo" data-default-file="" / required="">
    												</div>
  												</div>
												</div>
    										<div class="modal-footer">
    											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    											<button type="submit" class="btn btn-primary">Save New Slider</button>
    										</div>
											</form>
										</div>
									</div>
								</div>
							</div>
          <div class="card card-block">
             <?php if(isset($_GET["delete_users"])){ ?>
                <div class="alert alert-danger alert-dismissable">
                  <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
                  <h5 style="text-align:center;">You can't delete this user, It is <b>last user</b> !!!</h5>
                </div>
             <?php } ?>
             <div class="row mb-1">
               <div class="box box-block bg-white">
    							<h5>Slider</h5>
    							<p class="font-90 text-muted mb-1">TGC Sliders LIST</p>

                  <div class=box>
                    <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">

										<div class="carousel-inner" role="listbox">
                      <?php
                          $sliderS = mysqli_query($conn, "SELECT * FROM sliders");
                          $show_sliderss = mysqli_fetch_assoc($sliderS);
                          do{
                      ?>
											<div class="carousel-item <?php if($show_sliderss["flag"] == 1) echo " active" ?>">
												<img src="<?php echo $show_sliderss["slider_photo"]; ?>" alt="First slide" style="height:350px; width:100%;">
												<div class="carousel-caption">
													<h3><?php echo $show_sliderss["history"]; ?></h3>
												</div>
											</div>
                      <?php } while($show_sliderss = mysqli_fetch_assoc($sliderS)); ?>
										</div>
										<a class="left carousel-control" href="#carousel-example-caption" role="button" data-slide="prev">
											<span class="icon-prev" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="right carousel-control" href="#carousel-example-caption" role="button" data-slide="next">
											<span class="icon-next" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
								  	</div>
                  </div>
                  <div class="row">
                    <?php
                      $select_slider = mysqli_query($conn, "SELECT * FROM sliders");
                      $show_slider = mysqli_fetch_assoc($select_slider);
                      do {
                    ?>
      								<div class="col-sm-4">
      										<img src="<?php echo $show_slider["slider_photo"]; ?>" class="img-responsive" style="width:100%; height:180px;">
                          <?php if($showUserType["user_type"]=='admin'){ ?>
                            <a href="control/delete_slider.php?slider_id=<?php echo $show_slider["slider_id"]; ?>" class="delete close-img"><i class="fa fa-times" style="color:red;"></i></a>
                          <?php } ?>
                      </div>
                   <?php } while($show_slider = mysqli_fetch_assoc($select_slider)); ?>
    							</div>
    						</div>
             </div>
          </div>
      </div>
    </div>
<?php } require("footer.php"); ?>
