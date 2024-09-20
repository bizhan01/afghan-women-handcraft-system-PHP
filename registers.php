
<?php
    session_start();
    require_once("db.php");
    if(isset($_POST["user_name"])){
      $name = $_POST["user_name"];
      $pass = $_POST["user_pass"];
      $email = $_POST["user_email"];
      $usertype = 'member';
      $result = mysqli_query($conn, "INSERT INTO users VALUES(NULL,'$name', '$email', md5(password('$pass')),NULL,'$usertype')");

      $login = mysqli_query($conn,"SELECT * FROM users WHERE user_email='$email' AND user_pass=md5(password('$pass'))");
      $login_result = mysqli_num_rows($login);
      if($login_result){
        $admin_id = mysqli_fetch_assoc($login);
        $_SESSION['user_id'] = $admin_id['user_id'];
        $_SESSION['user_type'] = $admin_id['user_type'];
        header("location:admin/home.php");
      }
      else{
        header("location:login.php?user_register=failed");
      }
    }
    $title = "Register Form";
 ?>
<?php require_once("header.php"); ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->
    <!-- ##### Login Area Start ##### -->
    <div class="mag-login-area py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="login-content bg-white p-30 box-shadow">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Regiser for create account!</h5>
                        </div>
                        <form method="post" enctype="multipart/form-data" id="user_register">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Full name:</label>
                                <input type="text" class="form-control" id="recipient-name" name="user_name" placeholder="Full name . . ." required="" autofocus="">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Email:</label>
                                <input type="email" class="form-control" id="recipient-name" name="user_email" placeholder="email address . . ." required="">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="user_pass" placeholder="password . . ." required="">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Confirm Pass:</label>
                                <input type="password" class="form-control" id="confirm_password" name="user_pass" placeholder="confirm password . . ." required="">
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn mag-btn mt-30">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <?php require_once("footer.php"); ?>
