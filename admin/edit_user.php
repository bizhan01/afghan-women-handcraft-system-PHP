<?php
  require("../session.php");

  //edit profile picture
  if(isset($_POST["new_name"])){
    $new_name = $_POST["new_name"];
    if($_FILES["new_photo"]["name"] != ""){
      $new_photo = "img/users/". $_FILES["new_photo"]["name"];
      move_uploaded_file($_FILES["new_photo"]["tmp_name"], $new_photo);
    }else{
      $new_photo = $show_admins["user_photo"];
    }
    $user_id = $_GET["user_id"];
    $result = mysqli_query($conn, "UPDATE users SET user_name='$new_name', user_photo='$new_photo' WHERE user_id=$user_id");
    if($result){
      header("location:edit_user.php?user_id=$user_id && file_upload=successffuly");
    }else{
      header("location:edit_user.php?user_id=$user_id && file_not_uploaded");
    }
  }
  // update users
  if(isset($_POST["userName"])){
   $name = $_POST["userName"];
   $email = $_POST["userEmail"];
   $pass = $_POST["userPass"];
   $id = $_GET["user_id"];
   $result = mysqli_query($conn, "UPDATE users SET user_name='$name', user_pass=md5(password('$pass')), user_email='$email' WHERE user_id=$id");
   if($result){
     header("location:home.php?showUser= update_successffuly");
   }
   else{
     header("location:home.php?showUser= notUpdate_user");
   }
 }

  $id = $_GET["user_id"];
  $select_users = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id");
  $show_users = mysqli_fetch_assoc($select_users);
  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>Edit Users</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Edit User</a></li>
          </ol>
          <div class="card card-block">
            <div class="modal-content">
              <div class="modal-body">
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="mySmallModalLabel" style="font-family:IranSansWeb;">Change Photo</h4>
                            </div>
                            <div class="modal-body">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group no-margin">
                                    <input type="hidden" name="new_name" class="form-control" value="<?php echo $show_users["user_name"]; ?>">
                                    <input type="file" name="new_photo" data-default-file="<?php echo $show_users["user_photo"]; ?>"  class="dropify form-control" data-max-file-size="1M" id="field-6">
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-sm btn-block">Upload Pic</button>
                                </div>
                              </form>
                            </div>
                        </div>
                      </div>
                  </div>
                <form method="post" enctype="multipart/form-data" id="user">
                  <div class="row">
                    <div class="col-md-4">
                      <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm" title="change your profile picture">
                      <?php if($show_users["user_photo"] != NULL){ ?>
                        <img src="<?php echo $show_users["user_photo"]; ?>" alt="user-img"
                        class="img-circle img-thumbnail img-responsive" style="width:250px; height:270px;">
                      <?php }else{ ?>
                        <i class="fa fa-user" style="font-size:250px;"></i>
                      <?php } ?>
                      </a>
                    </div>
                    <br>
                    <div class="col-md-8">
                        <h4 style="text-align:center;">Edit Your Profile</h4><br>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Full Name:</label>
                        <input type="text" class="form-control" id="recipient-name" value="<?php echo $show_users["user_name"]; ?>" name="userName" placeholder="username . . ." required="" autofocus="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Email:</label>
                        <input type="text" class="form-control" id="recipient-name" value="<?php echo $show_users["user_email"]; ?>" name="userEmail" placeholder="email address . . ." required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">New Password:</label>
                        <input type="password" class="form-control" id="new_pass"  name="userPass" placeholder="new password . . ." required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_pass" name="userPass" placeholder="confirm password . . ." required="">
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save change</button>
                    <a href="home.php"><button type="button" class="btn btn-danger">Exit</button></a>
                  </div>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
<?php require("footer.php"); ?>
