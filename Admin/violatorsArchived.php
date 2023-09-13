<title>Archived Violators | Report Mgmt. System</title>


<?php 
  include 'navbar.php'; 
  include 'sweetalert_messages.php';
?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mb-4">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Archived Violators</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Archived Violators</li>
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
              <!-- <div class="card-header">
                <div class="d-flex">
                  <a href="violators_add.php" type="button" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add</a>
                </div>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example111" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Name of Violators</th>
                    <th>Confiscated ID</th>
                    <th>Violation and Penalty</th>
                    <th>Violation date</th>
                    <th>Payment</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 

                        $sql = mysqli_query($conn, "SELECT * FROM violators WHERE deleted=1");
                        // $sql = mysqli_query($conn, "SELECT * FROM violators JOIN violations ON violators.violators_violation=violations.violation_Id ");
                        // 
                        // $sql = mysqli_query($conn, "SELECT * FROM violators JOIN violations ON violators.violators_violation=violations.violation_Id WHERE payment = 'Unpaid' ");
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
                        <td>
                          <img src="../images-violators/<?php echo $row['image']; ?>" alt="" height="40" width="40" class="img-circle">
                        </td>
                        <td><?php echo $row['name']; ?></td>
                        <!-- <td><?php//echo $row['gender']; ?></td>
                        <td><?php//echo $row['address']; ?></td>
                        <td><?php//echo $row['civil_status']; ?></td>
                        <td><?php//echo $row['contact']; ?></td> -->
                        <td><?php echo $row['confiscated_Id']; ?></td>
                        <td><?php echo $row['violators_violation']; ?></td>
                        <td><?php echo $row['date_violated']; ?></td>
                        <td>
                          <?php if($row['payment'] == "Unpaid"): ?>
                            <span class="badge badge-warning rounded-pill">Unpaid</span> 
                          <?php else: ?>
                            <span class="badge badge-info rounded-pill">Paid</span> 
                          <?php endif; ?> 
                        </td>
                    </tr>

                    <?php include 'violators_update_delete.php'; } ?>
                    <?php } else { ?>

                      <tr class="text-center">
                        <td colspan="100%">No record found</td>
                      </tr> 

                    <?php } ?>

                  </tbody>
                  <!-- <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Civil Status</th>
                        <th>Phone Number</th>
                        <th>License ID</th>
                        <th>Violation</th>
                        <th>Date</th>
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


 <?php include 'footer.php'; ?>



