<?php
    require_once("db.php");

    if(isset($_POST["contact_name"])){
      $name = $_POST["contact_name"];
      $email = $_POST["contact_email"];
      $message = $_POST["contact_message"];
      $flagcontact = 0;
      $contact = mysqli_query($conn,"INSERT INTO contacts VALUES(NULL,'$name','$email','$message',$flagcontact)");

      if ($contact) {
        header("location:contact.php?contact=Successfully Send");
      }
    }
    $title = "Contact";
 ?>
 <?php require_once("header.php"); ?>

    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/news/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="mag-breadcrumb py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="contact-content-area bg-white mb-30 p-30 box-shadow">
                        <!-- Google Maps -->
                        <div class="map-area mb-30">
                            <!-- <iframe src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrP6T9N7frTHN1hGgQXytXoxI8Hv7qJm4&callback=initMap" allowfullscreen></iframe> -->
                            <img src="img/core-img/1.jpg" style="height:400px; width:100%;" alt="" />
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>Contact Info</h5>
                        </div>

                        <div class="contact-information mb-30">
                            <p>Afghan Women Handicraft owned company and has highly educated and well experienced management team form all origins of Afghanistan. The General Director of NTLC heads the organization and provides overall leadership and direction, the regional manager are responsible for overall direction and management of the activities in a regional level, project manager runs all project management for specified projects, which constitute on of the NTLC’s greatest strength of Managements.
All management staff of NTLC’s are well experienced in project Management, and highly skilled in Information Technology (Computer Software (MS. Office, MS. Project. Primavera, and CAD) and Internet.
As NTLC management team is primarily Afghan, and all being fluent in English language, which will ensure good spoken and written communication between NTLC and USACE.
</p>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Our Office:</p>
                                    <h6>House #27, Street #13,Dasht-e-barchi<br>Kabul, Afghanistan</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Email:</p>
                                    <h6>wahidasiawash@gmail.com</h6>
                                </div>
                            </div>

                            <!-- Single Contact Info -->
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="icon mr-15">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="text">
                                    <p>Phone:</p>
                                    <h6>+93 (0) 77 00 00 000 </h6>
                                </div>
                            </div>
                        </div>

                        <!-- Section Title -->
                        <div class="section-heading">
                            <h5>GET IN TOUCH</h5>
                        </div>

                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            <form  method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name"name="contact_name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="contact_email" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea type="text" name="contact_message" class="form-control" id="message"  cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn mag-btn mt-30" type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow">
                      <?php require_once("right_sidebar.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
<?php require_once("footer.php"); ?>
