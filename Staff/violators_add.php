<title>Violators | Report Mgmt. System</title>


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
            <h1>Violators</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Violators</li>
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
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <form action="process_save.php" method="POST" enctype="multipart/form-data">

          <div class="row">
           
            <div class="col-lg-6 mb-3">
                <b>Name</b>
                <input type="text" class="form-control"  placeholder="Full name" name="name" required>
            </div>
            <div class="col-lg-3 mb-3">
                <b>Gender</b>
                <select class="custom-select" name="gender" required>
                    <option selected disabled value="">Select gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                 </select>
            </div>
            <div class="col-lg-3 mb-3">
                <b>Civil Status</b>
                <select class="custom-select" name="civil" required>
                    <option selected disabled value="">Select civil status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Separated">Separated</option>
                    <option value="Widow/Widower">Widow/Widower</option>
                    <option value="Divorced">Divorced</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Province</b>
                <input type="text" class="form-control"  placeholder="Province" name="province" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>City/Municipality</b>
                <input type="text" class="form-control"  placeholder="City/Municipality" name="municipality" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Barangay</b>
                <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Phone number</b>
                <input type="text" class="form-control"  placeholder="Phone number" name="contact" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Confiscated ID</b>
                <input type="text" class="form-control"  placeholder="Confiscated ID" name="confiscated" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Plate No</b>
                <input type="text" class="form-control"  placeholder="Plate No" name="plate" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Traffic Offense Ticket</b>
                <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Violation Date</b>
                <input type="date" class="form-control"  placeholder="Traffic Offense Ticket" name="violation_date" required>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Type of Vehicle</b>
                <select class="custom-select" name="vehicle" required>
                    <option selected disabled value="">Select vehicle</option>
                    <option value="Car">Car</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Bus">Bus</option>
                    <option value="Truck">Truck</option>
                    <option value="Filcab">Filcab</option>
                    <option value="Tricycle">Tricycle</option>
                    <option value="Motorcycle">Motorcycle</option>
                    <option value="Van">Van</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Ownership</b>
                <select class="custom-select" name="ownership" required>
                    <option selected disabled value="">Select ownership</option>
                    <option value="Private">Private</option>
                    <option value="Public">Public</option>
                    <option value="Government">Government</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Accident</b>
                <select class="custom-select" name="accident" required>
                    <option selected disabled value="">Select accident</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                 </select>
            </div>
            <div class="col-lg-4 mb-3">
                <b>Date of Paid</b>
                <input type="date" class="form-control"  placeholder="Traffic Offense Ticket" name="date_paid" required>
            </div>
            <div class="col-lg-6 mb-3">
                <b>Official Receipt</b>
                <input type="text" class="form-control"  placeholder="Official Receipt" name="official_receipt" required>
            </div>
            <div class="col-lg-12 mb-3">
                <b>Violations</b>
                <div class="row">
                <?php
                    $fetch = mysqli_query($conn, "SELECT * FROM violations ORDER BY violation ASC");
                    while ($r = mysqli_fetch_array($fetch)) {
                ?>
                    <div class="col-lg-6 mb-1">
                       <div class="form-check">
                          <input class="form-check-input position-static" type="checkbox" id="<?php echo $r['violation_Id']; ?>"  name="driver_violation[]" value="<?php echo ''.$r['violation'].' - P '.$r['penalty'].'.00'; ?>"> 
                          <label style="font-weight: normal" for="<?php echo $r['violation_Id']; ?>" ><?php echo $r['violation']; ?> - ₱ <?php echo number_format((float)$r['penalty'], 2, '.', '');  ?></label>
                       </div>
                    </div>
                <?php } ?>
                </div>
            </div>

          </div>

              </div>
              <!-- /.card-body -->
              <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn btn-primary" name="violators"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
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



