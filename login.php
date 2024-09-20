
<?php
    session_start();
    require_once("db.php");
    if(isset($_POST["user_email"])){
      $user = $_POST["user_email"];
      $pass = $_POST["user_pass"];
      $login = mysqli_query($conn,"SELECT * FROM users WHERE user_email='$user' AND user_pass=md5(password('$pass'))");
      if(mysqli_num_rows($login)==1){
        $admin_id = mysqli_fetch_assoc($login);
        $_SESSION['user_id'] = $admin_id['user_id'];
        $_SESSION['user_type'] = $admin_id['user_type'];
        header("location:admin/home.php");
      }
      else{
        header("location:login.php?user_login=failed");
      }
    }
    $title = "Login Form";
 ?>
<?php require_once("header.php"); ?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Login</h2>
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
                            <h5>Great to have you back!</h5>
                        </div>

                        <form method="post">
                            <div class="form-group">
                                <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="Email or User Name">
                            </div>
                            <div class="form-group">
                                <input type="password" name="user_pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn mag-btn mt-30">Login</button>
                            <a href="registers.php"  class="btn mag-btn mt-30">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <?php require_once("footer.php"); ?>
