<?php
  require("../session.php");
  require("header.php");
  $user = $_SESSION["user_id"];
  if($showUserType["user_type"]=='admin'){
    $select_projects = mysqli_query($conn, "SELECT * FROM projects INNER join users ON projects.user_id=users.user_id ORDER BY pro_id DESC");
  }else{
    $select_projects = mysqli_query($conn, "SELECT * FROM projects INNER join users ON projects.user_id=users.user_id WHERE users.user_id=$user ORDER BY pro_id DESC");
  }
  $show_projects = mysqli_fetch_assoc($select_projects);
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List Products</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
          </ol>
          <div class="card card-block">
            <?php if(isset($_GET["delete_projects"])){ ?>
            <div class="alert alert-danger alert-dismissable">
              <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
              <h5 style="text-align:center;">You can't delete this equipment, It is <b>last equipment</b> !!!</h5>
            </div>
         <?php } ?>
              <table class="table table-hover table-bordered dataTable" id="table-1">
									<thead>
										<tr>
                      <th style="text-align:center;">No</th>
                      <th style="text-align:center;">Customer Name</th>
                      <th style="text-align:center;">Customer Email</th>
                      <th style="text-align:center;">Title</th>
                      <th style="text-align:center;">Address</th>
                      <th style="text-align:center;">Photo</th>
                      <th style="text-align:center;">Date</th>
											<th style="text-align:center;">Action</th>
										</tr>
									</thead>
									<tbody>
                    <?php $i=1; do { ?>
										<tr>
											<th scope="row" style="text-align:center;"><?php echo $i++; ?></th>
                      <td style="text-align:center;"><?php echo $show_projects["user_name"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_projects["user_email"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_projects["pro_title"]; ?></td>
                      <td style="text-align:center;"><?php echo $show_projects["pro_location"]; ?></td>
                      <td style="text-align:center;">
                        <img src="<?php echo $show_projects["pro_file"]; ?>" style="width:50px; height:40px;" alt="<?php echo $show_projects["user_name"]."'s image"; ?>">
                      </td>
                      <td style="text-align:center;"><?php echo $show_projects["pro_date"]; ?></td>
                      <td style="text-align:center; font-size:18px; <?php if($show_projects['publish']==1){echo'background:lightgreen';} ?>">
                        <?php if($show_projects["publish"]==0){ ?>
                          <a href="control/delete_product.php?pro_id=<?php echo $show_projects["pro_id"]; ?>" class="delete" style="color:red;"><i class="fa fa-remove"></i></a>&nbsp &nbsp
                          <a href="edit_product.php?pro_id=<?php echo $show_projects["pro_id"]; ?>"  style="color:green;"><i class="fa fa-edit"></i></a>&nbsp &nbsp
                        <?php } ?>
                        <?php if($showUserType["user_type"]=='admin'){ ?>
                          <a href="view_product.php?pro_id=<?php echo $show_projects["pro_id"]; ?>"  style="color:blue;"><i class="fa fa-eye"></i></a>&nbsp &nbsp
                        <?php } ?>
                      </td>
										</tr>
                    <?php }while($show_projects = mysqli_fetch_assoc($select_projects)) ?>
                  </tbody>
               </table>
          </div>
      </div>
    </div>
<?php require("footer.php"); ?>
