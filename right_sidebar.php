<!-- >>>>>>>>>>>>>>>>>>>>
 Post Right Sidebar Area
<<<<<<<<<<<<<<<<<<<<< -->
    <!-- Sidebar Widget -->


    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Categories</h5>
        </div>

        <!-- Catagory Widget -->
        <ul class="catagory-widgets">
          <li><a href="projects.php"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Design</span> <span>12</span></a></li>
          <li><a href="projects.php"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Engineering</span> <span>3</span></a></li>
          <li><a href="projects.php"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Construction</span> <span>0</span></a></li>
          <li><a href="projects.php"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Management</span> <span>5</span></a></li>
          <li><a href="projects.php"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i> Finance</span> <span>2</span></a></li>
        </ul>
    </div>

    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget">
        <a href="#" class="add-img"><img src="img/slider/3.jpg" alt=""></a>
    </div>


    <?php
      require_once("db.php");
      if(isset($_POST["subs_email"])){
        $subs_email = $_POST["subs_email"];
        $subs_date = date("Y-m-d | h:i:sa");
        $email_flag = 0;
        $insert_email = mysqli_query($conn,"INSERT INTO subscribers VALUES(NULL,'$subs_email','$subs_date',$email_flag)");
      }
    ?>
    <!-- Sidebar Widget -->
    <div class="single-sidebar-widget p-30">
        <!-- Section Title -->
        <div class="section-heading">
            <h5>Newsletter</h5>
        </div>

        <div class="newsletter-form">
            <p>Subscribe our newsletter or get notification about new updates, information discount, etc.</p>

            <form method="post">
                <input type="email" name="subs_email" placeholder="Enter your email" required="">
                <button type="submit" class="btn mag-btn w-100">Subscribe</button>
            </form>
        </div>

    </div>
