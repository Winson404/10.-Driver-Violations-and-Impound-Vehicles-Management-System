<?php 
  include 'config.php';
  if(isset($_SESSION['admin_Id'])) {
      header('Location: Admin/dashboard.php');
  } elseif(isset($_SESSION['staff_Id'])) {
      header('Location: Staff/dashboard.php');
  } else {
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Centralized Driver Violations and Impound Vehicles Report Management System for PNP and POSU in Cabatuan Isabela</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-homepage/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-homepage/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-homepage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets-homepage/css/style.css" rel="stylesheet">
</head>

<body>

  <header id="header text-center">
    <div class="container">
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="" style="position: relative;left: 150px;">Centralized Driver Violations and Impound Vehicles Report Management System for PNP and POSU in Cabatuan Isabela</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

<script>
  //-----------------------------ALERT TIMEOUT-------------------------//
  $(document).ready(function() {
      setTimeout(function() {
          $('.alert').hide();
      } ,6000);
  }
  );
//-----------------------------END ALERT TIMEOUT---------------------//
</script>

<?php } ?>