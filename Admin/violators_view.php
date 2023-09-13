<title>Violators | Report Mgmt. System</title>


<?php 
  include 'navbar.php'; 
  include 'sweetalert_messages.php';
  if(isset($_GET['violator_Id']))
    $id = $_GET['violator_Id'];
    $f = mysqli_query($conn, "SELECT * FROM violators WHERE violator_Id='$id'");
    $row = mysqli_fetch_array($f);
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 mb-4 d-flex justify-content-center">
                        <img src="../images-violators/<?php echo $row['image']; ?>" alt="" height="100" width="100" style="border-radius: 50%;">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <b>Name</b>
                        <input type="text" class="form-control"  placeholder="Full name" name="name" required value="<?php echo $row['name']; ?>" readonly>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <b>Gender</b>
                        <select class="custom-select" name="gender" required disabled>
                            <option selected disabled value="">Select gender</option>
                            <option value="Male"  <?php if($row['gender'] == 'Male')   { echo 'selected'; } ?> >Male</option>
                            <option value="Female"<?php if($row['gender'] == 'Female') { echo 'selected'; } ?> >Female</option>
                         </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <b>Civil Status</b>
                        <select class="custom-select" name="civil" required disabled>
                            <option selected disabled value="">Select civil status</option>
                            <option value="Single"        <?php if($row['civil_status'] == 'Single')        { echo 'selected'; } ?>>Single</option>
                            <option value="Married"       <?php if($row['civil_status'] == 'Married')       { echo 'selected'; } ?>>Married</option>
                            <option value="Separated"     <?php if($row['civil_status'] == 'Separated')     { echo 'selected'; } ?>>Separated</option>
                            <option value="Widow/Widower" <?php if($row['civil_status'] == 'Widow/Widower') { echo 'selected'; } ?>>Widow/Widower</option>
                            <option value="Divorced"      <?php if($row['civil_status'] == 'Divorced')      { echo 'selected'; } ?>>Divorced</option>
                         </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Province</b>
                        <input type="text" class="form-control"  placeholder="Province" name="province" required value="<?php echo $row['province']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>City/Municipality</b>
                        <input type="text" class="form-control"  placeholder="City/Municipality" name="municipality" required value="<?php echo $row['municipality']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Barangay</b>
                        <input type="text" class="form-control"  placeholder="Barangay" name="barangay" required value="<?php echo $row['barangay']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Phone number</b>
                        <input type="text" class="form-control"  placeholder="Phone number" name="contact" required value="<?php echo $row['contact']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Confiscated ID</b>
                        <input type="text" class="form-control"  placeholder="Confiscated ID" name="confiscated" required value="<?php echo $row['confiscated_Id']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Plate No</b>
                        <input type="text" class="form-control"  placeholder="Plate No" name="plate" required value="<?php echo $row['plate_no']; ?>" readonly>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <b>Traffic Offense Ticket</b>
                        <input type="text" class="form-control"  placeholder="Traffic Offense Ticket" name="ticket" required value="<?php echo $row['traffic_offense_ticket']; ?>" readonly>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <b>Violation Date</b>
                        <input type="date" class="form-control"  placeholder="Traffic Offense Ticket" name="violation_date" required value="<?php echo $row['date_violated']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Type of Vehicle</b>
                        <select class="custom-select" name="vehicle" required disabled>
                            <option selected disabled value="">Select vehicle</option>
                            <option value="Car"        <?php if($row['vehicle_type'] == 'Car')        { echo 'selected'; } ?> >Car</option>
                            <option value="Jeep"       <?php if($row['vehicle_type'] == 'Jeep')       { echo 'selected'; } ?> >Jeep</option>
                            <option value="Bus"        <?php if($row['vehicle_type'] == 'Bus')        { echo 'selected'; } ?> >Bus</option>
                            <option value="Truck"      <?php if($row['vehicle_type'] == 'Truck')      { echo 'selected'; } ?> >Truck</option>
                            <option value="Filcab"     <?php if($row['vehicle_type'] == 'Filcab')     { echo 'selected'; } ?> >Filcab</option>
                            <option value="Tricycle"   <?php if($row['vehicle_type'] == 'Tricycle')   { echo 'selected'; } ?> >Tricycle</option>
                            <option value="Motorcycle" <?php if($row['vehicle_type'] == 'Motorcycle') { echo 'selected'; } ?> >Motorcycle</option>
                            <option value="Van"        <?php if($row['vehicle_type'] == 'Van')        { echo 'selected'; } ?> >Van</option>
                         </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Ownership</b>
                        <select class="custom-select" name="ownership" required disabled>
                            <option selected disabled value="">Select ownership</option>
                            <option value="Private"    <?php if($row['ownership'] == 'Private')    { echo 'selected'; } ?> >Private</option>
                            <option value="Public"     <?php if($row['ownership'] == 'Public')     { echo 'selected'; } ?> >Public</option>
                            <option value="Government" <?php if($row['ownership'] == 'Government') { echo 'selected'; } ?> >Government</option>
                         </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Accident</b>
                        <select class="custom-select" name="accident" required disabled>
                            <option selected disabled value="">Select accident</option>
                            <option value="Yes" <?php if($row['accident'] == 'Yes') { echo 'selected'; } ?>>Yes</option>
                            <option value="No"  <?php if($row['accident'] == 'No')  { echo 'selected'; } ?>>No</option>
                         </select>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Date of Paid</b>
                        <input type="date" class="form-control"  placeholder="Traffic Offense Ticket" name="date_paid" required value="<?php echo $row['date_paid']; ?>" readonly>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <b>Official Receipt</b>
                        <input type="text" class="form-control"  placeholder="Official Receipt" name="official_receipt" required value="<?php echo $row['official_receipt']; ?>" readonly>
                    </div>
                     <div class="col-lg-12 mb-3">
                            <b>Violations</b>
                            <div class="row">
                            <?php
                                $d = $row['violator_Id'];
                                $fetch2 = mysqli_query($conn, "SELECT * FROM violators WHERE violator_Id='$d'");
                                while ($r2 = mysqli_fetch_array($fetch2)) {
                                    $a = $r2['violators_violation'];
                                    $b = explode(",", $a);
                                $fetch3 = mysqli_query($conn, "SELECT * FROM violations ORDER BY violation ASC");
                                while ($rr = mysqli_fetch_array($fetch3)) {
                            ?>
                                <div class="col-lg-6 mb-1">
                                   <div class="form-check">
                                      <input class="form-check-input position-static" 
                                      type="checkbox" 
                                      id="<?php echo $rr['violation']; ?>" 
                                      value="<?php echo ''.$rr['violation'].' - P '.$rr['penalty'].'.00'; ?>" 
                                      name="driver_violation[]"  <?php if(in_array(''.$rr['violation'].' - P '.$rr['penalty'].'.00', $b)) { echo "checked"; } ?> disabled> 

                                      <label style="font-weight: normal" 
                                            for="<?php echo $rr['violation']; ?>">
                                            <?php echo $rr['violation']; ?> - ₱ <?php echo number_format((float)$rr['penalty'], 2, '.', '');  ?>
                                      </label>
                                   </div>
                                </div>
                            <?php } } ?>
                            </div>
                            
                        </div>
                  </div>   
              </div>
              <!-- /.card-body -->
            <div class="modal-footer alert-light">
                <a href="violators.php" class="btn btn-secondary"><i class="fa-solid fa-ban"></i> Back to list</a>
                <a href="violators_update.php?violator_Id=<?php echo $row['violator_Id']; ?>" type="button" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</a>
            </div>
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



