
<?php
  require_once("db.php");

  $count_contract_count = mysqli_query($conn,"SELECT COUNT(pro_id) FROM projects");
  while($contract_count = mysqli_fetch_array($count_contract_count)){$total_contract_count = $contract_count[0];}

  if($total_contract_count>0){
    $projects = mysqli_query($conn, "SELECT * FROM projects WHERE publish=1;");
    $num_of_record = mysqli_num_rows($projects);
    $num_in_page = 5;
    $num_of_page = ceil($num_of_record/$num_in_page);
    if(isset($_GET["page"]) && $_GET["page"]>=1 && $_GET["page"] <= $num_of_page){
      $offset = ($_GET["page"] - 1) * $num_in_page;
    }else{
      $offset = 0;
      header("location:projects.php?page=1");
    }

    $search = "";
    if(isset($_POST["search"])){
      $search = $_POST["search"];
      $select_projects = mysqli_query($conn,"SELECT * FROM projects
      WHERE publish=1 && projects.pro_title LIKE '%".$search."%' OR projects.pro_desc LIKE '%".$search."%'
       ORDER BY projects.pro_id DESC LIMIT $offset, $num_in_page");
      $show_projects = mysqli_fetch_assoc($select_projects);
    }else{
      $select_projects = mysqli_query($conn, "SELECT * FROM projects WHERE publish=1 ORDER BY projects.pro_id DESC LIMIT $offset, $num_in_page");
      $show_projects = mysqli_fetch_assoc($select_projects);
    }
  }
  $title = $show_projects["pro_title"];
  require_once("header.php");
?>
<!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(admin/img/about/40.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Products</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Product List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive Post Area Start ##### -->
    <div class="archive-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-8">
                    <div class="archive-posts-area bg-white p-30 mb-30 box-shadow">
                      <?php if($total_contract_count>0 && $show_projects["pro_title"] != NULL){ ?>
                        <div class="section-heading">
                            <h5>Product List</h5>
                        </div>
                      <?php do{ ?>
                          <!-- Single Catagory Post -->
                          <div class="single-catagory-post d-flex flex-wrap">
                              <!-- Thumbnail -->
                              <div class="post-thumbnail bg-img" style="background-image: url(admin/<?php echo $show_projects["pro_file"]; ?>);">
                              </div>
                              <!-- Post Contetnt -->
                              <div class="post-content">
                                  <div class="post-meta">
                                      <a href="#" style="text-transform:capitalize;"><?php echo $show_projects["pro_date"]; ?></a>
                                      <a href="#" style="text-transform:capitalize;">Product</a>
                                  </div>
                                  <a href="project_details.php?project_id=<?php echo $show_projects["pro_id"];?> && <?php echo $show_projects["pro_title"]; ?>" class="post-title"><?php echo $show_projects["pro_title"]; ?></a>
                                  <!-- Post Meta -->
                                  <?php
                                     $comment = $show_projects["pro_id"];
                                     $count_comment = mysqli_query($conn,"SELECT COUNT(comments_id) FROM comments WHERE pro_id=$comment");
                                      while($comment = mysqli_fetch_array($count_comment)){$total_comment = $comment[0];}


                                   ?>
                                  <div class="post-meta-2">
                                      <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $total_comment; ?></a>
                                  </div>
                                  <p><?php echo substr($show_projects["pro_desc"],0,130) ?>
                                    <a href="project_details.php?project_id=<?php echo $show_projects["pro_id"] ?>"
                                      class="btn btn-default;" style="color:#ed3974;"> Read more ...
                                    </a>
                                  </p>
                              </div>
                          </div>
                        <?php } while($show_projects = mysqli_fetch_assoc($select_projects)); ?>
                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination">
                             <?php if($_GET["page"] == 1){?>
                               <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-left"></i></a></li>
                             <?php }else{ $previous = $_GET["page"] - 1; ?>
                               <li class="page-item"><a class="page-link" href="projects.php?page=<?php echo $previous ?>"><i class="ti-angle-left"></i></a></li>
                             <?php } ?>
                               <?php for ($i=1; $i <=$num_of_page; $i++) { ?>
                                 <?php  if(isset($_GET["page"]) && $_GET["page"] == $i){ ?>
                                   <li class="page-item active"><a class="page-link" href="projects.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                 <?php }else{?>
                                   <li class="page-item"><a class="page-link" href="projects.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                 <?php } ?>
                               <?php } ?>
                               <?php if($_GET["page"] == $num_of_page){?>
                                 <li class="page-item"><a class="page-link" href="#"><i class="ti-angle-right"></i></a></li>
                               <?php }else{ $next = $_GET["page"] + 1; ?>
                               <li class="page-item"><a class="page-link" href="projects.php?page=<?php echo $next; ?>"><i class="ti-angle-right"></i></a></li>
                               <?php } ?>
                             </ul>
                        </nav>
                        <?php }else{ ?>
                          <div class="section-heading">
                              <h5>NOT POST TO SHOW!</h5>
                          </div>
                          <div class="single-catagory-post d-flex flex-wrap">
                            <p>Please search or write something about project like name, location or descriptions!</p>
                          </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="sidebar-area bg-white mb-30 box-shadow" >
                      <?php require_once("right_sidebar.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Archive Post Area End ##### -->

    <?php require_once("footer.php"); ?>
