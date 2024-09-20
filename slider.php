<!-- ##### Hero Area Start ##### -->
<div class="hero-area owl-carousel">
    <!-- Single Blog Post -->
    <?php
      $sliderSelect = mysqli_query($conn,"SELECT * FROM sliders");
      $showSliders = mysqli_fetch_assoc($sliderSelect);
      do{
     ?>
    <div class="hero-blog-post bg-img bg-overlay" style="background-image: url(admin/<?php echo $showSliders["slider_photo"]; ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Post Contetnt -->
                    <div class="post-content text-center">
                        <a href="projects.php?page=1" class="post-title" data-animation="fadeInUp" data-delay="300ms"><?php echo $showSliders["history"]; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } while($showSliders = mysqli_fetch_assoc($sliderSelect)); ?>
</div>
<!-- ##### Hero Area End ##### -->
