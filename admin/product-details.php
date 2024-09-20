<?php
  require("../session.php");
  $select_projects = mysqli_query($conn, "SELECT * FROM projects INNER join users ON projects.user_id=users.user_id ORDER BY pro_id DESC");
  $show_projects = mysqli_fetch_assoc($select_projects);
  require("header.php");
?>
<!-- Content -->
      <div class="content-area py-1">
        <div class="container-fluid">
          <h4>List Products</h4>
          <ol class="breadcrumb no-bg mb-1">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active"><a href="#">Product-details</a></li>
          </ol>
          <div class="card card-block">

          </div>
      </div>
    </div>
<?php require("footer.php"); ?>
