<?php
  require("../session.php");
  if(isset($_POST["user_name"])){
    $name = $_POST["user_name"];
    $pass = $_POST["user_pass"];
    $email = $_POST["user_email"];
    $usertype = $_POST["user_type"];
		$photo = "img/users/". $_FILES["user_photo"]["name"];
    move_uploaded_file($_FILES["user_photo"]["tmp_name"], $photo);
    $result = mysqli_query($conn, "INSERT INTO users VALUES(NULL,'$name', '$email', md5(password('$pass')),'$photo','$usertype')");
    if($result){
      header("location:users.php?showUser= insert_user_successfuly");
    }
    else{
      header("location:users.php?error_user=true");
    }
  }
  $select_users = mysqli_query($conn, "SELECT * FROM users");
  $show_users = mysqli_fetch_assoc($select_users);
  require("header.php");
  if(isset($_GET["showUser"])){
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <?php if($showUserType["user_type"]=='admin'){ ?>
          <h4>List Users</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>

            <?php if($showUserType["user_type"]=='admin'){ ?>
              <button type="button" class="btn btn-secondary w-min-sm mb-0-25 waves-effect waves-light" data-toggle="modal" data-target="#addUser" data-whatever="@mdo"
                style="float:right;margin-top:-13px;"> Add User <i class="fa fa-plus"></i>
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
                      <h4 class="modal-title" id="exampleModalLabel">Add New User</h4>
 										</div>
										<div class="modal-body">
											<form method="post" enctype="multipart/form-data" id="user_register">
												<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Full name:</label>
    													<input type="text" class="form-control" id="recipient-name" name="user_name" placeholder="Full name . . ." required="" autofocus="">
    												</div>
  												</div>
                          <div class="col-md-6">
                            <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Email:</label>
    													<input type="email" class="form-control" id="recipient-name" name="user_email" placeholder="email address . . ." required="">
    												</div>
  												</div>
                          <div class="col-md-4">
                            <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Password:</label>
    													<input type="password" class="form-control" id="password" name="user_pass" placeholder="password . . ." required="">
    												</div>
  												</div>
                          <div class="col-md-4">
                            <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Confirm Pass:</label>
    													<input type="password" class="form-control" id="confirm_password" name="user_pass" placeholder="confirm password . . ." required="">
    												</div>
  												</div>
                          <div class="col-md-4">
                            <div class="input-group">
                              <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Select User Type:</label>
              										<select id="select2-demo-1" class="form-control" data-plugin="select2" name="user_type" required="">
                                    <option value="admin">Full Admin</option>
                                    <option value="member">Member</option>
              										</select>
              								</div>
                      			</div>
  												</div>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label for="recipient-name" class="form-control-label">User Photo:</label>
                                <input type="file" id="input-file-now-custom-1" class="dropify" name="user_photo" data-default-file="" / required="">
                              </div>
                          </div>
												</div>
    										<div class="modal-footer">
    											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    											<button type="submit" class="btn btn-primary">Save New User</button>
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
               <?php $i=1; do { ?>
                 <div class="col-md-4">
                   <div class="box bg-white user-1">
                     <div class="u-img img-cover" style="background-image: url(<?php echo $show_users["user_photo"]; ?>"></div>
                     <div class="u-content">
                       <div class="avatar box-64">
                         <img class="b-a-radius-circle shadow-white" src="<?php echo $show_users["user_photo"]; ?>" alt="">
                         <?php if ($show_users["user_id"]== $_SESSION["user_id"]): ?>
                           <i class="status bg-success bottom right"></i>
                         <?php endif; ?>
                       </div>
                       <h5><a class="text-black" href="#"><?php echo $show_users["user_name"]; ?></a></h5>
                       <p class="text-muted"><?php echo $show_users["user_email"]; ?></p>
                         <div class="text-xs-center">
                           <?php if($showUserType["user_type"]=='admin'){ ?>
                            <a href="control/delete_user.php?user_id=<?php echo $show_users["user_id"]; ?>" class="delete btn btn-outline-danger btn-rounded">Delete
                             <i class="fa fa-remove ml-0-5"></i></a>
                          <?php } ?>
                          <?php if($showUserType["user_type"]=='admin'){ ?>
                           <a href="edit_user.php?user_id=<?php echo $show_users["user_id"]; ?>" class="btn btn-outline-primary btn-rounded">Update
                             <i class="fa fa-edit ml-0-5"></i></a>
                          <?php } ?>
                         </div>
                     </div>
                     <div class="u-counters">
                       <div class="row no-gutter">
                         <div class="uc-item">
                           <button class="btn btn-outline-info btn-block" style="font-size:20px;"><?php echo $show_users["user_type"]; ?></button>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <?php } while($show_users = mysqli_fetch_assoc($select_users)); ?>
           </div>
          </div>
        <?php } ?>
      </div>
    </div>
<?php } require("footer.php"); ?>
