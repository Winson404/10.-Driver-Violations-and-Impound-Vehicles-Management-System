<title>Impound Vehicles | Report Mgmt. System</title>


<?php 
  include 'navbar.php'; 
  include 'sweetalert_messages.php';
?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mb-5">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Impound Vehicles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Impound Vehicles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user"><i class="bi bi-plus-circle"></i> Add</button>

                  <?php //if(isset($_SESSION['success'])) { ?> 
                      <!-- <h3 class="alert card-title position-absolute py-2 alert-success rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php //echo $_SESSION['success']; ?></h3> -->
                  <?php //unset($_SESSION['success']); } ?>


                  <?php //if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
                      <!-- <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php// echo $_SESSION['invalid']; ?> <?php //echo $_SESSION['error']; ?></h3> -->
                  <?php //unset($_SESSION['invalid']);  //unset($_SESSION['error']);  } ?>


                  <?php // if(isset($_SESSION['exists'])) { ?>
                      <!-- <h3 class="alert card-title position-absolute py-2 alert-danger rounded p-1" role="alert" style="right: 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;"><?php //echo $_SESSION['exists']; ?></h3> -->
                  <?php //unset($_SESSION['exists']); } ?>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-sm">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <!-- <th>License No</th> -->
                    <th>Chassis No</th>
                    <th>Engine No</th>
                    <th>Plate No</th>
                    <th>Color</th>
                    <th>Violation & Penalty</th>
                    <th>Category</th>
                    <th>Release Status</th>
                    <th>Date released</th>
                    <th>Action taken</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $sql = mysqli_query($conn, "SELECT * FROM impound JOIN violators ON impound.impound_violator_Id=violators.violator_Id");
                        // $sql = mysqli_query($conn, "SELECT * FROM impound JOIN violators ON impound.impound_violator_Id=violators.violator_Id JOIN violations ON violators.violators_violation=violations.violation_Id");

                        if(mysqli_num_rows($sql) > 0) {
                          while ($row = mysqli_fetch_array($sql)) {

                            // TO ADD COMMA FOR PRICE
                          // $price = $row['penalty'];
                          // $price_text = (string)$price; // convert into a string
                          // $price_text = strrev($price_text); // reverse string
                          // $arr = str_split($price_text, "3"); // break string in 3 character sets

                          // $price_new_text = implode(",", $arr);  // implode array with comma
                          // $price_new_text = strrev($price_new_text); // reverse string back
                          //echo $price_new_text; // will output 1,234
                      ?>
                        <td><?php echo $row['name']; ?></td>
                        <!-- <td><?php //echo $row['license_no']; ?></td> -->
                        <td><?php echo $row['chassis_no']; ?></td>
                        <td><?php echo $row['engine_no']; ?></td>
                        <td><?php echo $row['plate_no']; ?></td>
                        <td><?php echo $row['color']; ?></td>
                        <td><?php echo $row['violators_violation']; ?></td>
                        <td><?php echo $row['vehicle']; ?></td>
                        <td>
                          <?php if($row['release_status'] == "Pending"): ?>
                            <a type="button" class="text-primary" data-toggle="modal" data-target="#released<?php echo $row['impound_Id']; ?>">Mark as released</a>
                          <?php else: ?>
                            <span class="badge badge-primary rounded-pill"><?php echo $row['release_status']; ?></span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo $row['release_date']; ?></td>
                        <td>
                            <div class="dropdown dropleft">
                                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"> Actions </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#view<?php echo $row['impound_Id']; ?>">View</button>
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#update<?php echo $row['impound_Id']; ?>">Update</button>
                                      <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#delete<?php echo $row['impound_Id']; ?>">Delete</button>
                                </div>
                            </div>
                        </td> 
                    </tr>

                    <?php include 'impound_update_delete.php'; } ?>

                    <?php } else { ?>

                      <tr class="text-center">
                        <td colspan="100%">No record found</td>
                      </tr> 
                      
                    <?php } ?>

                  </tbody>
                  <!-- <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>License No</th>
                        <th>Chassis No</th>
                        <th>Engine No</th>
                        <th>Plate No</th>
                        <th>Color</th>
                        <th>Penalty</th>
                        <th>Category</th>
                        <th>Release Status</th>
                        <th>Date released</th>
                        <th>Tools</th>
                      </tr>
                  </tfoot> -->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <br><br><br><br>

 <?php include 'impound_add.php';  ?>
 <?php include 'footer.php'; ?>



