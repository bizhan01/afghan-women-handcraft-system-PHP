<?php
  session_start();
  require_once("../db.php");
  if(!isset($_SESSION['user_id'])){
    header("location:login.php?login=falied");
  }else{
    $id = $_SESSION['user_id'];
  }
  $id = $_SESSION['user_id'];
  if(isset($_POST["news_title"])){
    $title = $_POST["news_title"];
    $content = $_POST["news_content"];
    $date = $_POST["news_date"];
    $view = 0;
    $result = mysqli_query($conn, "INSERT INTO news VALUES(NULL,'$title','$content','$date',$view,$id)");
    if($result){
      $last_id = mysqli_insert_id($conn);
      for ($i=0; $i < count($_FILES["news_photo"]["name"]) ; $i++) {
          $filename = $_FILES["news_photo"]["name"][$i];
          $file_path = "img/news/". $_FILES["news_photo"]["name"][$i];
          move_uploaded_file($_FILES["news_photo"]["tmp_name"][$i], $file_path);
          mysqli_query($conn, "INSERT INTO files VALUES(NULL,'$filename','$file_path',$last_id,NULL)");
      }
      header("location:list_news.php?publish_news=successfuly");
    }
    else{
      header("location:news.php?publish_error=true");
    }
  }

  $select_users = mysqli_query($conn, "SELECT * FROM users");
  $show_users = mysqli_fetch_assoc($select_users);
  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>Post News</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">News</a></li>
          </ol>
          <div class="card card-block">
            <?php if(isset($_GET["delete_users"])){ ?>
            <div class="alert alert-danger alert-dismissable">
              <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
              <h5 style="text-align:center;">You can't delete this user, It is <b>last user</b> !!!</h5>
            </div>
            <?php } ?>
            <div class="box box-block bg-white">
							<h5>Publish Frash News</h5>
							<p class="font-90 text-muted mb-1">Please fill <code> all input</code> for publish frash news.</p>
							<form class="material-success" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="inputEmail3" class="col-sm-2 col-form-label">News Title: <span style="color:red; font-size:17px;">*</span></label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="news_title" id="inputEmail3" placeholder="Short Title . . ." required="">
									</div>
                  <label for="recipient-name" class="col-sm-2 form-control-label">News Date: <span style="color:red; font-size:17px;">*</span></label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input type="text" class="form-control" name="news_date" id="datepicker-autoclose" placeholder="mm/dd/yyyy" required="">
                      <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                    </div>
                  </div>
								</div>
								<div class="form-group row">
									<label for="content" class="col-sm-2 col-form-label">News Contents: <span style="color:red; font-size:17px;">*</span></label>
									<div class="col-sm-10">
  										<textarea type="text" class="form-control" name="news_content" rows="6" id="" placeholder="Write something about your frash news . . ." required=""></textarea>
                  </div>
								</div>
                  <div class="form-group row">
                    <label for="recipient-name" class="col-sm-2 form-control-label">Upload Photo: <span style="color:red; font-size:17px;">*</span></label>
                    <div class="col-md-10">
                      <input type="file" id="input-file-now-custom-1" multiple class="dropify" name="news_photo[]" data-default-file="" / required="">
                    </div>
                  </div>
            		</div>
								<div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
										<button type="submit" class="btn btn-primary">Publish News</button>
									</div>
								</div>
							</form>
						</div>

          </div>
      </div>
    </div>
<?php require("footer.php"); ?>
