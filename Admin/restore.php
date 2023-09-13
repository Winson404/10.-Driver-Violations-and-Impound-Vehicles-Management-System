<?php 
include 'navbar.php';

$connection = mysqli_connect("localhost","root","","violations");
$filename = date("Y-m-d").".sql";
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($connection,$query);
  
    // if($result){
    //   echo 'SUCCESS';
    // }
}
fclose($handle);

?>

<script src="../sweetalert2.min.js"></script>
<!-- SUCCESS -->
<?php 
  echo ' <script type="text/javascript">
      Swal.fire ({
        title: "Good job!",
        text: "Your Database has been restored succesfully!",
        icon: "success",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Loading...",
        timer: 3000
      });
    </script>';
 $_SESSION['success']   = "Good job!";

?>


    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Database Restore</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Database Restore</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <?php if(isset($_SESSION['success'])) { ?> 
                         <h3 class="text-success text-center" id="alert"><b>Database restoration success!</b></h3>
                        <?php unset($_SESSION['success']); } ?>
                         <img src="../images/db.gif" alt="" class="img-fluid" width="500" style=" display: block; margin-left: auto;margin-right: auto;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </section>
      </div>
    </section>
  </div>
  

<?php include 'footer.php'; ?>


<script>
  $(document).ready(function() {
      setTimeout(function() {
          $('#alert').hide();
      } ,4000);
  }
  );
</script>