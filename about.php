<?php
require_once("db.php");

$title = "About";
require_once("header.php");
?>
<!-- ##### Breadcrumb Area Start ##### -->
<section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcrumb-content">
          <h2>Afghan Women handicraft<br></h2>
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
            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">About</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### About Us Area Start ##### -->
<section class="about-us-area">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-12 col-xl-8">
        <!-- About Us Content -->
        <div class="about-us-content bg-white mb-30 p-30 box-shadow">
          <!-- Section Title -->
          <div class="section-heading">
            <h5>Company Overview </h5>
          </div>
          <p><b><h6>Afghan Women Handicraft</h6></b></p>
          <p>Established in 2009 in Afghanistan by late Mr. Haji Qimat Khan TAREEN, TGC is a logistics / construction and trade industry for last ten years. With vast experience in construction / logistics, maintenance, inventory management / export and import / customs clearance and etc, TGC has developed an indisputable reputation of operational efficiency thereby gaining customer confidence. Customer satisfaction and providing good quality service is our primary goal.</p>
          <p>TGC by having full ability, adequate capacity for executing operational, financial management and implementation quality, started its efforts for construction and rehabilitation of Afghanistan since 2009 in the sectors of construction, irrigation, water supply and electronic.
            Our success is in bringing efficiency to supply chains in some of the world's most challenging environments, offering unmatched personal service, a global footprint and customized capabilities in developed countries and emerging economies.
          </p>
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
<!-- ##### About Us Area End ##### -->

<?php require_once("footer.php"); ?>
